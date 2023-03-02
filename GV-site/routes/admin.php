<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

Route::middleware(['auth','user-role:admin'])->group(function()
{
    Route::get('/yazan', [HomeController::class, 'admin'])->name('home');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('store/', [ProductController::class, 'store'])->name('store');
    Route::get('show/{product}', [ProductController::class, 'show'])->name('show');
    Route::get('edit/{product}', [ProductController::class, 'edit'])->name('edit');
    Route::put('edit/{product}',[ProductController::class, 'update'])->name('update');
    Route::delete('Product/{product}',[ProductController::class, 'destroy'])->name('destroy');
});
Route::get('/Product', [ProductController::class, 'index'])->name('index');
