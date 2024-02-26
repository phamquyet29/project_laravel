<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\ProductUseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccoutController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\UserController;

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

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [ProductsController::class, 'index'])->name('products.index');
    Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductsController::class, 'store'])->name('products.store');
    Route::put('/products/{product}', [ProductsController::class, 'update'])->name('products.update');
    Route::get('/users/{user}', [AccoutController::class, 'index'])->name('accout.index');
    Route::get('/users/{user}', [AccoutController::class, 'show'])->name('users.show');
    Route::delete('/products/{product}', [ProductsController::class, 'destroy'])->name('products.destroy');
    Route::get('/products/{product}/edit', [ProductsController::class, 'edit'])->name('products.edit');
    Route::get('/users', [AccoutController::class, 'index'])->name('users.index');
    Route::get('/accout/index', [AccoutController::class, 'index'])->name('accout.index');
    Route::get('accout/users/create', [AccoutController::class, 'create'])->name('users.create');
    Route::delete('/users/{user}', [AccoutController::class, 'destroy'])->name('accout.destroy');
    Route::get('accout/users/{user}/edit', [AccoutController::class, 'edit'])->name('accout.edit');
    Route::put('/users/{user}', [AccoutController::class, 'update'])->name('users.update');


    Route::get('/accout/users', [AccoutController::class, 'index'])->name('accout.index');
    Route::post('/users', [AccoutController::class, 'store'])->name('users.store');
    Route::post('/accout', [AccoutController::class, 'store'])->name('accout.store');
});
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/', [ProductUseController::class, 'index'])->name('welcome');
Route::get('/products/{id}', [ProductsController::class, 'show'])->name('products.show');
Route::get('/change-password', 'App\Http\Controllers\UserController@showChangePasswordForm')->name('password.change');
Route::post('/change-password', 'App\Http\Controllers\UserController@changePassword')->name('password.update');
//cart 
Route::get('/add-to-cart/{product}', [ProductsController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [ProductsController::class, 'showCart'])->name('cart.show');
Route::get('/cart/show', [ProductsController::class, 'showCart'])->name('cart.show');
Route::get('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.remove');
Route::delete('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
Route::patch('/update-shopping-cart', [CartController::class, 'updateShoppingCart'])->name('update.sopping.cart');
Route::delete('/delete-cart-product', [CartController::class, 'deleteCartProduct'])->name('delete.cart.product');
//paypal
Route::get('paypal', [PayPalController::class, 'index'])->name('paypal');
Route::get('paypal/payment', [PayPalController::class, 'payment'])->name('paypal.payment');
Route::get('paypal/payment/success', [PayPalController::class, 'paymentSuccess'])->name('paypal.payment.success');
Route::get('paypal/payment/cancel', [PayPalController::class, 'paymentCancel'])->name('paypal.payment/cancel');
//
Route::resource('/categories', CategoriesController::class);
Route::put('/categories/{category}', [CategoriesController::class, 'update'])->name('categories.update');
Route::get('/search', [ProductsController::class, 'search'])->name('products.search');
Route::put('/update-quantity/{product}/{quantity}', [CartController::class, 'updateQuantity'])->name('updateQuantity');
Route::delete('/cart/remove/{product}', [CartController::class, 'destroy'])->name('cart.remove');
// routes/web.php
Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
Route::post('/cart/addToCart/{id}', [CartController::class, 'addToCart'])->name('cart.addToCart');
//google
// Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
//     return view('welcome');
// })->name('welcome');
Route::controller(GoogleController::class)->group(function () {
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});
Route::middleware(['auth', 'password.confirm'])->group(function () {
    // Các route yêu cầu xác nhận mật khẩu
});
