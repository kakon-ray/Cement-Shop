<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Gallery\GalleryController;
use App\Http\Controllers\Admin\Product\ProductController;

// admin dashboard
Route::middleware(['AdminAuth', 'VerifiedAdminEmail'])->group(function () {

    Route::name('admin.')->prefix('admin')->group(function () {
        // image upload
        Route::post('image-upload', [DashboardController::class, 'storeImage'])->name('image.upload');

        // dashboard route
        Route::name('dashboard.')->prefix('dashboard')->group(function () {
            Route::get('/', [DashboardController::class, 'dashboard'])->name('home');
        });

        // category start
        Route::name('dashboard.')->prefix('dashboard')->group(function () {
            Route::name('product.')->prefix('product')->group(function () {
                Route::get('/', [ProductController::class, 'product'])->name('home');
                Route::get('add', [ProductController::class, 'add_product'])->name('add');
                Route::get('update/{id}', [ProductController::class, 'update_product'])->name('update');
                Route::post('add/submit', [ProductController::class, 'add_product_submit'])->name('add.submit');
                Route::post('update/submit', [ProductController::class, 'update_product_submit'])->name('update.submit');
                Route::get('delete', [ProductController::class, 'delete_product_submit']);
            });
            Route::name('gallery.')->prefix('gallery')->group(function () {
                Route::get('/', [GalleryController::class, 'index'])->name('home');
                Route::get('gallery', [GalleryController::class, 'gallery'])->name('add');
                Route::post('store', [GalleryController::class, 'store'])->name('store');
                Route::post('thumbnail/delete', [GalleryController::class, 'thumbnail_delete'])->name('thumbnail.delete');
            });
        });

        // category end


    });
});

// category dashboard
