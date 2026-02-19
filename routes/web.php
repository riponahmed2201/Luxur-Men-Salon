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

//Login
Route::get('/', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login'])->name('admin.login');

Route::middleware(['admin', 'prevent.back.history', 'xss'])->group(function () {

    Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');

    //Password
    Route::get('password-change', [PasswordChangeController::class, 'passwordChange'])->name('admin.passwordChange');
    Route::put('password/update', [PasswordChangeController::class, 'updatePassword'])->name('admin.password.update');

    //Profile
    Route::get('profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::put('profile/update', [ProfileController::class, 'update'])->name('admin.profile.update');

    //Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    //Services
    Route::resource('services', ServiceController::class)->names('admin.services');

    //Employees
    Route::resource('employees', EmployeeController::class)->names('admin.employees');

    //Billings
    Route::resource('billings', BillingController::class)->names('admin.billings');

    //Reports
    Route::get('reports', [ReportController::class, 'index'])->name('admin.reports.index');

    //Expenses
    Route::resource('expenses', ExpenseController::class)->names('admin.expenses');
});
