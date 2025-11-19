<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\ChirpController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ChirpController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('chirps', ChirpController::class)->except(['index','create', 'show']);
});

Route::middleware('guest')->group(function () {
    Route::view('/register',  'auth.register')->name('register');
    Route::post('/register',Register::class);

    Route::view('/login',  'auth.login')->name('login');
    Route::post('/login', Login::class);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', Logout::class)->name('logout');
});
