<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\ShareCategories;
use Illuminate\Support\Facades\Route;

Route::middleware([ShareCategories::class])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/categories/{category}', [PostController::class, 'category'])->name('categories.posts');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
});

Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});
