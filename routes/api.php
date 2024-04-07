<?php

use App\Http\Controllers\Api\V1\TaskController;
use App\Http\Controllers\Api\V1\UserAuthController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('users/auth')
    ->as('api.users.')
    ->withoutMiddleware(['auth:sanctum'])
    ->group(static function () {
        Route::post('login', [UserAuthController::class, 'login'])->name('auth.login');
        Route::get('verify/{user}', [UserAuthController::class, 'verify'])->name('auth.verify');
    });

Route::prefix('users')
    ->as('api.users.')
    ->group(static function () {
        Route::get('profile', [UserController::class, 'profile'])->name('profile');
        Route::post('auth/logout', [UserAuthController::class, 'logout'])->name('auth.logout');

    });

Route::as('api')
    ->group(static function () {
        Route::apiResource('task', TaskController::class);
        Route::get('task/done/{task}', [TaskController::class, 'done']);
    });
