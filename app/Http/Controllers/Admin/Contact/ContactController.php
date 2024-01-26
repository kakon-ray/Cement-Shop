<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index(){
        $allcontactmessage = Contact::all();
        return view('admin.contact.index', compact('allcontactmessage'));
    }
    public function delete_user_contact(Request $request){
        $contact = Contact::find($request->id);

        if (is_null($contact)) {

            return response()->json([
                'msg' => "Do not Find any Product",
                'status' => 404
            ], 404);
        } else {

            DB::beginTransaction();

            try {
        
                $contact->delete();
                DB::commit();

                return response()->json([
                    'status' => 200,
                    'msg' => 'Delete This Contact Message',
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
