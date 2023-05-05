<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Http\Requests\Permissions\StorePermissions;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends GeneralController
{
    //
    protected $model;
    protected $view = 'permissions.';

    public function __construct(Permission $model)
    {
        parent::__construct($model);
    }


    public function index($id)
    {
        $role = Role::find($id);
        $permissions = $this->getData();
        return view( $this->viewPath($this->view.'index'),['role'=>$role,'permissions'=>$permissions]);

    }

    public function updatePermission(StorePermissions $request,$id)
    {
        $data = $request->validated();
        $role = Role::find($id);
        $role->syncPermissions($data['permissions']);
        return redirect()->back()->with('success','Permission Updated');
    }
}
