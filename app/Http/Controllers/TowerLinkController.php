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
    public function addAjax(Request $request)
    {
        $data = new TowerLink;
        $data -> tower_id                   = $request -> tower_id;
        $data -> repeater_id                = $request -> repeater_id;
        $data -> connection_types_id        = $request -> connection_types_id;
        $data -> channal_width              = $request -> channal_width;
        $data -> ssid                       = $request -> ssid;
        $data -> authentication             = $request -> authentication;
        $data -> slave_ip                   = $request -> slave_ip;
        $data -> slave_antenna              = $request -> slave_antenna;
        $data -> master_ip                  = $request -> master_ip;
        $data -> master_antenna             = $request -> master_antenna;
        $data -> master_brand               = $request -> master_brand;
        $data -> created_by                 = Auth::User()->id;

        $data -> save();
        return back()
            ->with('success_link','Link Added successfully.');
    }

    /*
     * View data
     */
    public function viewAjax(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = TowerLink::find($id);
            //echo json_decode($info);
            return response()->json($info);
        }
    }

    /*
    *   Update data
    */
    public function updateAjax(Request $request)
    {
        $id = $request -> edit_id;
        $data = TowerLink::find($id);
        $data -> tower_id                   = $request -> tower_id;
        $data -> repeater_id                = $request -> repeater_id;
        $data -> connection_types_id        = $request -> connection_types_id;
        $data -> channal_width              = $request -> channal_width;
        $data -> ssid                       = $request -> ssid;
        $data -> authentication             = $request -> authentication;
        $data -> slave_ip                   = $request -> slave_ip;
        $data -> slave_antenna              = $request -> slave_antenna;
        $data -> master_ip                  = $request -> master_ip;
        $data -> master_antenna             = $request -> master_antenna;
        $data -> master_brand               = $request -> master_brand;
        $data -> updated_by                 = Auth::User()->id;
        $data -> save();
        return back()
            ->with('success_link','Link Updated successfully.');
    }

    /*
    *   Delete record
    */
    public function deleteAjax(Request $request)
    {
        $id = $request -> id;
        $data = TowerLink::find($id);
        $response = $data -> delete();
        if($response)
            echo "Link Deleted successfully.";
        else
            echo "There was a problem. Please try again later.";
    }

}
