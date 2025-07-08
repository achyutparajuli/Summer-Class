<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/service', [HomeController::class, 'service'])->name('service');

Route::group(['prefix' => 'formSetting'], function () {
    //
});




Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');

Route::get('/admin/movies', [MovieController::class, 'index'])->name('admin.movies.index');
