<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CatalogController;
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

// Product
Route::get('/product/{id}', [ProductController::class, 'product']);

//Catalog
Route::get('/catalog/{id}', [CatalogController::class, 'catalog']);

// Cart
Route::get('/cart', [CartController::class, 'cart']);
Route::post('/cartadd/{id}', [CartController::class, 'cartAdd']);

// Transaction
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::post('/transaction', [CheckoutController::class, 'midtrans']);

//============================= CONTROLLER =============================\\
Route::post('/login', [AuthController::class, 'masuk']);
Route::post('/register', [AuthController::class, 'daftar']);
Route::get('/logout', [AuthController::class, 'logout']);

//============================= ROUTE ADMIN =============================\\
Route::prefix('/admin')->group(function () {
    //============================= VIEW =============================\\
    Route::get('/login', [AdminAuthController::class, 'login']);
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/transaksi', [AdminController::class, 'transaksi']);
    Route::get('/produk', [AdminController::class, 'produk']);
    Route::get('/pengguna', [AdminController::class, 'pengguna']);
    Route::get('/pengaturan', [AdminController::class, 'pengaturan']);
    //============================= CONTROLLER =============================\\
    Route::post('/masuk', [AdminAuthController::class, 'masuk']);
});
