<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Http\Requests\Requests\StoreRequests;
use App\Models\Employee;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;

class RequestController extends GeneralController
{
    //
    protected $model;
    protected $view = 'requests.';


    public function __construct(ModelsRequest $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
        return view($this->viewPath($this->view.'index'));
    }

    public function create()
    {
        $data = Employee::all();
        return view($this->viewPath($this->view.'create'),['data'=>$data]);
    }

    public function edit($id)
    {
        $data = $this->findData($id);
        $emps = Employee::all();
        return view($this->viewPath($this->view.'edit'),['data'=>$data,'emps'=>$emps]);   
    }


    public function store(StoreRequests $request){
        $data = $request->validated();
        $this->model->create(array_merge($data,['created_by'=>auth()->user()->name]));
        return redirect()->back()->with('success','Request Added');
    }


    public function update(StoreRequests $request,$id)
    {
        $data = $request->validated();

        $req =$this->findData($id);

        $req->update(array_merge($data,['created_by'=>auth()->user()->name]));
        return redirect()->route('dashboard.requests.index')->with('success','Request Updated');

    }


    public function delete($id)
    {
        $data = $this->findData($id);
        $data->delete();
        return response()->json(['status'=>true]);  
    }


    public function updateStatus($id,$status)
    {
        $data = $this->findData($id);
        $data->updata(['request_status'=>$status]);
        return response()->json(['status'=>true]);
    }
}
