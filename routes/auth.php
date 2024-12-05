<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

/**
 * Authentication Routes
 * 
 * This file contains the authentication routes for the application.
 * It defines routes for guest users (registration, login, password reset)
 * and authenticated users (email verification, password confirmation, logout).
 */

// Guest routes
Route::middleware('guest')->group(function () {
    /**
     * Show the registration form.
     */
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    /**
     * Handle registration submission.
     */
    Route::post('register', [RegisteredUserController::class, 'store']);

    /**
     * Show the login form.
     */
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    /**
     * Handle login submission.
     */
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    /**
     * Show the form to request a password reset link.
     */
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    /**
     * Send password reset link.
     */
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    /**
     * Show the form to reset password.
     */
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    /**
     * Handle password reset submission.
     */
    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    /**
     * Show email verification notice.
     */
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    /**
     * Verify email address.
     */
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    /**
     * Resend email verification notification.
     */
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    /**
     * Show password confirmation form.
     */
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    /**
     * Handle password confirmation.
     */
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    /**
     * Update user password.
     */
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    /**
     * Log out the authenticated user.
     */
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
