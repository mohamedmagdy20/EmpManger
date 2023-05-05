<?php

use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\JobController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Models\Permission;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'index'])->middleware(['auth'])->name('dashboard');




Route::group(['middleware' => 'auth','prefix' => 'users'], function (){
    $route = 'dashboard.users.';
    
    Route::get('index',[UserController::class,'index'])->name($route.'index');
    Route::get('data',[UserController::class,'data'])->name($route.'data');
    Route::get('create',[UserController::class,'create'])->name($route.'create');
    Route::get('edit/{id}',[UserController::class,'edit'])->name($route.'edit');

    Route::get('delete/{id}',[UserController::class,'delete'])->name($route.'delete');
    Route::post('store',[UserController::class,'store'])->name($route.'store');
    Route::post('update/{id}',[UserController::class,'update'])->name($route.'update');
    Route::post('toggle-active',[UserController::class,'toggleActive'])->name($route.'toggle-active');

});



Route::group(['middleware' => 'auth','prefix' => 'roles'], function (){
    $route = 'dashboard.roles.';
    
    Route::get('index',[RoleController::class,'index'])->name($route.'index');
    Route::get('data',[RoleController::class,'data'])->name($route.'data');
    Route::get('create',[RoleController::class,'create'])->name($route.'create');
    Route::get('edit/{id}',[RoleController::class,'edit'])->name($route.'edit');
    Route::post('store',[RoleController::class,'store'])->name($route.'store');
    Route::post('update/{id}',[RoleController::class,'update'])->name($route.'update');

});

Route::group(['middleware' => 'auth','prefix' => 'permissions'], function (){
    $route = 'dashboard.permissions.';
    Route::get('edit/{id}',[PermissionController::class,'index'])->name($route.'edit');
    Route::post('update/{id}',[PermissionController::class,'updatePermission'])->name($route.'update');
});



Route::group(['middleware' => 'auth','prefix' => 'jobs'], function (){
    $route = 'dashboard.jobs.';
    
    Route::get('index',[JobController::class,'index'])->name($route.'index');
    Route::get('data',[JobController::class,'data'])->name($route.'data');
    Route::get('create',[JobController::class,'create'])->name($route.'create');
    Route::get('edit/{id}',[JobController::class,'edit'])->name($route.'edit');

    Route::get('delete/{id}',[JobController::class,'delete'])->name($route.'delete');
    Route::post('store',[JobController::class,'store'])->name($route.'store');
    Route::post('update/{id}',[JobController::class,'update'])->name($route.'update');

});


Route::group(['middleware' => 'auth','prefix' => 'employees'], function (){
    $route = 'dashboard.employees.';
    
    Route::get('index',[EmployeeController::class,'index'])->name($route.'index');
    Route::get('data',[EmployeeController::class,'data'])->name($route.'data');
    Route::get('create',[EmployeeController::class,'create'])->name($route.'create');
    Route::get('edit/{id}',[EmployeeController::class,'edit'])->name($route.'edit');
    Route::get('change/{id}',[EmployeeController::class,'changeImageView'])->name($route.'change-password-view');
    Route::get('delete/{id}',[EmployeeController::class,'delete'])->name($route.'delete');
    Route::post('store',[EmployeeController::class,'store'])->name($route.'store');
    Route::post('update/{id}',[EmployeeController::class,'update'])->name($route.'update');
    Route::post('change-password/{id}',[EmployeeController::class,'changePassword'])->name($route.'change-password');

});


require __DIR__.'/auth.php';
