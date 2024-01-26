<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\ProductUseController;

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

Route::get('/', [ProductUseController::class, 'index'])->name('welcome');
Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
Route::get('/products/{id}', [ProductsController::class,'show'])->name('products.show');

Route::get('/add-to-cart/{product}', [ProductsController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [ProductsController::class, 'showCart'])->name('cart.show');
Route::get('/cart/show', [ProductsController::class,'showCart'])->name('cart.show');

//paypal
Route::get('paypal', [PayPalController::class, 'index'])->name('paypal');
Route::get('paypal/payment', [PayPalController::class, 'payment'])->name('paypal.payment');
Route::get('paypal/payment/success', [PayPalController::class, 'paymentSuccess'])->name('paypal.payment.success');
Route::get('paypal/payment/cancel', [PayPalController::class, 'paymentCancel'])->name('paypal.payment/cancel');
//
Route::resource('/categories', CategoriesController::class);
Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::post('/products', [ProductsController::class, 'store'])->name('products.store');
Route::put('/products/{product}', [ProductsController::class, 'update'])->name('products.update');
Route::put('/categories/{category}', [CategoriesController::class, 'update'])->name('categories.update');

Route::delete('/products/{product}', [ProductsController::class, 'destroy'])->name('products.destroy');
Route::get('/products/{product}/edit', [ProductsController::class, 'edit'])->name('products.edit');

Route::get('/search', [ProductsController::class,'search'])->name('products.search');
Route::put('/update-quantity/{product}/{quantity}', [CartController::class,'updateQuantity'])->name('updateQuantity');
Route::delete('/cart/remove/{product}', [CartController::class, 'destroy'])->name('cart.remove');