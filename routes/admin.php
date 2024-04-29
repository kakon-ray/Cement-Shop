<?php

use App\Http\Controllers\Admin\AboutUs\AboutUsController;
use App\Http\Controllers\Admin\Contact\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Employe\EmployeController;
use App\Http\Controllers\Admin\Gallery\GalleryController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Slider\SliderController;

// admin dashboard
Route::middleware(['AdminAuth'])->group(function () {

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

            Route::name('employee.')->prefix('employee')->group(function () {
                Route::get('/', [EmployeController::class, 'index'])->name('home');
                Route::get('add', [EmployeController::class, 'add'])->name('add');
                Route::post('add/submit', [EmployeController::class, 'add_employe_submit'])->name('add.submit');
                Route::get('update', [EmployeController::class, 'edit_employe'])->name('update');
                Route::post('update/submit', [EmployeController::class, 'edit_employe_submit'])->name('update.submit');
                Route::get('delete', [EmployeController::class, 'delete_employee_submit']);
            });

            Route::name('contact.')->prefix('contact')->group(function () {
                Route::get('/', [ContactController::class, 'index'])->name('home');
                Route::get('delete', [ContactController::class, 'delete_user_contact']);
            });

            Route::name('slider.')->prefix('slider')->group(function () {
                Route::get('/', [SliderController::class, 'index'])->name('home');
                Route::get('add', [SliderController::class, 'add'])->name('add');
                Route::post('add/submit', [SliderController::class, 'add_slider_submit'])->name('add.submit');
                Route::get('update', [SliderController::class, 'edit_slider'])->name('update');
                Route::post('update/submit', [SliderController::class, 'edit_slider_submit'])->name('update.submit');
                Route::get('delete', [SliderController::class, 'delete_slider_submit']);
            });

            Route::name('aboutus.')->prefix('aboutus')->group(function () {
                Route::get('/', [AboutUsController::class, 'index'])->name('home');
                Route::post('add/submit', [AboutUsController::class, 'add_submit'])->name('add.submit');
            });


        });

        // category end


    });
});

// category dashboard
