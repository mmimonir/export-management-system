<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\Http\Controllers\BlogController;

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'welcome'])->name('welcome');
    
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::resource('posts', BlogController::class)->names('post');
    });
});
