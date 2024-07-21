<?php

use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\AddStaffController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\StaffManagementController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/staffMaanagent', [AddStaffController::class, 'index'])->name('admin.addstaff');
    Route::get('/reports', [ReportsController::class, 'index'])->name('admin.reports');
    Route::get('/staffmanagement', [StaffManagementController::class, 'index'])->name('admin.staffmanagement');
});
