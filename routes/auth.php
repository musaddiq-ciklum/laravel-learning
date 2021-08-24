<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

/*Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest');*/
/*      Front user      */
Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('user_register');
Route::get('/login', [UserController::class, 'webLogin'])
    ->middleware('guest')
    ->name('user_login');
Route::post('/login', [UserController::class, 'postWebLogin'])
    ->middleware('guest')
    ->name('post_user_login');
Route::get('/change-password', [UserController::class, 'changePassword'])
    ->middleware(['password.confirm'])
    ->name('change_password');
Route::post('/change-password', [UserController::class, 'postChangePassword'])
    ->middleware(['auth'])
    ->name('post_change_password');

Route::get('/forgot-password', [UserController::class, 'forgotPassword'])
    ->middleware('guest')
    ->name('password.request');
Route::post('/forgot-password', [UserController::class, 'passwordEmail'])
    ->middleware('guest')
    ->name('password.email');
Route::get('/reset-password/{token}', [UserController::class, 'resetPassword'])
    ->middleware('guest')
    ->name('password.reset');
Route::post('/reset-password', [UserController::class, 'postResetPassword'])
    ->middleware('guest')
    ->name('password.update');



Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/admin/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');



Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('auth')
                ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth', 'throttle:6,1'])
                ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth')
                ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');
