<?php

use Illuminate\Support\Facades\Route;
use Modules\Store\Http\Controllers\StoreController;

Route::prefix('store')->name('store.')->group(function () {
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/', [StoreController::class, 'dashboard'])->name('welcome');
        Route::get('dashboard', [StoreController::class, 'dashboard'])->name('dashboard');
        Route::resource('products', StoreController::class)->names('product');
    });
});
