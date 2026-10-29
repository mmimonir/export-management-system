<?php

use Illuminate\Support\Facades\Route;
use Modules\EMS\Http\Controllers\EMSController;
use Modules\EMS\Http\Controllers\ExportProductController;
use Modules\EMS\Http\Controllers\ProductCategoryController;

Route::prefix('ems')->name('ems.')->group(function () {
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/', [EMSController::class, 'dashboard'])->name('welcome');
        Route::get('dashboard', [EMSController::class, 'dashboard'])->name('dashboard');
        Route::view('products/manage', 'ems::products.index')->name('products.manage');
        Route::view('categories/manage', 'ems::categories.index')->name('categories.manage');

        Route::apiResource('products', ExportProductController::class);
        Route::apiResource('categories', ProductCategoryController::class);
    });
});
