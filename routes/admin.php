<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AdminRegistationController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ForgetController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;

// admin dashboard
Route::name('admin.')->prefix('admin')->group(function () {
    Route::middleware(['AdminAuth','VerifiedAdminEmail'])->group(function (){
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        
    });
});

// category dashboard
Route::name('admin.')->prefix('admin')->group(function () {
    Route::middleware(['AdminAuth','VerifiedAdminEmail'])->group(function (){
        Route::get('category', [CategoryController::class, 'category'])->name('category');
        Route::post('category/submit', [CategoryController::class, 'category_submit'])->name('category.submit');
        
    });
});