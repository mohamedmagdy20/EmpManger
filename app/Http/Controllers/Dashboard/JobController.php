<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Http\Requests\Job\StoreJobs;
use App\Models\Job;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JobController extends GeneralController
{
    //
    protected $model;
    protected $view = 'jobs.';

    public function __construct(Job $model)
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
        ->addColumn('actions',function($data){
            return view($this->viewPath($this->view.'actions'),['type'=>'actions','data'=>$data]);
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
        return view($this->viewPath($this->view.'edit'),['data'=>$data]);
    }

    public function delete($id)
    {
        $data = $this->findData($id);
        $data->delete();
        return response()->json(['status'=>true]);
        // return redirect()->back()->with('success','Deleted');
    }


    public function store(StoreJobs $request)
    {
        $data = $request->validated();
        $this->model->create(array_merge($data,['created_by'=>auth()->user()->name]));
        return redirect()->back()->with('success','Job Added');
    }


    public function update(StoreJobs $request,$id)
    {
        $data =  $request->validated();
        $job = $this->findData($id);
        $job->update(array_merge($data,['created_by'=>auth()->user()->name]));
        return redirect()->route('dashboard.jobs.index')->with('success','Job Updated');
    }
}
