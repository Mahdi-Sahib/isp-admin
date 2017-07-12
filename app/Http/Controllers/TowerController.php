<?php

namespace App\Http\Controllers;

use App\AddressHelper;
use App\Broadcast;
use App\Device;
use App\Tower;
use App\TowerLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator, Redirect ,Session ;
use Yajra\Datatables\Facades\Datatables;

class TowerController extends Controller
{

    public function __construct()
    {
        $this->middleware('superAdmin', ['only' => ['edit', 'destroy']]);
    }

    public function index()
    {
        return view('vendor.adminlte.pages.tower.towers_index');
    }


    public function TowerTableOneAjax()
    {
        $towers = Tower::select('towers.*');
        return Datatables::of($towers)
            ->addColumn('alert', function ($towers) {
                if ($towers->TowerTicketCount()) {
                    return '<small class="label bg-yellow-active"> ' . $towers->TowerTicketCount() . ' Open Ticket  </small>';
                }
            })
            ->addColumn('statistics', function ($towers) {
                if ($towers->BroadcastCount() and $towers->TowerIpCount() and $towers->TowerLinkCount()) {
                    return '<small class="label bg-blue"> ' . $towers->BroadcastCount() . ' ABs Count </small>' . '<br><br>' .
                           '<small class="label bg-blue"> ' . $towers->TowerIpCount() . ' IPs Count </small>' . '<br><br>' .
                           '<small class="label bg-blue"> ' . $towers->TowerLinkCount() . ' Links Count </small>';
                }
            })
            ->rawColumns(['action', 'alert','statistics'])
            ->addColumn('action', function ($towers) {
                return '
                <td class="text-center">
                    <!-- Single button -->
                    <div class="btn-group" >
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="towers/'.$towers->id.'">View</a></li>
                            <li><a href="towers/'.$towers->id.'/edit">Edit</a></li>
                            <li><a href="towers/delete/'.$towers->id.'">Delete</a></li>
                            <li><a href="" data-toggle="modal" data-target="#addModal_tower_ticket" onclick="fun_get_Ticket_id('.$towers->id.')">Ticket</a></li>
                        </ul>
                    </div>
                </td>
                ';
            })
            ->make(true);
    }


    public function create()
    {
        $tower = Tower::all();
        $address = AddressHelper::all();
        return view('vendor.adminlte.pages.tower.new-tower', compact('tower', 'address'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'                 => 'required|max:25|unique:towers',
            'agent'                 => 'max:25',
            'location'              => 'max:50',
            'google_location'       => 'max:50',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $tower = new Tower();
            $tower->title             = $request->title;
            $tower->agent             = $request->agent;
            $tower->location          = $request->location;
            $tower->google_location   = $request->google_location;
            $tower->created_by        = Auth::User()->id;
            $tower->updated_by        = Auth::User()->id;
            $tower->save();
            Session::flash('message', 'Successfuly Add ' . $tower->name . ' !');
            return redirect('isp-cpanel/towers');
        }
    }


    public function show($id)
    {
        $cw = array(5, 10, 20, 30, 40, 80);
        $tower = Tower::find($id);
        $broadcast = Broadcast::all();
        $link = TowerLink::all();
        $device = Device::all();
        $devicex = Device::all();
        $devicev = Device::all();
        $address = AddressHelper::all();
        return view('vendor.adminlte.pages.tower.view-tower', compact('tower', 'address', 'device', 'devicex', 'cw', 'devicev', 'broadcast', 'link'));
    }


    public function edit($id)
    {
        $tower = Tower::find($id);
        return view('vendor.adminlte.pages.tower.edit-tower', compact('tower'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'              => 'required|max:25|unique:towers,title,'. $id,
            'agent'              => 'max:25',
            'location'           => 'max:50',
            'google_location'    => 'max:50',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $tower = Tower::find($id);
            $tower->title             = $request->title;
            $tower->agent             = $request->agent;
            $tower->location          = $request->location;
            $tower->google_location   = $request->google_location;
            $tower->created_by        = Auth::User()->id;
            $tower->updated_by        = Auth::User()->id;
            $tower->updated_by = Auth::User()->id;
            $tower->save();
            Session::flash('message', 'Successfuly updated ' . '( ' . $tower->name . ' )' . ' ! ');
            return redirect('isp-cpanel/towers');
        }
    }

    public function destroy($id)
    {
        $tower = Tower::find($id);
        $tower->destroy($id);
        Session::flash('message', 'Successfuly deleted ' . $tower->name . ' !');
        return back();
    }
}
