<?php

namespace App\Http\Controllers\User\UserGuest;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Models\Gallery;
use App\Models\Products;
use Illuminate\Http\Request;

class UserGuestController extends Controller
{
    public function home()
    {
        $allproduct = Products::all()->reverse();
        $allemployee = Employe::all();
        $gallery = Gallery::all()->reverse();

        return view('user.home.index',compact('allproduct','allemployee','gallery'));
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

    public function product_details(Request $request)
    {
        $product = Products::find($request->id);

        return view('user.home.product_details',compact('product'));
    }

}
