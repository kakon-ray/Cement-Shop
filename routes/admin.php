<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Product\ProductController;

// admin dashboard
Route::middleware(['AdminAuth', 'VerifiedAdminEmail'])->group(function () {

    Route::name('admin.')->prefix('admin')->group(function () {

        // dashboard route
        Route::name('dashboard.')->prefix('dashboard')->group(function () {
            Route::get('home', [DashboardController::class, 'dashboard'])->name('home');
        });

        // category start
        Route::name('dashboard.')->prefix('dashboard')->group(function () {
            Route::name('product.')->prefix('product')->group(function () {
                Route::get('home', [ProductController::class, 'product'])->name('home');
            });
        });

        // category end


    });
});

// category dashboard
