<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Shopcart;
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

Route::get('/', [ProductController::class, 'indexHome'])->name('customerHome');

Route::get('/s', function () {
    return view('auth.sinup');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/overons', function () {
    return view('aboutus');
});

Route::get('/successful', function () {
    return view('successful');
})->name('successful');
/* Product routes */
Route::get('/product/{product}', [ProductController::class, 'showProduct']);
Route::get('/producten', [ProductController::class, 'productPageWithFilters']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware(['auth', 'user-role:user'])->group(function () {

    Route::post('/cart/add-item/', [CartController::class, 'store']);
    // Route::get('/winkelwagen/', [CartController::class, 'index'])->name('cart.index');
    // Route::delete('/cart_item/{cart_item}', [CartController::class, 'destroy'])->name('cart_item.destroy');
    // Route::put('/cart/{id}', [CartController::class, 'updateQuantity'])->name('shopcartitems.updateQuantity');

    Route::get('/winkelwagen/', Shopcart::class)->name('cart.index');

    Route::get('/orderdetails/{order}', [OrderController::class, 'show'])->name('orderdetails');

    Route::get('generate-pdf/{order}', [PDFController::class, 'index'])->name('generate-pdf');
    Route::get('/bestellingen', [OrderController::class, 'index'])->name('order.index');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

    Route::post('/checkout/test', [CheckoutController::class, 'store'])->name('checkout store');

    Route::get('/checkout/check/{id}', [CheckoutController::class, 'check'])->name('checkout check');

});

require __DIR__.'/errors.php';

require __DIR__.'/admin.php';

require __DIR__.'/auth.php';
require __DIR__.'/humanresources.php';
require __DIR__.'/management.php';
