<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
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
        return view($this->viewPath($this->view.'create'));
    }

    public function view()
    {
        return view($this->viewPath($this->view.'view'));
    }

    public function edit($id)
    {
        $data = $this->findData($id);
        return view($this->viewPath($this->view.'edit'),['data'=>$data]);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        // Store Image 
        $data['image'] = $this->storeImage($data['image'],config('path.USERS_PATH'));

        // Store in db 

        if($this->model->create($data)){
            return redirect()->back()->with('success','User Added');
        }else{
            return redirect()->back()->with('success','Error');
        }
    }


    public function delete($id){
        
        $data = $this->findData($id);

        // delete image if exsit
        if($data->image)
        {
            unlink($data->image);
        }

        if($data->delete($data)){
            return redirect()->back()->with('success','Deleted');
        };
    }




}
