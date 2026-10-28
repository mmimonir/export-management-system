<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\Http\Controllers\BlogController;

Route::prefix('blog')->name('blog.')->group(function () {
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/', [BlogController::class, 'dashboard'])->name('welcome');
        Route::get('dashboard', [BlogController::class, 'dashboard'])->name('dashboard');
        Route::resource('posts', BlogController::class)->names('post');
    });
});
