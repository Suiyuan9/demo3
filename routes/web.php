<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AgentController;
use RealRashid\SweetAlert\Facades\Alert;

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
   

    return view('backend.auth.login');
});
Auth::routes();
Route::resource('user', UserController::class);
Route::resource('agent', AgentController::class);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
