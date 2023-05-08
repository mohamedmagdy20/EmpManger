<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends GeneralController
{
    //
    protected $model;
    protected $view ='profile.';

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return view($this->viewPath($this->view.'index'));
    }

    public function update(Request $request)
    {
        $image = '';
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'image'=>'image'
        ]);

        if($request->hasFile('image'))
        {
            $image = $this->updateImage($request->file('image'),auth()->user()->image,config('path.USERS_PATH'));
        }
        $data =$this->findData(auth()->user()->id);
        if($image)
        {
            $data->update(array_merge($request->all(),['image'=>$image]));
        }else{
            $data->update($request->all());
        }
        return redirect()->back()->with('success','Profile Updated');
    }


    public function changePasswordView()
    {
        return view($this->viewPath($this->view.'change'));
    }

    public function changePassword(Request $request)
    {
        // return $request->all();
        $request->validate([
            'password'=>'required|confirmed',
            'old_password'=>'required' 
        ]);

        if(! Hash::check($request->old_password,auth()->user()->password))
        {
            return redirect()->back()->with('error','Invalid Old Password');
        }else{
            $data = $this->findData(auth()->user()->id);
            $data->update(['password'=>Hash::make($request->password)]);
            return redirect()->back()->with('success','Password Updated');

        }
    }
}
