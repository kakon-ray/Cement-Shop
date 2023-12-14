<?php

use App\Http\Controllers\User\Cart\CartController;
use App\Http\Controllers\User\Checkout\CheckoutController;
use App\Http\Controllers\User\Dashboard\DashboardController;
use App\Http\Controllers\User\UserGuest\UserGuestController;
use App\Http\Controllers\User\Wishlist\WishlistController;
use Illuminate\Support\Facades\Route;




Route::get('/', [UserGuestController::class, 'home'])->name('home');

Route::name('user.')->prefix('user')->group(function () {

    Route::get('about', [UserGuestController::class, 'about'])->name('about');
    Route::get('shop', [UserGuestController::class, 'shop'])->name('shop');
    Route::get('contact', [UserGuestController::class, 'contact'])->name('contact');
    Route::get('product/details/{id}', [UserGuestController::class, 'product_details'])->name('product.details');

    Route::middleware('auth','verified')->group(function () {
        Route::get('dashboard', [CartController::class, 'dashboard'])->name('dashboard');

        Route::get('cart', [CartController::class, 'cart'])->name('cart');
        Route::get('checkout', [CheckoutController::class, 'checkout'])->name('checkout');

        Route::get('wishlist', [WishlistController::class, 'wishlist'])->name('wishlist');
 
    });
    
});

require __DIR__.'/auth.php';
require __DIR__.'/admin_auth.php';
