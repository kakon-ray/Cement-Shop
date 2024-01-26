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
use Illuminate\Support\Facades\File;

class EmployeController extends Controller
{
    public function index()
    {
        $allemploye = Employe::all();
        return view('admin.employe.index', compact('allemploye'));
    }

    public function add()
    {
        return view('admin.employe.add');
    }
    public function edit_employe(Request $request)
    {
        $employe = Employe::find($request->id);
        return view('admin.employe.edit', compact('employe'));
    }

    public function add_employe_submit(Request $request)
    {

        $arrayRequest = [
            'name' => $request->name,
            'position' => $request->position,
            'phone' => $request->phone,
            'email' => $request->email,
            'image' => $request->image,
            'address' => $request->address,
        ];

        $arrayValidate  = [
            'name' => 'required',
            'position' => 'required',
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
                $slug = Str::slug($request->name, '-');

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
                    'position' => $request->position,
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

    public function edit_employe_submit(Request $request)
    {
        $employee = Employe::find($request->id);

        if (is_null($employee)) {
            return response()->json([
                'msg' => "Do not Find any Employee",
                'status' => 404
            ], 404);
        } else {
            if ($request->image) {
                $arrayRequest = [
                    'name' => $request->name,
                    'position' => $request->position,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'image' => $request->image,
                    'address' => $request->address,
                ];

                $arrayValidate  = [
                    'name' => 'required',
                    'position' => 'required',
                    'phone' => 'required',
                    'email' => 'required',
                    'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
                    'address' => 'required',
                ];
            } else {
                $arrayRequest = [
                    'name' => $request->name,
                    'position' => $request->position,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'address' => $request->address,
                ];

                $arrayValidate  = [
                    'name' => 'required',
                    'position' => 'required',
                    'phone' => 'required',
                    'email' => 'required',
                    'address' => 'required',
                ];
            }



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
                    $slug = Str::slug($request->name, '-');

                    if ($request->image) {
                        $file = $request->file('image');
                        $filename = $slug . '.' . $file->getClientOriginalExtension();

                        $img = Image::make($file);
                        $img->resize(500, 500)->save(public_path('uploads/' . $filename));

                        $host = $_SERVER['HTTP_HOST'];
                        $image = "http://" . $host . "/uploads/" . $filename;
                    }else{
                        $image = $request->old_img;
                    }

                    $employee->name =  $request->name;
                    $employee->position =  $request->position;
                    $employee->phone =  $request->phone;
                    $employee->email =  $request->email;
                    $employee->image =  $image;
                    $employee->address =  $request->address;
                    $employee->save();


                    DB::commit();
                } catch (\Exception $err) {
                    $employee = null;
                }

                if ($employee != null) {
                    return response()->json([
                        'status' => 200,
                        'msg' => 'Updated Employe'
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

    public function delete_employee_submit(Request $request)
    {
        $employe = Employe::find($request->id);

        if (is_null($employe)) {

            return response()->json([
                'msg' => "Do not Find any Product",
                'status' => 404
            ], 404);
        } else {

            DB::beginTransaction();

            try {
                // single thumbnail file delete kora hocce jodi image file delete hoy tarpor databse theke data delete kora hobe
                $pathinfo = pathinfo($employe->image);
                $filename = $pathinfo['basename'];
                $image_path = public_path("/uploads/") . $filename;

                if (File::exists($image_path)) {
                    File::delete($image_path);
                }


                $employe->delete();
                DB::commit();

                return response()->json([
                    'status' => 200,
                    'msg' => 'Delete This Employee',
                ], 200);
            } catch (\Exception $err) {

                DB::rollBack();

                return response()->json([
                    'msg' => "Internal Server Error",
                    'status' => 500,
                    'err_msg' => $err->getMessage()
                ], 500);
            }
        }
    }
}
