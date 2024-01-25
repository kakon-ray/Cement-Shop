<?php

namespace App\Http\Controllers\Admin\Employe;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class EmployeController extends Controller
{
    public function add_employe_submit(Request $request)
    {

        $arrayRequest = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'image' => $request->image,
            'address' => $request->address,
        ];

        $arrayValidate  = [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'image' => 'required',
            'address' => 'required',
        ];


        $response = Validator::make($arrayRequest, $arrayValidate);

        if ($response->fails()) {
            $msg = '';
            foreach ($response->getMessageBag()->toArray() as $item) {
                $msg = $item;
            };

            return response()->json([
                'status' => 400,
                'msg' => $msg
            ], 200);
        } else {
            DB::beginTransaction();

            try {

                // single thumbnil image upload
                $slug = Str::slug($request->brand_title, '-');

                if ($request->image) {
                    $file = $request->file('image');
                    $filename = $slug . '.' . $file->getClientOriginalExtension();

                    $img = Image::make($file);
                    $img->resize(500, 500)->save(public_path('uploads/' . $filename));

                    $host = $_SERVER['HTTP_HOST'];
                    $image = "http://" . $host . "/uploads/" . $filename;
                }

                $products = Employe::create([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'image' => $image,
                    'address' => $request->address,
                ]);

                DB::commit();
            } catch (\Exception $err) {
                $products = null;
            }

            if ($products != null) {
                return response()->json([
                    'status' => 200,
                    'msg' => 'Submited New Employe'
                ]);
            } else {
                return response()->json([
                    'status' => 500,
                    'msg' => 'Internal Server Error',
                    'err_msg' => $err->getMessage()
                ]);
            }
        }
    }
}
