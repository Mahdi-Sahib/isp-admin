<?php

namespace App\Http\Controllers;
use App\ConnectionType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator, Input, Redirect ,Session ;

class ConnectionTypeController extends Controller
{
    /*
    * Display all data
    */
    public function index()
    {
        $data = ConnectionType::all();
        return view('vendor.adminlte.pages.one-page.connection-type')->with('data',$data);
    }

    /*
     * Add student data
     */
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|unique:connection_types',
            'method' => 'required'
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
            $data = new ConnectionType;
            $data->type                    = $request->type;
            $data->method                  = $request->method;
            $data->created_by              = Auth::User()->id;
            $data->updated_by              = Auth::User()->id;
            $data->save();
            return back()
                ->with('success', 'this connection added successfully.');
        }
    }

    /*
     * View data
     */
    public function view(Request $request)
    {
        if($request->ajax()){
            $id   = $request->id;
            $info = ConnectionType::find($id);
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
            'type' => 'required|unique:connection_types',
            'method' => 'required'
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
            $id = $request -> edit_id;
            $data = ConnectionType::find($id);
            $data -> type                    = $request -> type;
            $data -> method                  = $request -> method;
            $data -> updated_by              = Auth::User()->id;
            $data -> save();
            return back()
                ->with('success','connection Updated successfully.');
        }
    }

    /*
    *   Delete record
    */
    public function delete(Request $request)
    {
        $id = $request -> id;
        $data = ConnectionType::find($id);
        $response = $data -> delete();
        if($response)
            echo "Record Deleted successfully.";
        else
            echo "There was a problem. Please try again later.";
    }
}

