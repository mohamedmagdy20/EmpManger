<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Http\Requests\User\StoreRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends GeneralController
{
    //
    protected $model;
    protected $view = 'users.';
    protected $route = 'users.';

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
        return view($this->viewPath($this->view.'index'));
    }

    public function data()
    {
        $data = $this->getQuery();
        return DataTables::of($data)
        ->addColumn('actions',function($model){
            return view($this->viewPath($this->view.'actions'),['type'=>'actions','data'=>$model]);
        })
        ->editColumn('status',function($model){
            return view($this->viewPath($this->view.'actions'),['type'=>'status','data'=>$model]);

        })
        ->editColumn('image',function($model){
            return view($this->viewPath($this->view.'actions'),['type'=>'image','data'=>$model]);
        })
        ->make(true);
    }


    public function create(){
        $role = Role::all();
        return view($this->viewPath($this->view.'create'),['data'=>$role]);
    }

    public function view()
    {
        return view($this->viewPath($this->view.'view'));
    }

    public function edit($id)
    {
        $data = $this->findData($id);
       $roles = Role::all();

        return view($this->viewPath($this->view.'edit'),['data'=>$data,'roles'=>$roles]);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        // Store Image 
        if($request->file('image'))
        {
            $data['image'] = $this->storeImage($data['image'],config('path.USERS_PATH'));
        }

        // Hash Password 
        $data['password'] = Hash::make($data['password']);
        if($data['status'] == "on")
        {
            $data['status'] = true;
        }else{
            $data['status'] = false;
        }

        $user = $this->model->create(array_merge($data,['created_by'=>auth()->user()->name]));

        $user->attachRole($data['role']);
        // Store in db 

        return redirect()->back()->with('success','User Added');
    }


    public function update($id ,StoreRequest $request )
    {
        $data =  $request->validated();
        if($data['status'] == "on")
        {
            $data['status'] = true;
        }else{
            $data['status'] = false;
        }
        $user = $this->findData($id);
        if($request->file('image'))
        {
            $data['image'] =  $this->updateImage($data['image'],$user->image,config('path.USERS_PATH'));
        }

        $data['password'] = Hash::make($data['password']);

        $user->update(array_merge($data,['created_by'=>auth()->user()->name]));

        $user->attachRole($data['role']);

        return redirect()->route('dashboard.users.index')->with('success','User Updated');

    }

    public function delete($id){
        
        $data = $this->findData($id);

        // delete image if exsit
        if($data->image)
        {
            unlink(public_path('uploads/users/').$data->image);
        }

        if($data->delete($data)){
            // return redirect()->back()->with('success','Deleted');
            return response()->json(['status'=>true]);

        };
    }


    public function toggleActive(Request $request)
    {
        $status = $request->status; 
        $user = User::findOrFail($request->id);
        $user->status = $status ? false : true;

        $user->save();

        if($status)
        {
            return response()->json([
                'msg'=>'User Deactive',
                'hide'=>true
            ]);
        }else{
            return response()->json([
                'msg'=>'User Active',
                'hide'=>false
            ]);
        }

    }



}
