<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Validator, Input, Redirect ,Session;
use App\User;
use App\Tower;
use App\TowerTicket;


class TowerTicketController extends Controller
{
    public function ticketTable(Request $request , $id){
        if ($request->ajax()) {
            $tickets = Tower::find($id);
            return Datatables::of(TowerTicket::with('user')->where('tower_id', $tickets->id))
                ->orderBy('created_at', 'id $1')

                ->editColumn('category', function ($tickets) {
                    if ($tickets->category == 1){
                        return "Tower";
                    }elseif ($tickets->category == 2){
                        return "Broadcast";
                    }elseif ($tickets->category == 3){
                        return "Link";
                    };
                })

                ->editColumn('status', function ($tickets) {
                    if ($tickets->status == 1){
                        return "Open";
                    }elseif ($tickets->status == 2){
                        return "Closed";
                    };
                })

                ->editColumn('created_at', function ($tickets) {
                    return $tickets->created_at->format('(D g:i A) d-n-y');
                })
                ->addColumn('action', function ($tower) {
                    return '
                    <a href="" data-toggle="modal" data-target="#viewModal_ticket" onclick="fun_view_ticket(' . $tower -> id . ')">View</a>
                    ';
                })
                ->make(true);
        }
    }

    /*
     * Add student data
     */
    public function addAjax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tower_id'                => 'required',
            'priority'                => 'required',
            'title'                   => 'required',
            'message'                 => 'required',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
            $data = new TowerTicket;
            $data->tower_id              = $request->tower_id;
            $data->priority              = $request->priority;
            $data->title                 = $request->title;
            $data->message               = $request->message;
            $data->category              = $request->category;
            $data->broadcast_id          = $request->broadcast_id;
            $data->tower_link_id         = $request->tower_link_id;
            $data->created_by            = Auth::User()->id;
            $data->updated_by            = Auth::User()->id;
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
            $info = TowerTicket::with('user')->find($id);
            //echo json_decode($info);
            return response()->json($info);
        }
    }

    public function updateAjax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tower_ip'         => 'required|unique:tower_ips'
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
            $id = $request -> edit_id_ip;
            $data = TowerTicket::find($id);
            $data->tower_ip              = $request->tower_ip;
            $data->updated_by            = Auth::User()->id;
            $data -> save();
            return back()
                ->with('message_ip','ip Updated successfully.');
        }
    }

    /*
    *   Delete record
    */
    public function deleteAjax(Request $request)
    {
        $id = $request -> id;
        $data = TowerTicket::find($id);
        $response = $data -> delete();
        if($response)
            echo "IP Deleted successfully.";
        else
            echo "There was a problem. Please try again later.";
    }

}
