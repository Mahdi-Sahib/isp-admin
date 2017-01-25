<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\TowerIp;
use Illuminate\Support\Facades\Auth;
use Validator, Input, Redirect ,Session ;

class TowerIpController extends Controller
{

    /*
    * Display all data
    */
    public function tableAjax()
    {
        $tower_ip = TowerIp::all();
        return view('vendor.adminlte.pages.tower.partials.ip_view_crud' , compact('tower_ip'));

    }

    /*
     * Add student data
     */
    public function addAjax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ip'                => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
            $data = new TowerIp;
            $data->ip                    = $request->ip;
            $data->tower_id              = $request->tower_id;
            $data->created_by            = Auth::User()->id;
            $data->save();
            return back()
                ->with('message_ip', 'this IP added successfully.');
        }
    }

    /*
     * View data
     */
    public function viewAjax(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = TowerIp::find($id);
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
            'ip'                => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
        $id = $request -> edit_id;
        $data = TowerIp::find($id);
        $data->ip                    = $request->ip;
        $data->updated_by            = Auth::User()->id;
        $data -> save();
        return back()
            ->with('message_ip','IP Updated successfully.');
    }
    }

    /*
    *   Delete record
    */
    public function deleteAjax(Request $request)
    {
        $id = $request -> id;
        $data = TowerIp::find($id);
        $response = $data -> delete();
        if($response)
            echo "IP Deleted successfully.";
        else
            echo "There was a problem. Please try again later.";
    }

}
