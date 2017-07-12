<?php

namespace App\Http\Controllers;
use App\Broadcast;
use App\Tower;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Validator, Input, Redirect ,Session ;

class BroadcastController extends Controller
{

    public function BroadcastTable(Request $request , $id){
        if ($request->ajax()) {
            $broadcast = Tower::find($id);
            return Datatables::of(Broadcast::with('user','device')->where('tower_id', $broadcast->id))
                ->editColumn('channal_width', function ($tickets) {
                    $cw = channel_width();
                    return $tickets->channel_width = $cw[$tickets->channal_width];
                })
                ->rawColumns(['action'])
                ->addColumn('action', function ($broadcast) {
                        return '
                <td class="text-center">
                    <!-- Single button -->
                    <div class="btn-group" >
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="" data-toggle="modal" data-target="#viewModal_broadcast" onclick="fun_view_broadcast(' . $broadcast->id . ')">View</a></li>
                            <li><a href="" data-toggle="modal" data-target="#editModal_broadcast" onclick="fun_edit_broadcast(' .  $broadcast->id  . ')">Edit</a></li>
                            <li><a href="" onclick="fun_delete_broadcast( ' . $broadcast -> id .')">Delete</a></li>                            <li><a href="" data-toggle="modal" data-target="#addModal_broadcast_ticket">Ticket</a></li>
                        </ul>
                    </div>
                </td>       
                             ';
                })
                ->make(true);
        }
    }

    public function broadcast_view_crud()
    {
        return view('vendor.adminlte.pages.tower.partials.broadcast_view_crud');
    }

    /*
     * Add student data
     */
    public function addAjax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'label'             => 'max:10|unique:broadcasts',
            'name'              => 'max:20',
            'ssid'              => 'max:30 | required',
            'antenna'           => 'max:20',
            'direction'         => 'max:100',
            'device_id'         => 'required',
            'ip'                => 'ip | required | unique:broadcasts',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
            $data = new Broadcast;
            $data->device_id             = $request->device_id;
            $data->label           = $request->label;
            $data->name                  = $request->name;
            $data->ssid                  = $request->ssid;
            $data->ip                    = $request->ip;
            $data->mac                   = $request->mac;
            $data->antenna               = $request->antenna;
            $data->degree                = $request->degree;
            $data->gin                   = $request->gin;
            $data->channal               = $request->channal;
            $data->channal_width         = $request->channal_width;
            $data->direction             = $request->direction;
            $data->broadcasts_info       = $request->broadcasts_info;
            $data->tower_id              = $request->tower_id;
            $data->created_by            = Auth::User()->id;
            $data->updated_by            = Auth::User()->id;
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
        $cw = channel_width();
        if($request->ajax()){
            $id = $request->id;
            $info = Broadcast::find($id);
            //echo json_decode($info);
            $info->channel_width = $cw[$info->channal_width];
            return response()->json($info);
        }
    }

    /*
    *   Update data
    */
    public function updateAjax(Request $request)
    {
        $id = $request -> edit_id;
        $validator = Validator::make($request->all(), [
            'label'             => 'max:5 | unique:broadcasts,label,'. $id,
            'name'              => 'max:20',
            'ssid'              => 'max:30 | required',
            'antenna'           => 'max:20',
            'direction'         => 'max:100',
            'device_id'         => 'max:5 | required',
            'ip'                => 'ip | required | unique:broadcasts,ip,'. $id,
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
        $id = $request -> edit_id;
        $data = Broadcast::find($id);
            $data->device_id             = $request->device_id;
            $data->label                 = $request->label;
            $data->name                  = $request->name;
            $data->ssid                  = $request->ssid;
            $data->ip                    = $request->ip;
            $data->mac                   = $request->mac;
            $data->antenna               = $request->antenna;
            $data->degree                = $request->degree;
            $data->gin                   = $request->gin;
            $data->channal               = $request->channal;
            $data->channal_width         = $request->channal_width;
            $data->direction             = $request->direction;
            $data->broadcasts_info       = $request->broadcasts_info;
            $data->updated_by            = Auth::User()->id;
        $data -> save();
        return back()
            ->with('message_broadcast','Access Point Updated successfully.');
         }
    }

    /*
    *   Delete record
    */
    public function deleteAjax(Request $request)
    {
        if(Auth::user()->status == 10) {
            $id = $request -> id;
            $data = Broadcast::find($id);
            $response = $data -> delete();
            if($response)
                echo "Record Deleted successfully. and all tickets about this AP also deleted";
            else
                echo "There was a problem. Please try again later.";
        }else{
                echo "you didn't have this permissions.";
        }

    }

}