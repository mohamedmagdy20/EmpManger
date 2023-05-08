<?php

use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\JobController;
use App\Http\Controllers\Dashboard\LoginHistoryController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\RequestController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\LocalizationController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::get('/gender',[HomeController::class,'gender'])->middleware(['auth'])->name('gender-chart');
Route::get('/request-chart',[HomeController::class,'requestChart'])->middleware(['auth'])->name('request-chart');


Route::get('change-lang/{locale}',[LocalizationController::class,'setLang'])->name('change-lang');
$mainPrefix = 'dashboard/';

Route::group(['middleware' => 'auth','prefix' => $mainPrefix.'users'], function (){
    $route = 'dashboard.users.';
    
    Route::get('index',[UserController::class,'index'])->middleware('permission:show_user')->name($route.'index');
    Route::get('data',[UserController::class,'data'])->middleware('permission:show_user')->name($route.'data');
    Route::get('create',[UserController::class,'create'])->middleware('permission:add_user')->name($route.'create');
    Route::get('edit/{id}',[UserController::class,'edit'])->middleware('permission:edit_user')->name($route.'edit');
    Route::get('delete/{id}',[UserController::class,'delete'])->middleware('permission:delete_user')->name($route.'delete');
    Route::post('store',[UserController::class,'store'])->middleware('permission:add_user')->name($route.'store');
    Route::post('update/{id}',[UserController::class,'update'])->middleware('permission:edit_user')->name($route.'update');
    // Route::post('toggle-active',[UserController::class,'toggleActive'])->middleware('permission:show_user')->name($route.'toggle-active');

});


Route::group(['middleware' => 'auth','prefix' => $mainPrefix.'users/profile'], function (){
    $route = 'dashboard.users.profile.';
    
    Route::get('index',[ProfileController::class,'index'])->middleware('permission:show_user')->name($route.'index');
    Route::get('change-password',[ProfileController::class,'changePasswordView'])->middleware('permission:show_user')->name($route.'change-password-view');
    Route::post('edit',[ProfileController::class,'update'])->middleware('permission:add_user')->name($route.'edit-profile');
    Route::post('change-password',[ProfileController::class,'changePassword'])->middleware('permission:edit_user')->name($route.'change-password');

});



Route::group(['middleware' => 'auth','prefix' =>  $mainPrefix.'roles'], function (){
    $route = 'dashboard.roles.';
    
    Route::get('index',[RoleController::class,'index'])->middleware('permission:show_role')->name($route.'index');
    Route::get('data',[RoleController::class,'data'])->middleware('permission:show_role')->name($route.'data');
    Route::get('create',[RoleController::class,'create'])->middleware('permission:add_role')->name($route.'create');
    Route::get('edit/{id}',[RoleController::class,'edit'])->middleware('permission:edit_role')->name($route.'edit');
    Route::post('store',[RoleController::class,'store'])->middleware('permission:add_role')->name($route.'store');
    Route::post('update/{id}',[RoleController::class,'update'])->middleware('permission:edit_role')->name($route.'update');

});

Route::group(['middleware' => 'auth','prefix' =>  $mainPrefix.'permissions'], function (){
    $route = 'dashboard.permissions.';
    Route::get('{id}/edit',[PermissionController::class,'index'])->middleware('permission:show_permissions')->name($route.'edit');
    Route::post('update/{id}',[PermissionController::class,'updatePermission'])->middleware('permission:edit_permissions')->name($route.'update');
});



Route::group(['middleware' => 'auth','prefix' =>  $mainPrefix.'jobs'], function (){
    $route = 'dashboard.jobs.';
    
    Route::get('/',[JobController::class,'index'])->middleware('permission:show_jobs')->name($route.'index');
    Route::get('data',[JobController::class,'data'])->middleware('permission:show_jobs')->name($route.'data');
    Route::get('create',[JobController::class,'create'])->middleware('permission:add_jobs')->name($route.'create');
    Route::get('edit/{id}',[JobController::class,'edit'])->middleware('permission:edit_jobs')->name($route.'edit');

    Route::get('delete/{id}',[JobController::class,'delete'])->middleware('permission:delete_jobs')->name($route.'delete');
    Route::post('store',[JobController::class,'store'])->middleware('permission:add_jobs')->name($route.'store');
    Route::post('update/{id}',[JobController::class,'update'])->middleware('permission:edit_jobs')->name($route.'update');

});


Route::group(['middleware' => 'auth','prefix' =>  $mainPrefix.'employees'], function (){
    $route = 'dashboard.employees.';
    
    Route::get('/',[EmployeeController::class,'index'])->middleware('permission:show_employees')->name($route.'index');
    Route::get('data',[EmployeeController::class,'data'])->middleware('permission:show_employees')->name($route.'data');
    Route::get('create',[EmployeeController::class,'create'])->middleware('permission:add_employees')->name($route.'create');
    Route::get('edit/{id}',[EmployeeController::class,'edit'])->middleware('permission:edit_employees')->name($route.'edit');
    Route::get('change/{id}',[EmployeeController::class,'changeImageView'])->middleware('permission:edit_employees')->name($route.'change-password-view');
    Route::get('delete/{id}',[EmployeeController::class,'delete'])->middleware('permission:delete_employees')->name($route.'delete');
    Route::post('store',[EmployeeController::class,'store'])->middleware('permission:add_employees')->name($route.'store');
    Route::post('update/{id}',[EmployeeController::class,'update'])->middleware('permission:edit_employees')->name($route.'update');
    Route::post('change-password/{id}',[EmployeeController::class,'changePassword'])->middleware('permission:edit_employees')->name($route.'change-password');

});


Route::group(['middleware' => 'auth','prefix' =>  $mainPrefix.'requests'], function (){
    $route = 'dashboard.requests.';
    
    Route::get('/',[RequestController::class,'index'])->middleware('permission:show_requests')->name($route.'index');
    Route::get('data',[RequestController::class,'data'])->middleware('permission:show_requests')->name($route.'data');
    Route::get('create',[RequestController::class,'create'])->middleware('permission:add_requests')->name($route.'create');
    Route::get('edit/{id}',[RequestController::class,'edit'])->middleware('permission:edit_requests')->name($route.'edit');
    Route::get('show/{id}',[RequestController::class,'show'])->middleware('permission:show_requests')->name($route.'show');
    Route::get('delete/{id}',[RequestController::class,'delete'])->middleware('permission:delete_requests')->name($route.'delete');
    Route::post('store',[RequestController::class,'store'])->middleware('permission:add_requests')->name($route.'store');
    Route::post('update/{id}',[RequestController::class,'update'])->middleware('permission:edit_requests')->name($route.'update');
    Route::get('change-status',[RequestController::class,'updateStatus'])->middleware('permission:edit_requests')->name($route.'change-status');
});



Route::group(['middleware' => 'auth','prefix' =>  $mainPrefix.'login-history'], function (){
    $route = 'dashboard.login_history.';
    Route::get('/',[LoginHistoryController::class,'index'])->middleware('permission:show_login_history')->name($route.'index');
    Route::get('data',[LoginHistoryController::class,'data'])->middleware('permission:show_login_history')->name($route.'data');
});


require __DIR__.'/auth.php';
