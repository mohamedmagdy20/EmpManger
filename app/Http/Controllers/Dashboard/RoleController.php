<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Http\Requests\Role\StoreRole;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends GeneralController
{
    //

    protected $model;
    protected $view = 'roles.';
  
    public function __construct(Role $model)
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
        ->make(true);
    }

    public function create()
    {
        return view($this->viewPath($this->view.'create'));
    }

    public function edit($id)
    {
        $data = $this->findData($id);
        // return $data;
        return view($this->viewPath($this->view.'edit'),['data'=>$data]);
    }


    public function store(StoreRole $request)
    {
        try{
            $data = $request->validated();
            $data['name'] = strtolower(trim($data['display_name']));
    
            $this->model->create(array_merge($data,['created_by'=>auth()->user()->name]));
    
            return redirect()->back()->with('success','Role Added');
    
        }catch(Exception $r)
        {
            return redirect()->back()->with('errors','Error Accure');
        }
       
    }
    public function update(StoreRole $request,$id)
    {
        $data = $request->validated();
        $role = $this->findData($id);
        $role->update(['display_name'=>$data['display_name'],
    'description'=>$data['description'],'created_by'=>auth()->user()->name]);
        return redirect()->route('dashboard.roles.index')->with('success','Role Updated');

    }
}
