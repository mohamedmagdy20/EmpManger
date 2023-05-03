<?php

use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');




Route::group(['middleware' => 'auth','prefix' => 'users'], function (){
    $route = 'dashboard.users.';
    
    Route::get('index',[UserController::class,'index'])->name($route.'index');
    Route::get('data',[UserController::class,'data'])->name($route.'data');
    Route::get('create',[UserController::class,'create'])->name($route.'create');
    Route::get('edit/{id}',[UserController::class,'edit'])->name($route.'edit');

    Route::get('delete/{id}',[UserController::class,'delete'])->name($route.'delete');
    Route::post('store',[UserController::class,'store'])->name($route.'store');
    // Route::post('update/{id}',$controller.'update')->name($route.'update');
    // Route::post('muli-delete',$controller.'multiDelete')->name($route.'multi-delete');

});
require __DIR__.'/auth.php';
