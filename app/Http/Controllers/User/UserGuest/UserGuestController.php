<?php

namespace App\Http\Controllers\User\UserGuest;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Employe;
use App\Models\Gallery;
use App\Models\Products;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserGuestController extends Controller
{
    public function home()
    {
        $allproduct = Products::all()->reverse();
        $allemployee = Employe::all();
        $gallery = Gallery::all()->reverse();
        $slider = Slider::all()->reverse();

        return view('user.home.index',compact('allproduct','allemployee','gallery','slider'));
    }
    public function about()
    {
        return view('user.about.index');
    }
    public function shop()
    {
        return view('user.shop.index');
    }
    public function contact()
    {
        return view('user.contact.index');
    }
    public function gallery()
    {
        $gallery = Gallery::all()->reverse();
        return view('user.gallery.index',compact('gallery'));
    }
    public function employee()
    {
        $employee = Employe::all()->reverse();
        return view('user.employee.index',compact('employee'));
    }

    public function product_details(Request $request)
    {
        $product = Products::find($request->id);

        return view('user.home.product_details',compact('product'));
    }
    public function employee_details(Request $request)
    {
        $employee = Employe::find($request->id);

        return view('user.employee.imployee_details',compact('employee'));
    }
    public function contact_submit(Request $request)
    {

        $arrayRequest = [
            'name' => $request->name,
            'number' => $request->number,
            'email' => $request->email,
            'message' => $request->message,
        ];

        $arrayValidate  = [
            'name' => 'required',
            'number' => 'required|regex:/(01)[0-9]{9}/',
            'email' => 'required|email',
            'message' => 'required',
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

              
                $contact = Contact::create([
                    'name' => $request->name,
                    'number' => $request->number,
                    'email' => $request->email,
                    'message' => $request->message,
                ]);

                DB::commit();
            } catch (\Exception $err) {
                $contact = null;
            }

            if ($contact != null) {
                return response()->json([
                    'status' => 200,
                    'msg' => 'Your Message Submeted'
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
