<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Models\Products;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    public function add()
    {
        return view('admin.slider.add');
    }
    public function edit_slider(Request $request)
    {
        $slider = Slider::find($request->id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function add_slider_submit(Request $request)
    {

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
                }

                $slider = Slider::create([
                    'title' => $request->title,
                    'desc' => $request->desc,
                    'image' => $image,
                ]);

                DB::commit();
            } catch (\Exception $err) {
                $slider = null;
            }

            if ($slider != null) {
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
    public function edit_slider_submit(Request $request)
    {

        $slider = Slider::find($request->id);

        if (is_null($slider)) {
            return response()->json([
                'msg' => "Do not Find any Slider",
                'status' => 404
            ], 404);
        } else {
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
                    } else {
                        $image = $request->old_image;
                    }
    
    
                    $slider->title =  $request->title;
                    $slider->desc =  $request->desc;
                    $slider->image =  $image;
                    $slider->save();
    
                    DB::commit();
                } catch (\Exception $err) {
                    $slider = null;
                }
    
                if ($slider != null) {
                    return response()->json([
                        'status' => 200,
                        'msg' => 'Updated Slider Completed'
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

    public function delete_slider_submit(Request $request)
    {
        $slider = Slider::find($request->id);

        if (is_null($slider)) {

            return response()->json([
                'msg' => "Do not Find any Slider",
                'status' => 404
            ], 404);
        } else {

            DB::beginTransaction();

            try {
                // single thumbnail file delete kora hocce jodi image file delete hoy tarpor databse theke data delete kora hobe
                $pathinfo = pathinfo($slider->image);
                $filename = $pathinfo['basename'];
                $image_path = public_path("/uploads/") . $filename;

                if (File::exists($image_path)) {
                    File::delete($image_path);
                }


                $slider->delete();
                DB::commit();

                return response()->json([
                    'status' => 200,
                    'msg' => 'Delete This Slider',
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
