<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::middleware(['auth','user-role:admin'])->group(function()
{
    Route::get('/yazan', [HomeController::class, 'admin'])->name('home');
});
