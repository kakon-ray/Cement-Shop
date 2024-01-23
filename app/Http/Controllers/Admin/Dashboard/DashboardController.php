<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard.index');
    }

        // add course  ck editor image upload
        public function storeImage(Request $request)
        {
            if ($request->hasFile('upload')) {
                $originName = $request->file('upload')->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $request->file('upload')->getClientOriginalExtension();
                $fileName = $fileName . '_' . time() . '.' . $extension;
    
                $request->file('upload')->move(public_path('img/course'), $fileName);
    
                $url = asset('img/course/' . $fileName);
                return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
            }
        }
}
