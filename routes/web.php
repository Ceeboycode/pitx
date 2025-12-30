<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Dispatcher\DashboardController as DispatcherDashboard;


Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboard::class)
        ->name('admin-dashboard');

    Route::get('/admin/users/create', [UserController::class, 'create'])
        ->name('admin-users-create');
    Route::post('/admin/users', [UserController::class, 'store'])
        ->name('admin-users-store');
});

Route::middleware(['auth', 'role:dispatcher'])->group(function () {
    Route::get('/dispatcher/dashboard', DispatcherDashboard::class)
        ->name('dispatcher-dashboard');
});
