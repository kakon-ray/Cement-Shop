<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product(){
        return view('admin.product.index');
    }
    public function add_product(){
        return view('admin.product.addproduct');
    }
    public function update_product(){
        return view('admin.product.updateproduct');
    }

    public function add_product_submit(Request $request){
        dd($request->all());
    }
}
