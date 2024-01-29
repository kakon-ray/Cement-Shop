<?php

namespace App\Http\Controllers\Admin\AboutUs;

use App\Http\Controllers\Controller;
use App\Models\AboutUS;
use App\Models\Employe;
use App\Models\Products;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use PhpParser\Node\Expr\New_;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutus = AboutUS::first();
        return view('admin.about.index', compact('aboutus'));
    }


    public function add_submit(Request $request)
    {

        if ($request->image) {
            $arrayRequest = [
                'title' => $request->title,
                'desc' => $request->desc,
                'image' => $request->image,
            ];

            $arrayValidate  = [
                'title' => 'required',
                'desc' => 'required',
                'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            ];
        } else {
            $arrayRequest = [
                'title' => $request->title,
                'desc' => $request->desc,
            ];

            $arrayValidate  = [
                'title' => 'required',
                'desc' => 'required',
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
                $slug = Str::slug($request->title, '-');

                if ($request->image) {
                    $file = $request->file('image');
                    $filename = $slug . '.' . $file->getClientOriginalExtension();

                    $img = Image::make($file);
                    $img->resize(1000, 500)->save(public_path('uploads/' . $filename));

                    $host = $_SERVER['HTTP_HOST'];
                    $image = "http://" . $host . "/uploads/" . $filename;
                }else{
                    $image = $request->old_image;
                }

                $aboutus = AboutUS::find(1);

                $aboutus->title = $request->title;
                $aboutus->desc = $request->desc;
                $aboutus->image = $image;
                $aboutus->save();

                DB::commit();
            } catch (\Exception $err) {
                $aboutus = null;
            }

            if ($aboutus != null) {
                return response()->json([
                    'status' => 200,
                    'msg' => 'Updated About Us'
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
