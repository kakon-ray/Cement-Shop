<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Product\ProductController;

// admin dashboard
Route::middleware(['AdminAuth', 'VerifiedAdminEmail'])->group(function () {

    Route::name('admin.')->prefix('admin')->group(function () {
        // image upload
        Route::post('image-upload', [DashboardController::class, 'storeImage'])->name('image.upload');

        // dashboard route
        Route::name('dashboard.')->prefix('dashboard')->group(function () {
            Route::get('home', [DashboardController::class, 'dashboard'])->name('home');
        });

        // category start
        Route::name('dashboard.')->prefix('dashboard')->group(function () {
            Route::name('product.')->prefix('product')->group(function () {
                Route::get('home', [ProductController::class, 'product'])->name('home');
                Route::get('add', [ProductController::class, 'add_product'])->name('add');
                Route::get('update', [ProductController::class, 'update_product'])->name('update');
                Route::post('add/submit', [ProductController::class, 'add_product_submit'])->name('add.submit');
            });
        });

        // category end


    });
});

// category dashboard
