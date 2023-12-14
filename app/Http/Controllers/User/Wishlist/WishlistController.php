<?php

namespace App\Http\Controllers\User\Wishlist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function wishlist()
    {
        return view('user.wishlist.wishlist');
    }
}
