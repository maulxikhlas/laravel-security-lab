<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// Portal Utama
Route::get('/', function () {
    return view('lab-index');
});

// 1. Pintu Zona RENTAN (Merah)
Route::get('/login-insecure', function () { return view('login-insecure'); });
Route::post('/login-insecure', [LoginController::class, 'insecureLogin'])->name('login.insecure');

// 2. Pintu Zona AMAN (Hijau)
Route::get('/login-secure', function () { return view('login-secure'); });
Route::post('/login-secure', [LoginController::class, 'secureLogin'])->name('login.secure');

// Dashboard CTF
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::post('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');