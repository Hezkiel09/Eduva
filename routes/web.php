<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Landing page 
Route::get('/', function () {
    return view('home.home');
})->name('home');


Route::middleware('guest')->group(function () {

    // Form login
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    // Proses login
    Route::post('/login', [AuthController::class, 'login']);

    // Form register
    Route::get('/register', [AuthController::class, 'showSignup'])
        ->name('register');

    // Proses register
    Route::post('/register', [AuthController::class, 'signup']);
});

Route::middleware('auth')->group(function () {

    // Logout user
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

   
});