<?php

namespace App\Http\Controllers;
use App\AddressHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator, Input, Redirect ,Session ;

class AddressHelperController extends Controller
{
    /*
    * Display all data
    */
    public function index()
    {
        $data = AddressHelper::all();
        return view('vendor.adminlte.pages.one-page.address')->with('data',$data);
    }

    /*
     * Add student data
     */
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'place_1' => 'required|unique:address_helpers'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator);

        } else {
            $data = new AddressHelper;
            $data->place_1                  = $request->place_1;
            $data->created_by           = Auth::User()->id;
            $data->save();
            return back()
                ->with('success', 'this address added successfully.');
        }
    }

    /*
     * View data
     */
    public function view(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = AddressHelper::find($id);
            //echo json_decode($info);
            return response()->json($info);
        }
    }

    /*
    *   Update data
    */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'place_1' => 'required|unique:address_helpers'
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
            $id = $request -> edit_id;
            $data = AddressHelper::find($id);
            $data->place_1              = $request -> edit_address;
            $data->updated_by           = Auth::User()->id;
            $data -> save();
            return back()
                ->with('Success','Address Updated successfully.');
        }
    }

    /*
    *   Delete record
    */
    public function delete(Request $request)
    {
        $id = $request -> id;
        $data = AddressHelper::find($id);
        $response = $data -> delete();
        if($response)
            echo "The Address Deleted successfully.";
        else
            echo "There was a problem. Please try again later.";
    }
}
