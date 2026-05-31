<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\AssessmentResultController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndustryTrendController;
use App\Http\Controllers\Admin\BootcampController as AdminBootcampController;
use App\Http\Controllers\Admin\QuestionController as AdminQuestionController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
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

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'show'])
        ->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::get('/trends', [IndustryTrendController::class, 'index'])
        ->name('trends.index');

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

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/users', [AdminUserController::class, 'index'])
            ->name('users.index');
        Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])
            ->name('users.destroy');

        Route::get('/reports', [AdminReportController::class, 'index'])
            ->name('reports.index');
        Route::get('/reports/user/{user}', [AdminReportController::class, 'showUser'])
            ->name('reports.user');

        Route::resource('bootcamps', AdminBootcampController::class)
            ->except(['show']);

        Route::get('/questions', [AdminQuestionController::class, 'index'])
            ->name('questions.index');
    });
