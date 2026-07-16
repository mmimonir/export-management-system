<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DemoUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/demo-users', [DemoUserController::class, 'index'])->name('demo.users');
    Route::get('/demo-users/data', [DemoUserController::class, 'data'])->name('demo.users.data');
});

require __DIR__.'/auth.php';
