<?php

use App\Http\Controllers\ChartController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'user-role:management'])->group(function () {
    Route::get('/dashboard/product-sales/', [ChartController::class, 'product_sales'])->name('product_sales');
    Route::get('/dashboard/general-sales/', [ChartController::class, 'general_sales'])->name('general_sales');
    Route::get('/dashboard/register-sales/', [ChartController::class, 'sales_per_register'])->name('sales_per_register');
});
