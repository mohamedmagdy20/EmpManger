<?php

use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;
use App\Models\Permission;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');




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
require __DIR__.'/auth.php';
