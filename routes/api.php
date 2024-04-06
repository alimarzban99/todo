<?php

use App\Http\Controllers\Api\V1\TODOController;
use App\Http\Controllers\Api\V1\UserAuthController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('users/auth')
    ->as('api.users.')
    ->withoutMiddleware(['auth:sanctum'])
    ->group(static function () {
        Route::post('login', [UserAuthController::class, 'login'])->name('auth.login');
        Route::post('verify', [UserAuthController::class, 'verify'])->name('auth.verify');
        Route::post('logout', [UserAuthController::class, 'logout'])->name('auth.logout');
    });

Route::prefix('users')
    ->as('api.users.')
    ->group(static function () {
        Route::get('profile', [UserController::class, 'profile'])->name('profile');
    });

Route::as('api')
    ->group(static function () {
        Route::apiResource('todo', TodoController::class);
    });
