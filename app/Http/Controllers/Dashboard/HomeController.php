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
        $finish  = ModelsRequest::where('request_status','finished')->count();
        $new = ModelsRequest::where('request_status','new')->count();
        $process = ModelsRequest::where('request_status','on_process')->count();
        $jobs = Job::count();
        
        return view('dashboard.index',['users'=>$users,'employees'=>$employees,'jobs'=>$jobs,
        'finish'=>$finish,'new'=>$new,'process'=>$process]);
    }
}
