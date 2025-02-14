<?php
namespace App;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('admin.home.index');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout-admin');
});

Route::prefix('admin')->name('admin.')->middleware(['admin'])->group(function () {
    Route::name('home.')->controller(DashboardController::class)->group(function () {
        Route::get('/', 'home')->name('index');
    });

    Route::name('users.')->prefix('users')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', "edit")->name('edit');
        Route::delete('/{id}', 'destroy')->name('destroy');
        Route::post('update', 'update')->name('update');
    });
});
