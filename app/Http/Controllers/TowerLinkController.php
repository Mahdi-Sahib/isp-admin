<?php

namespace App\Http\Controllers;

use App\TowerLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator, Input, Redirect ,Session ;



class TowerLinkController extends Controller
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
    public function indexAjax()
    {
        return view('vendor.adminlte.pages.tower.partials.link_view_crud');
    }

    /*
     * Add student data
     */
    public function addAjaxNew(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'source_name'               => 'required | max:50',
            'connection_method'        => 'required',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
            $data = new TowerLink;
            $data -> tower_id                   = $request -> tower_id;
            $data -> source_name                = $request -> source_name;
            $data -> connection_method          = $request -> connection_method;
            $data -> created_by                 = Auth::User()->id;
            $data -> updated_by                 = Auth::User()->id;
            $data->save();
            return back()
                ->with('success_link', 'Link Added successfully.');
        }
    }

    /*
     * View data
     */
    public function viewAjax(Request $request)
    {
        // make array in helper as variable
        $cw = channel_width();
        $wt = wireless_type();
        $fc = fiber_core_count();
        $fd = fiber_type();
        $fst = adaptor_type();

        if($request->ajax()){
            $id = $request->id;
            $info = TowerLink::find($id);
            if ($info->fiber_core){
                $info->link_fiber_core = $fc[$info->fiber_core];
            }
            if ($info->channel_width){
                $info->link_channel_width = $cw[$info->channel_width];
            }
            if ($info->wireless_type){
                $info->link_wireless_type = $wt[$info->wireless_type];
            }
            if ($info->fiber_type){
                $info->link_fiber_type = $fd[$info->fiber_type];
            }
            if ($info->fiber_sfp_type){
                    $info->link_fiber_sfp_type = $fst[$info->fiber_sfp_type];
            }
            // echo json_decode($info);
            return response()->json($info);
        }
    }

    /*
    *   Update data
    */
    public function updateAjax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'repeater_name'               => 'nullable | max:20',
            'ssid'                        => 'max:30',
            'master_ip'                   => 'nullable | ip',
            'slave_ip'                    => 'nullable | ip',
            'master_mac'                  => 'max:17',
            'slave_mac'                   => 'max:17',
            'slave_antenna'               => 'max:20',
            'slave_brand'                 => 'max:20',
            'slave_username'              => 'max:20',
            'slave_password'              => 'max:20',
            'master_antenna'              => 'max:20',
            'master_brand'                => 'max:20',
            'master_username'             => 'max:20',
            'master_password'             => 'max:20',

            'fiber_type'                  => 'max:5 | numeric',
            'fiber_core'                  => 'max:5 | numeric',
            'fiber_sfp_type'              => 'max:5 | numeric',
            'fiber_distance'              => 'nullable | max:2000 | numeric',
            'fiber_master_port_number'    => 'nullable | max:48 | numeric',
            'fiber_clint_port_number'     => 'nullable | max:48 | numeric',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {

            $id = $request -> edit_id;
            $data = TowerLink::find($id);
            $data -> repeater_name              = $request -> repeater_name;
            // wireless
            $data -> wireless_type              = $request -> wireless_type;
            $data -> channel_width              = $request -> channel_width;
            $data -> ssid                       = $request -> ssid;
            $data -> authentication_method      = $request -> authentication_method;
            $data -> authentication             = $request -> authentication;
            $data -> slave_ip                   = $request -> slave_ip;
            $data -> slave_mac                  = $request -> slave_mac;
            $data -> slave_antenna              = $request -> slave_antenna;
            $data -> slave_brand                = $request -> slave_brand;
            $data -> slave_username             = $request -> slave_username;
            $data -> slave_password             = $request -> slave_password;
            $data -> master_ip                  = $request -> master_ip;
            $data -> master_mac                 = $request -> master_mac;
            $data -> master_antenna             = $request -> master_antenna;
            $data -> master_brand               = $request -> master_brand;
            $data -> master_username            = $request -> master_username;
            $data -> master_password            = $request -> master_password;
            // fiber
            $data -> fiber_type                 = $request -> fiber_type;
            $data -> fiber_core                 = $request -> fiber_core;
            $data -> fiber_sfp_type             = $request -> fiber_sfp_type;
            $data -> fiber_distance             = $request -> fiber_distance;
            $data -> fiber_master_port_number   = $request -> fiber_master_port_number;
            $data -> fiber_clint_port_number    = $request -> fiber_clint_port_number;
            $data -> updated_by                 = Auth::User()->id;
            $data -> save();
            return back()
                ->with('success_link','Link Updated successfully.');
        }
    }



    /*
    *   Delete record
    */
    public function deleteAjax(Request $request)
    {

        if(Auth::user()->status == 10) {
            $id = $request -> id;
            $data = TowerLink::find($id);
            $response = $data -> delete();
            if($response)
                echo "Link Deleted successfully.";
            else
                echo "There was a problem. Please try again later.";

        }else{
            echo "you didn't have this permissions.";
        }


    }




}
