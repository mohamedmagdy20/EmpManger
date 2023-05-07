<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Http\Requests\Requests\StoreRequests;
use App\Http\Requests\User\FilterRequest;
use App\Models\Employee;
use App\Models\Request as ModelsRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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
        $data = Employee::all();
        return view($this->viewPath($this->view.'index'),['data'=>$data]);
    }

    public function data(FilterRequest $request)
    {
        $data = $this->getQuery();
        if($request->status)
        {
            $data = $data->where('status',$request->status);
        }
        if($request->employee_id)
        {
            $data = $data->where('employee_id',$request->employee_id);
        }
        if($request->request_status)
        {
            $data = $data->where('request_status',$request->request_status);
        }
        if($request->type)
        {
            $data = $data->where('type',$request->type);
        }

        if($request->date_from && $request->data_to)
        {
            $datefrom = Carbon::parse($request->date_from);
            $dateto = Carbon::parse($request->data_to);
            $data = $data->whereBetween('created_at',[$datefrom,$dateto]);
        }

        return DataTables::of($data)
        ->addColumn('actions',function($data){
            return view($this->viewPath($this->view.'actions'),['type'=>'actions','data'=>$data]);
        })
        ->editColumn('employee_id',function($data){
            return $data->employee->name;
        })
        ->editColumn('status',function($model){
            return view($this->viewPath($this->view.'actions'),['type'=>'status','data'=>$model]);
        })
        ->addColumn('change-status',function($data){
            return view($this->viewPath($this->view.'actions'),['type'=>'change-status','data'=>$data]);
        })
        ->editColumn('created_at',function($data){
        return $data->created_at->format('Y-m-d');
        })
        ->make(true);
    }
    public function create()
    {
        $data = Employee::all();
        return view($this->viewPath($this->view.'create'),['data'=>$data]);
    }

    public function show($id)
    {
        $data = $this->findData($id);
        return view($this->viewPath($this->view.'show'),['data'=>$data]);
    }
    public function edit($id)
    {
        $data = $this->findData($id);
        $emps = Employee::all();
        return view($this->viewPath($this->view.'edit'),['data'=>$data,'emps'=>$emps]);   
    }


    public function store(StoreRequests $request){
        $data = $request->validated();

        if($data['status'] == "on")
        {
            $data['status'] = true;
        }else{
            $data['status'] = false;
        }

        $this->model->create(array_merge($data,['created_by'=>auth()->user()->name]));
        return redirect()->back()->with('success','Request Added');
    }


    public function update(StoreRequests $request,$id)
    {
        $data = $request->validated();

        $req =$this->findData($id);

        if($request->status)
        {
            $data['status'] = true;
        }else{
            $data['status'] = false;
        }

        $req->update(array_merge($data,['created_by'=>auth()->user()->name]));
        return redirect()->route('dashboard.requests.index')->with('success','Request Updated');

    }


    public function delete($id)
    {
        $data = $this->findData($id);
        $data->delete();
        return response()->json(['status'=>true]);  
    }


    public function updateStatus(Request $request)
    {
        $data = $this->findData($request->id);
        $data->update(['request_status'=>$request->status]);
        return response()->json(['status'=>true]);
    }
}
