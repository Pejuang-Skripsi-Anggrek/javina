<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\AuthController;
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
    return view('welcome');
});
//============================= ROUTE USER =============================\\
Route::prefix('/buyer')->group(function(){
    Route::get('/login', [AuthController::class, 'login']);
});

//============================= ROUTE ADMIN =============================\\
Route::prefix('/admin')->group(function(){
    //============================= VIEW =============================\\
    Route::get('/login', [AdminAuthController::class, 'login']);
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    //============================= CONTROLLER =============================\\
    Route::post('/masuk', [AdminAuthController::class, 'masuk']);
});
