<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(){
        return view('admin.category.category');
    }
    public function category_submit(Request $request){
       dd($request->all());
    }
}
