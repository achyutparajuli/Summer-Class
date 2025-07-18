<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/service', [HomeController::class, 'service'])->name('service');

Route::prefix('admin/register')
    ->as('admin.register.')
    ->controller(RegisterController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });

Route::prefix('admin/login')
    ->as('admin.login.')
    ->controller(LoginController::class)->group(function () {
        Route::get('/verification/{token}', 'verification')->name('verification');
        Route::get('/', 'index')->name('index');
        Route::post('/', 'check')->name('check');
    });




Route::prefix('admin')
    ->middleware(AuthMiddleware::class)
    ->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])
            ->name('admin.dashboard.index');

        Route::prefix('movies')
            ->as('admin.movies.')
            ->controller(MovieController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{movieId}', 'edit')->name('edit');
                Route::put('/{movieId}', 'update')->name('update');
                Route::delete('/{movieId}', 'delete')->name('delete');
            });
    });
