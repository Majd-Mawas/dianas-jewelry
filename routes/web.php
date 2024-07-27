<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DesignerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShippingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'landing');
        Route::get('/cart',  'cart')->name('cart');
        Route::get('/product/{id}',  'product')->name('show_product');
        Route::get('/products/{cat?}',  'products')->name('list_products');
    });


    Route::middleware(['admin'])->group(function () {
        Route::prefix('dashboard')->group(function () {
            Route::resource('users', UserController::class);
            Route::resource('products', ProductController::class);
            Route::resource('orders', OrderController::class)->except('store');
            Route::resource('designers', DesignerController::class);
            Route::resource('categories', CategoryController::class);
            Route::resource('shipping', ShippingController::class);
        });

        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
        Route::get('/shipping/confirm/{id}', [ShippingController::class, 'confirm'])->name('confirm');
    });

    Route::resource('items', ItemController::class);
    Route::controller(ItemController::class)->group(function () {
        Route::get('items/add_to_cart/{item_id}', 'add_to_cart')->name('add_to_cart');
    });
    Route::controller(OrderController::class)->group(function () {
        Route::post('orders', 'store');
        Route::get('order/finalize/{id}', 'finalize')->name('finalize');
    });
});
