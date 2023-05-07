<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Models\LoginHistory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LoginHistoryController extends GeneralController
{
    //
    protected $model;
    protected $view = 'login_history.';

    public function __construct(LoginHistory $model)
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
        $result = DataTables()->eloquent($data)
        ->toJson();
        return $result;
    }
}
