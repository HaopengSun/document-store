<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\PasswordRequestController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DocumentController;
use Illuminate\Http\Request;

Route::redirect('/', '/home');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LogoutController::class, 'index'])->name('logout');

// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/verify-email', [EmailVerificationController::class, 'index'])
    ->middleware('auth')
    ->name('verification.notice');

Route::post('/verify-email/request', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.request');

Route::get('/verify-email/{id}/{hash}', [EmailVerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Route::get('/forgot-password', [PasswordRequestController::class, 'index'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [PasswordRequestController::class, 'resend'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'index'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'saveNewPassword'])
    ->middleware('guest')
    ->name('password.update');

Route::resource('/documents', DocumentController::class)->middleware('verified');

Route::get('/documents/{id}/{file}', [DocumentController::class, 'download'])->middleware('verified')->name('document.download');

Route::get('/documents/{id}/viewfile/{file}', [DocumentController::class, 'viewfile'])->middleware('verified')->name('document.viewfile');
