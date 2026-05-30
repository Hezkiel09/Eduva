<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\AssessmentResultController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.home');
})->name('home');


Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showSignup'])
        ->name('register');
    Route::post('/register', [AuthController::class, 'signup']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    // assesment
    Route::get('/assessment', [AssessmentController::class, 'index'])
        ->name('assessment.index');

    Route::post('/assessment/start', [AssessmentController::class, 'start'])
        ->name('assessment.start');

    Route::get('/assessment/{session}/question/{order}', [AssessmentController::class, 'showQuestion'])
        ->name('assessment.question');

    Route::post('/assessment/{session}/answer', [AssessmentController::class, 'submitAnswer'])
        ->name('assessment.answer');

    Route::get('/assessment/{session}/confirm', [AssessmentController::class, 'confirmFinish'])
        ->name('assessment.finish.confirm');

    Route::post('/assessment/{session}/finish', [AssessmentController::class, 'finish'])
        ->name('assessment.finish');

    Route::get('/result/{result}', [AssessmentResultController::class, 'show'])
        ->name('result.show');

    Route::get('/history', [AssessmentResultController::class, 'history'])
        ->name('result.history');
});
