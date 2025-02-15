<?php

use App\Http\Controllers\API\v1\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('user')->controller(UserController::class)->group(function () {
        Route::get('/', 'get');
        Route::get('/{userId}', 'detail');
        Route::post('/', 'store');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'delete');
    });
});