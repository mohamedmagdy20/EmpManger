<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Job;
use App\Models\Request as ModelsRequest;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $users = User::count();
        $employees = Employee::count();
        $rl  = ModelsRequest::where('type','rl')->count();
        $new = ModelsRequest::where('type','new')->count();
        $da = ModelsRequest::where('type','da')->count();
        $renawal = ModelsRequest::where('type','renewal')->count();

        $jobs = Job::count();
              
        return view('dashboard.index',['users'=>$users,'employees'=>$employees,'jobs'=>$jobs,
        'rl'=>$rl,'new'=>$new,'da'=>$da,'renawal'=>$renawal]);
    }

    public function gender()
    {

        $male = Employee::where('gender','male')->count();
        $female = Employee::where('gender','female')->count();
        // array_push($gender,$male,$female);
        $gender = ['male'=>$male,'female'=>$female];

        return response()->json($gender);

    }

    public function requestChart()
    {
        $finish  = ModelsRequest::where('request_status','finished')->count();
        $new = ModelsRequest::where('request_status','new')->count();
        $process = ModelsRequest::where('request_status','on_process')->count();
        $data = ['finish'=>$finish,'on_process'=>$process,'new'=>$new];
        return response()->json($data);
    }



}
