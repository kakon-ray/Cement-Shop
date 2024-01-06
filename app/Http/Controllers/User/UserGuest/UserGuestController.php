<?php

namespace App\Http\Controllers\User\UserGuest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserGuestController extends Controller
{
    public function home()
    {
        return view('user.home.index');
    }
    public function about()
    {
        return view('user.about.index');
    }
    public function shop()
    {
        return view('user.shop.index');
    }
    public function contact()
    {
        return view('user.contact.index');
    }

}
