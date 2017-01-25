<?php

namespace App\Http\Controllers;
use App\Broadcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator, Input, Redirect ,Session ;

class BroadcastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


/*
* Display all data
*/
    public function tableAjax()
    {
        return view('vendor.adminlte.pages.tower.partials.broadcast_view_crud');
    }

    /*
     * Add student data
     */
    public function addAjax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'number_Sign'       => 'numeric | unique:broadcasts',
            'device_id'         => 'required',
            'ssid'              => 'required',
            'ip'                => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
            $data = new Broadcast;
            $data->device_id             = $request->device_id;
            $data->number_sign           = $request->number_sign;
            $data->name                  = $request->name;
            $data->ssid                  = $request->ssid;
            $data->ip                    = $request->ip;
            $data->mac                   = $request->mac;
            $data->channal_width         = $request->channal_width;
            $data->direction             = $request->direction;
            $data->broadcasts_info       = $request->broadcasts_info;
            $data->tower_id              = $request->tower_id;
            $data->created_by            = Auth::User()->id;
            $data->save();
            return back()
                ->with('message_broadcast', 'this Broadcast added successfully.');
        }
    }

    /*
     * View data
     */
    public function viewAjax(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = Broadcast::find($id);
            //echo json_decode($info);
            return response()->json($info);
        }
    }

    /*
    *   Update data
    */
    public function updateAjax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'number_Sign'       => 'numeric | unique:broadcasts',
            'device_id'         => 'required',
            'ssid'              => 'required',
            'ip'                => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
        $id = $request -> edit_id;
        $data = Broadcast::find($id);
        $data->device_id             = $request->device_id;
        $data->number_sign           = $request->number_sign;
        $data->name                  = $request->name;
        $data->ssid                  = $request->ssid;
        $data->ip                    = $request->ip;
        $data->mac                   = $request->mac;
        $data->channal_width         = $request->channal_width;
        $data->direction             = $request->direction;
        $data->broadcasts_info       = $request->broadcasts_info;
        $data->updated_by            = Auth::User()->id;
        $data -> save();
        return back()
            ->with('message_broadcast','Broadcast Updated successfully.');
         }
    }

    /*
    *   Delete record
    */
    public function deleteAjax(Request $request)
    {
        $id = $request -> id;
        $data = Broadcast::find($id);
        $response = $data -> delete();
        if($response)
            echo "Record Deleted successfully.";
        else
            echo "There was a problem. Please try again later.";
    }

}
