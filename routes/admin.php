<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\GroothandelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyordersController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProductController;
use App\Http\Livewire\Admin\Orderspagenas\Orders;
use App\Http\Livewire\Admin\Orderspagenas\Ordersdetails;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'user-role:admin'])->group(function () {
    Route::get('/dashboard/product-sales/', [ChartController::class, 'product_sales'])->name('product_sales');
    Route::get('/dashboard/general-sales/', [ChartController::class, 'general_sales'])->name('general_sales');
    Route::get('/dashboard/register-sales/', [ChartController::class, 'sales_per_register'])->name('sales_per_register');
    Route::get('/orders', [HomeController::class, 'admin'])->name('home');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('store/', [ProductController::class, 'store'])->name('store');
    Route::get('show/{product}', [ProductController::class, 'show'])->name('show');
    Route::get('edit/{product}', [ProductController::class, 'edit'])->name('edit');
    Route::put('edit/{product}', [ProductController::class, 'update'])->name('update');
    Route::delete('product/{product}', [ProductController::class, 'destroy'])->name('destroy');
    Route::get('/Bestellingen', Orders::class)->name('orders');
    Route::get('/Bestelling/{id}', Ordersdetails::class)->name('orderdetails.admin');

    /*Groot handel api req, GET all products */
    Route::get('/groothandel', [GroothandelController::class, 'index']);
    Route::get('/groothandel/bestellingen/', [GroothandelController::class, 'orders']);
    Route::get('/groothandel/{id}', [GroothandelController::class, 'show']);

    Route::get('order_generate-pdf/{order}', [PDFController::class, 'index'])->name('order_generate-pdf');

    Route::get('/myorders', [MyordersController::class, 'index'])->name('myorders');

    Route::get('/myorders/{id}', [MyordersController::class, 'show'])->name('myorders.show');

    Route::any('/myorders/import', [MyordersController::class, 'import'])->name('myorders.import');

});

Route::get('/product', [ProductController::class, 'index'])->name('index');
