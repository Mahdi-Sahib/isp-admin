<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Facades\Datatables;
use App\Tower;
use App\Broadcast;
use App\TowerLink;

use App\Device;
use App\TowerIp;
use App\ConnectionType;
use App\AddressHelper;
use Validator, Input, Redirect, Session;

class TowerController extends Controller
{
    public function index()
    {
        return view('vendor.adminlte.pages.tower.towers-table-one') ;
    }

    public function TowersTableOneView()
    {
        return view('vendor.adminlte.pages.tower.towers-table-one');
    }

    public function TowerTableOneAjax()
    {
        $towers = Tower::select('towers.*');
        return Datatables::of($towers)
            ->orderBy('created_at', 'id $1')
            ->addColumn('action', function ($towers) {
                return '
                
                <a href="'.$towers->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> View</a>
                <a href="towers/'.$towers->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a href="towers/'.$towers->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Delete</a>
                
                ';
            })
            ->make(true);
    }


    public function create()
    {
        $tower       = Tower::all();
        $address     = AddressHelper::all();
        return view('vendor.adminlte.pages.tower.new-tower' , compact('tower','address'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:towers',
        ]);
        if ($validator->fails()) {
            return redirect('isp-cpanel/towers/create')
                ->withErrors($validator)
                ->withInput();
        }else {
            $tower = new Tower();
            $tower->name               = $request->name;
            $tower->agent              = $request->agent;
            $tower->location           = $request->location;
            $tower->google_location    = $request->google_location;
            $tower->created_by         = Auth::User()->id;
            $tower->updated_by         = Auth::User()->id;
            $tower->save();
            Session::flash('message','Successfuly Add ' . $tower->name . ' !' ) ;
            return redirect('isp-cpanel/towers/towers-table-one-view');
        }
    }


    public function show($id)
    {
        $cw                  = array(5,10,20,30,40,80);
        $tower               = Tower::find($id);
        $connection          = ConnectionType::all();
        $connectionx         = ConnectionType::all();
        $broadcast           = Broadcast::all();
        $link                = TowerLink::all();
        $device              = Device::all();
        $devicex             = Device::all();
        $devicev             = Device::all();
        $address             = AddressHelper::all();
        return view('vendor.adminlte.pages.tower.view-tower' , compact('tower','address','connection','connectionx','device','devicex','cw','devicev','broadcast','link'));
    }


    public function edit($id)
    {
        $tower = Tower::find($id);
        return view('vendor.adminlte.pages.tower.edit-tower' , compact('tower')) ;
    }


    public function update(Request $request, $id)
    {
        $tower = Tower::find($id);
        $tower->name               = $request->name;
        $tower->location           = $request->location;
        $tower->ip                 = $request->ip;
        $tower->google_location    = $request->google_location;
        $tower->towerinfo          = $request->towerinfo;
        $tower->updated_by         = Auth::User()->id;
        $tower->save();
        Session::flash('message','Successfuly updated ' . '( ' . $tower->name . ' )' . ' ! ' );
        return Redirect::to('isp-cpanel/towers/towers-table-one-view');
    }

    public function destroy($id)
    {
        $customer = Tower::find($id);
        $customer->destroy($id);
        Session::flash('message','Successfuly deleted ' . $tower->name.' !');
        return Redirect::to('admin/tower');
    }
}
