<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\UserController;
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
Route::get('/user', [UserController::class, 'user']);
Route::get('/product', [ProductController::class, 'product']);
Route::get('/cart', [CartController::class, 'cart']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);

//============================= CONTROLLER =============================\\
Route::post('/masuk', [AuthController::class, 'masuk']);
Route::post('/daftar', [AuthController::class, 'daftar']);

//============================= CONTROLLER =============================\\
Route::post('/masuk', [AuthController::class, 'masuk']);
Route::post('/daftar', [AuthController::class, 'daftar']);

//============================= ROUTE ADMIN =============================\\
Route::prefix('/admin')->group(function () {
    //============================= VIEW =============================\\
    Route::get('/login', [AdminAuthController::class, 'login']);
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/transaksi', [AdminController::class, 'transaksi']);
    Route::get('/produk', [AdminController::class, 'produk']);
    Route::get('/pengguna', [AdminController::class, 'pengguna']);
    Route::get('/pengaturan', [AdminController::class, 'pengaturan']);
    Route::get('/katalog', [AdminController::class, 'katalog']);
    Route::get('/logout', [AdminAuthController::class, 'logout']);
    //============================= CONTROLLER =============================\\
    Route::post('/masuk', [AdminAuthController::class, 'masuk']);
    Route::post('/addproduk', [AdminController::class, 'addproduk']);
    Route::put('/updateproduk', [AdminController::class, 'updateproduk']);
    Route::get('/deleteproduk/{id}', [AdminController::class, 'deleteproduk']);
    Route::get('/tambahproduk', [AdminController::class, 'tambahproduk']);
    Route::get('/editproduk/{id}', [AdminController::class, 'editproduk']);
    Route::post('/tambahkatalog', [AdminController::class, 'tambahkatalog']);
    Route::get('/deletekatalog/{id}', [AdminController::class, 'deletekatalog']);
    
});
