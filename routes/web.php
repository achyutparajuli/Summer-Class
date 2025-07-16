<?php

use PHPUnit\Event\Code\TestMethod;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\TestMiddleware;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/service', [HomeController::class, 'service'])->name('service');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');

Route::prefix('admin/movies')
    ->as('admin.movies.')
    ->middleware(TestMiddleware::class)
    ->controller(MovieController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{movieId}', 'edit')->name('edit');
        Route::put('/{movieId}', 'update')->name('update');
        Route::delete('/{movieId}', 'delete')->name('delete');
    });
