<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PasswordChangeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\BillingController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ExpenseController;
use Illuminate\Support\Facades\Route;

// Redirect root to current login status
Route::get('/', function () {
    return redirect()->route('admin.login');
});

// Admin Routes
Route::prefix('admin')->group(function () {
    // Login
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login.submit');

    Route::middleware(['admin', 'prevent.back.history', 'xss'])->group(function () {
        Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');

        // Dashboard
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        // Profile
        Route::get('profile', [ProfileController::class, 'index'])->name('admin.profile');
        Route::put('profile/update', [ProfileController::class, 'update'])->name('admin.profile.update');

        // Password Change
        Route::get('password-change', [PasswordChangeController::class, 'passwordChange'])->name('admin.passwordChange');
        Route::put('password/update', [PasswordChangeController::class, 'updatePassword'])->name('admin.password.update');

        // Modules
        Route::resource('services', ServiceController::class)->names('admin.services');
        Route::resource('employees', EmployeeController::class)->names('admin.employees');
        Route::resource('billings', BillingController::class)->names('admin.billings');
        Route::get('reports', [ReportController::class, 'index'])->name('admin.reports.index');
        Route::resource('expenses', ExpenseController::class)->names('admin.expenses');
    });
});
