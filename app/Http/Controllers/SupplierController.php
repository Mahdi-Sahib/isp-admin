<?php

namespace App\Http\Controllers;
use App\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator, Input, Redirect ,Session ;

class SupplierController extends Controller
{
    /*
* Display all data
*/
    public function index()
    {
        $data = Supplier::all();
        return view('vendor.adminlte.pages.sales.suppliers')->with('data',$data);
    }

    /*
     * Add student data
     */
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:suppliers'
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
            $data = new Supplier;
            $data->name                      = $request->name;
            $data->phone                     = $request->phone;
            $data->email                     = $request->email;
            $data->address                   = $request->address;
            $data->contact                   = $request->contact;
            $data->website                   = $request->website;
            $data->bank_account              = $request->bank_account;
            $data->currency                  = $request->currency;
            $data->payment_terms             = $request->payment_terms;
            $data->tax_included              = $request->tax_included;
            $data->created_by                = Auth::User()->id;
            $data->updated_by                = Auth::User()->id;
            $data->save();
            return back()
                ->with('success', 'This Supplier  added successfully.');
        }
    }

    /*
     * View data
     */
    public function view(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = Supplier::find($id);
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
            'name' => 'required|unique:suppliers'
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
            $id = $request -> edit_id;
            $data = Supplier::find($id);
            $data->name                      = $request->name;
            $data->phone                     = $request->phone;
            $data->email                     = $request->email;
            $data->address                   = $request->address;
            $data->contact                   = $request->contact;
            $data->website                   = $request->website;
            $data->bank_account              = $request->bank_account;
            $data->currency                  = $request->currency;
            $data->payment_terms             = $request->payment_terms;
            $data->tax_included              = $request->tax_included;
            $data->updated_by                = Auth::User()->id;
            $data -> save();
            return back()
                ->with('success','Supplier Updated successfully.');
        }
    }

    /*
    *   Delete record
    */
    public function delete(Request $request)
    {
        $id = $request -> id;
        $data = Supplier::find($id);
        $response = $data -> delete();
        if($response)
            echo "Supplier Deleted successfully.";
        else
            echo "There was a problem. Please try again later.";
    }
}
