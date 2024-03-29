<?php

use App\Http\Controllers\User\Cart\CartController;
use App\Http\Controllers\User\Checkout\CheckoutController;
use App\Http\Controllers\User\Dashboard\DashboardController;
use App\Http\Controllers\User\UserGuest\UserGuestController;
use App\Http\Controllers\User\Wishlist\WishlistController;
use Illuminate\Support\Facades\Route;



// user guest rotues
Route::get('/', [UserGuestController::class, 'home'])->name('home');
Route::name('user.')->prefix('user')->group(function () {
    Route::get('about', [UserGuestController::class, 'about'])->name('about');
    Route::get('shop', [UserGuestController::class, 'shop'])->name('shop');
    Route::get('contact', [UserGuestController::class, 'contact'])->name('contact');
    Route::get('gallery', [UserGuestController::class, 'gallery'])->name('gallery');
    Route::get('employee', [UserGuestController::class, 'employee'])->name('employee');
    Route::get('product/details/{id}', [UserGuestController::class, 'product_details'])->name('product.details');
    Route::get('employee/details/{id}', [UserGuestController::class, 'employee_details'])->name('employee.details');
    Route::post('contact/submit', [UserGuestController::class, 'contact_submit'])->name('contact.submit');
});






require __DIR__.'/admin_auth.php';
