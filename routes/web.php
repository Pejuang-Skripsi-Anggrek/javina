<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\CatalogController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\TransactionController;
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
Route::get('/product/sku/{id}', [ProductController::class, 'product_sku']);

//Catalog
Route::get('/catalog/{id}', [CatalogController::class, 'catalog']);

// Cart
Route::get('/cart', [CartController::class, 'cart']);
Route::post('/cartadd/{id}', [CartController::class, 'cartAdd']);
Route::post('/cartdel', [CartController::class, 'cartDel']);

// Transaction
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::post('/transaction', [CheckoutController::class, 'midtrans']);
Route::get('/city/{id}', [CheckoutController::class, 'city']);
Route::get('/shipping/{id}/{courier}', [CheckoutController::class, 'shipping']);
Route::get('/transaction', [TransactionController::class, 'transaction']);

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
    Route::get('/filter/transaksi', [AdminController::class, 'filtertransaksi']);
    Route::get('/detailtransaksi/{id}/{id_user}', [AdminController::class, 'detailtransaksi']);
    Route::get('/prosestransaksi/{id_transaksi}', [AdminController::class, 'prosestransaksi']);
    Route::get('/selesaikantransaksi/{id_transaksi}', [AdminController::class, 'selesaikantransaksi']);
    Route::put('/addnoresi', [AdminController::class, 'tambahresi']);
    Route::get('/produk', [AdminController::class, 'produk'])->name('admin.produk');
    Route::get('/searchproduk', [AdminController::class, 'searchproduk']);
    Route::get('/filterkatalog', [AdminController::class, 'filterkatalog']);
    Route::get('/detailproduk/{id}', [AdminController::class, 'detailproduk']);
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
    Route::get('/printqr', [AdminController::class, 'qrcode']);
    Route::get('/ujicoba', [AdminController::class, 'ujicoba']);
});
