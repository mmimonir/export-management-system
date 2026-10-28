<?php

use Illuminate\Support\Facades\Route;
use Modules\EMS\Http\Controllers\EMSController;

Route::prefix('ems')->name('ems.')->group(function () {
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/', [EMSController::class, 'dashboard'])->name('welcome');
        Route::get('dashboard', [EMSController::class, 'dashboard'])->name('dashboard');
        Route::resource('products', EMSController::class)->names('product');
    });
});
