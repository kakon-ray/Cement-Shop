<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    public function gallery()
    {
        return view('admin.gallery.addgallery');
    }

    public function store(Request $request)
    {

        // dd($request->all());

        $arrayRequest = [
            'name' => $request->name,
            'thumbnail' => $request->thumbnail,
        ];

        $arrayValidate  = [
            'name' => 'required',
            'thumbnail' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],

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

                $slug = Str::slug($request->name, '-');
                $data = array();

                if ($request->thumbnail) {
                    $thumbnail = $request->thumbnail;
                    $photoname = $slug . '.' . $thumbnail->getClientOriginalExtension();
                    $photoname = Image::make($thumbnail)->resize(600, 600)->save('public/files/product/'.$photoname);
                    $data['thumbnail'] = $photoname;   // public/files/product/plus-point.jpg
                }
                //multiple images
                $images = array();
                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $key => $image) {
                        $imageName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                        Image::make($image)->resize(600, 600)->save('public/files/product/' . $imageName);
                        array_push($images, $imageName);
                    }
                    $data['images'] = json_encode($images);
                }


                DB::table('galleries')->insert($data);

                DB::commit();
            } catch (\Exception $err) {
                $products = null;
            }

            if ($products != null) {
                return response()->json([
                    'status' => 200,
                    'msg' => 'Submited New Products'
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
