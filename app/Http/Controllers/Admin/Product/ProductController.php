<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function product()
    {
        $allproduct = Products::all();
        return view('admin.product.index', compact('allproduct'));
    }
    public function add_product()
    {
        return view('admin.product.addproduct');
    }
    public function update_product(Request $request)
    {
        $updateproduct = Products::find($request->id);
        return view('admin.product.updateproduct', compact('updateproduct'));
    }

    public function add_product_submit(Request $request)
    {


        if ($request->category == 'cement') {

            $arrayRequest = [
                'brand_title' => $request->brand_title,
                'cement_brand' => $request->cement_brand,
                'cement_brand_type' => $request->cement_brand_type,
                'product_details' => $request->product_details,
                'image' => $request->image,
                'price' => $request->price,
            ];

            $arrayValidate  = [
                'brand_title' => 'required',
                'cement_brand' => 'required',
                'cement_brand_type' => 'required',
                'product_details' => 'required',
                'brand_title' => 'required',
                'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
                'price' => "required|regex:/^\d+(\.\d{1,2})?$/"

            ];
        } else if ($request->category == 'rod') {

            $arrayRequest = [
                'brand_title' => $request->brand_title,
                'rod_brand' => $request->rod_brand,
                'rod_size' => $request->rod_size,
                'product_details' => $request->product_details,
                'image' => $request->image,
                'price' => $request->price,
            ];

            $arrayValidate  = [
                'brand_title' => 'required',
                'rod_brand' => 'required',
                'rod_size' => 'required',
                'product_details' => 'required',
                'brand_title' => 'required',
                'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
                'price' => "required|regex:/^\d+(\.\d{1,2})?$/"
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

                $img = $request->image;
                $image =  $img->store('/public/image');
                $image = (explode('/', $image))[2];
                $host = $_SERVER['HTTP_HOST'];
                $image = "http://" . $host . "/storage/image/" . $image;

                $products = Products::create([
                    'brand_title' => $request->brand_title,
                    'category' => $request->category,
                    'cement_brand' => $request->cement_brand,
                    'cement_brand_type' => $request->cement_brand_type,
                    'rod_brand' => $request->rod_brand,
                    'rod_size' => $request->rod_size,
                    'product_details' => $request->product_details,
                    'image' => $image,
                    'price' => $request->price,


                ]);

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
    public function update_product_submit(Request $request)
    {

        $product = Products::find($request->id);

        if (is_null($product)) {
            return response()->json([
                'msg' => "Do not Find any Product",
                'status' => 404
            ], 404);
        } else {
            if ($request->image) {

                if ($request->category == 'cement') {

                    $arrayRequest = [
                        'brand_title' => $request->brand_title,
                        'cement_brand' => $request->cement_brand,
                        'cement_brand_type' => $request->cement_brand_type,
                        'product_details' => $request->product_details,
                        'image' => $request->image,
                        'price' => $request->price,
                    ];

                    $arrayValidate  = [
                        'brand_title' => 'required',
                        'cement_brand' => 'required',
                        'cement_brand_type' => 'required',
                        'product_details' => 'required',
                        'brand_title' => 'required',
                        'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
                        'price' => "required|regex:/^\d+(\.\d{1,2})?$/"

                    ];
                } else if ($request->category == 'rod') {

                    $arrayRequest = [
                        'brand_title' => $request->brand_title,
                        'rod_brand' => $request->rod_brand,
                        'rod_size' => $request->rod_size,
                        'product_details' => $request->product_details,
                        'image' => $request->image,
                        'price' => $request->price,
                    ];

                    $arrayValidate  = [
                        'brand_title' => 'required',
                        'rod_brand' => 'required',
                        'rod_size' => 'required',
                        'product_details' => 'required',
                        'brand_title' => 'required',
                        'image' =>['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
                        'price' => "required|regex:/^\d+(\.\d{1,2})?$/"

                    ];
                }
            } else {

                if ($request->category == 'cement') {

                    $arrayRequest = [
                        'brand_title' => $request->brand_title,
                        'cement_brand' => $request->cement_brand,
                        'cement_brand_type' => $request->cement_brand_type,
                        'product_details' => $request->product_details,
                        'price' => $request->price,
                    ];

                    $arrayValidate  = [
                        'brand_title' => 'required',
                        'cement_brand' => 'required',
                        'cement_brand_type' => 'required',
                        'product_details' => 'required',
                        'brand_title' => 'required',
                        'price' => "required|regex:/^\d+(\.\d{1,2})?$/"

                    ];
                } else if ($request->category == 'rod') {

                    $arrayRequest = [
                        'brand_title' => $request->brand_title,
                        'rod_brand' => $request->rod_brand,
                        'rod_size' => $request->rod_size,
                        'product_details' => $request->product_details,
                        'price' => $request->price,
                    ];

                    $arrayValidate  = [
                        'brand_title' => 'required',
                        'rod_brand' => 'required',
                        'rod_size' => 'required',
                        'product_details' => 'required',
                        'brand_title' => 'required',
                        'price' => "required|regex:/^\d+(\.\d{1,2})?$/"

                    ];
                }
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

                    if ($request->image) {
                        $img = $request->image;
                        $image =  $img->store('/public/image');
                        $image = (explode('/', $image))[2];
                        $host = $_SERVER['HTTP_HOST'];
                        $image = "http://" . $host . "/storage/image/" . $image;
                    } else {
                        $image = $request->old_image;
                    }

                    $product->brand_title = $request->brand_title;
                    $product->category = $request->category;
                    $product->cement_brand = $request->cement_brand;
                    $product->cement_brand_type = $request->cement_brand_type;
                    $product->rod_brand = $request->rod_brand;
                    $product->rod_size = $request->rod_size;
                    $product->product_details = $request->product_details;
                    $product->price = $request->price;
                    $product->image = $image;
                    $product->save();

                    DB::commit();
                } catch (\Exception $err) {
                    $product = null;
                }

                if ($product != null) {
                    return response()->json([
                        'status' => 200,
                        'msg' => 'Updated Products'
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

    public function delete_product_submit(Request $request)
    {
        $product = Products::find($request->id);

        if (is_null($product)) {

            return response()->json([
                'msg' => "Do not Find any Product",
                'status' => 404
            ], 404);
        } else {

            DB::beginTransaction();

            try {

                $product->delete();
                DB::commit();

                return response()->json([
                    'status' => 200,
                    'msg' => 'Delete This Product',
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
