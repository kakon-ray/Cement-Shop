<?php

namespace App\Http\Controllers\User\UserGuest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserGuestController extends Controller
{
    public function home()
    {
        return view('user.guest.home');
    }
    public function about()
    {
        return view('user.guest.about');
    }
    public function shop()
    {
        return view('user.guest.shop');
    }
    public function contact()
    {
        return view('user.guest.contact');
    }
}
