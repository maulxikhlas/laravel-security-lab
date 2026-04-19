<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

// Jalur yang akan kita hack
Route::post('/login-insecure', [LoginController::class, 'insecureLogin'])->name('login.insecure');

// Jalur yang aman
Route::post('/login-secure', [LoginController::class, 'secureLogin'])->name('login.secure');

use App\Http\Controllers\PostController;

Route::get('/guestbook', [PostController::class, 'index'])->name('guestbook.index');
Route::post('/guestbook', [PostController::class, 'store'])->name('guestbook.store');