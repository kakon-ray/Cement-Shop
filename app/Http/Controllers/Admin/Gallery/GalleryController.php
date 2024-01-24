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
    public function index()
    {
        $allgallery = Gallery::all();
        return view('admin.gallery.index',compact('allgallery'));
    }
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
                    $file = $request->file('thumbnail');
                    $filename = $slug . '.' . $file->getClientOriginalExtension();

                    $img = Image::make($file);
                    $img->resize(320, 240)->save(public_path('uploads/' . $filename));

                    $host = $_SERVER['HTTP_HOST'];
                    $image = "http://" . $host . "/uploads/" . $filename;

                    $data['thumbnail'] = $image;   //http://127.0.0.1:8000/uploads/kakon-ray.jpg
                }
                //multiple images
                $images = array();
                if ($request->hasFile('images')) {
                    foreach ($request->file('images') as $key => $image2) {
                        $imageName = hexdec(uniqid()) . '.' . $image2->getClientOriginalExtension();

                        $img = Image::make($image2);
                        $img->resize(320, 240)->save(public_path('uploads/' . $imageName));

                        $host = $_SERVER['HTTP_HOST'];
                        $imageLink = "http://" . $host . "/uploads/" . $imageName;

                        array_push($images, $imageLink);
                    }
                    $data['images'] = json_encode($images);
                }


                $gallery = Gallery::insert($data);

                DB::commit();
            } catch (\Exception $err) {
                $gallery = null;
            }

            if ($gallery != null) {
                return response()->json([
                    'status' => 200,
                    'msg' => 'Submited New Images'
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
