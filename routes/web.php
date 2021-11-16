<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\CartController;
use Illuminate\Support\Facades\Auth;
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

//============================= ROUTE USER =============================\\
Route::get('/', [HomeController::class, 'home']);
Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
Route::get('/product', [ProductController::class, 'product']);
Route::get('/cart', [CartController::class, 'cart']);

//============================= CONTROLLER =============================\\
Route::post('/masuk', [AuthController::class, 'masuk']);
Route::post('/daftar', [AuthController::class, 'daftar']);

//============================= ROUTE ADMIN =============================\\
Route::prefix('/admin')->group(function () {
    //============================= VIEW =============================\\
    Route::get('/login', [AdminAuthController::class, 'login']);
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    //============================= CONTROLLER =============================\\
    Route::post('/masuk', [AdminAuthController::class, 'masuk']);
});
