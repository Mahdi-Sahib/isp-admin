<?php

namespace App\Http\Controllers;
use App\Device;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator, Input, Redirect ,Session ;

class DeviceController extends Controller
{
    /*
    * Display all data
    */
    public function index()
    {
        $data = Device::all();
        return view('vendor.adminlte.pages.one-page.devices')->with('data',$data);
    }

    /*
     * Add student data
     */
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'brand' => 'required',
            'brand_model' => 'required|unique:devices'
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
            $data = new Device;
            $data->brand                      = $request->brand;
            $data->brand_model                = $request->brand_model;
            $data->created_by                 = Auth::User()->id;
            $data->save();
            return back()
                ->with('success', 'This Device added successfully.');
        }
    }

    /*
     * View data
     */
    public function view(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = Device::find($id);
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
            'brand' => 'required',
            'brand_model' => 'required|unique:devices'
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
            $id = $request -> edit_id;
            $data = Device::find($id);
            $data -> brand_model            = $request -> brand_model  ;
            $data -> brand                  = $request -> brand;
            $data -> updated_by             = Auth::User()->id;
            $data -> save();
            return back()
                ->with('success','Record Updated successfully.');
        }
    }

    /*
    *   Delete record
    */
    public function delete(Request $request)
    {
        $id = $request -> id;
        $data = Device::find($id);
        $response = $data -> delete();
        if($response)
            echo "Record Deleted successfully.";
        else
            echo "There was a problem. Please try again later.";
    }
}
