<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Http\Requests\Employee\FilterEmployee;
use App\Http\Requests\Employee\StoreEmployee;
use App\Http\Requests\Employee\UpdateEmployee;
use App\Models\Employee;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends GeneralController
{
    //
    protected $table = 'employees';
    protected $view = 'employees.';


    public function __construct(Employee $model)
    {
        parent::__construct($model);
    }
    public function index()
    {
        $jobs = Job::all();
       return view($this->viewPath($this->view.'index'),['jobs'=>$jobs]);
    }

    public function data(FilterEmployee $request)
    {
        $data = $this->getQuery();

        if($request->gender)
        {
            $data = $data->where('gender',$request->gender);
        }
        if($request->age)
        {
            $data = $data->where('age',$request->age);
        }
        
        if($request->status)
        {
            $data = $data->where('status',$request->status);
        }
        if($request->salary_from && $request->salary_to)
        {
            $data = $data->whereBetween('salary',[$request->salary_from,$request->salary_to]);
        }
        if($request->job_id)
        {
            $data = $data->where('job_id',$request->job_id);

        }
        return DataTables::of($data)
        ->addColumn('actions',function($data)
        {
            return view($this->viewPath($this->view.'actions'),['data'=>$data,'type'=>'actions']);
        })
        ->editColumn('job_id',function($data){
            return $data->job->name;
        })
        ->editColumn('image_link',function($data){
            return view($this->viewPath($this->view.'actions'),['data'=>$data,'type'=>'image_link']);

        })
        ->addColumn('images',function($data)
        {
            return view($this->viewPath($this->view.'actions'),['data'=>$data,'type'=>'images']);
        })->
        editColumn('status',function($data){
            return view($this->viewPath($this->view.'actions'),['type'=>'status','data'=>$data]);

        })->
        make(true);
    }

    public function create()
    {
        $jobs = Job::all();
        return view($this->viewPath($this->view.'create'),['jobs'=>$jobs]);
    }

    public function edit($id)
    {
        $jobs = Job::all();
        $data = $this->findData($id);
        return view($this->viewPath($this->view.'edit'),['data'=>$data,'jobs'=>$jobs]);
    }

    public function changeImageView($id)
    {
        $data = $this->findData($id);
        return view($this->viewPath($this->view.'change-image'),['data'=>$data]);
    }
    public function delete($id)
    {
        $data = $this->findData($id);
        $data->delete();
        return response()->json(['status'=>true]);

    }



    public function changePassword(Request $request,$id)
    {
        $request->validate([
            'password'=>'required|confirmed'
        ]);
        $data = $this->findData($id);
        $data->update(['password'=>Hash::make($request->password)]);
        return redirect()->route('dashboard.employees.index')->with('success','Password Changed Sucessfully');
    }


    public function store(StoreEmployee $request)
    {
        $data = $request->validated();

        if($request->file('image'))
        {
            $data['image'] = $this->storeImage($data['image'],config('path.EMPLOYEE_PATH'));
            $data['image_link'] = asset('uploads/employees/'.$data['image']);

        }

        // $data['password'] = Hash::make($data['password']);

        if($request->status == 'on')
        {
            $data['status'] = 1;
        }else{
            $data['status'] = 0;
        }

        $this->model->create(array_merge($data,['created_by'=>auth()->user()->name]));
        return redirect()->back()->with('success','Employee Added');
    }


    public function update(UpdateEmployee $request,$id)
    {
        $data = $request->validated();

        $emp = $this->findData($id);

        if($request->file('image'))
        {
            $data['image'] = $this->updateImage($data['image'],$emp->image,config('path.EMPLOYEE_PATH'));
            $data['image_link'] = asset('uploads/employees/'.$data['image']);
        }


        if($request->status == 'on')
        {
            $data['status'] = 1;
        }else{
            $data['status'] = 0;
        }

        $emp->update(array_merge($data,['created_by'=>auth()->user()->name]));

        return redirect()->route('dashboard.employees.index')->with('success','Employee updated');
    }
}