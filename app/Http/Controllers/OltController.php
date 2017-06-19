<?php

namespace App\Http\Controllers;

use App\Olt;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Auth;
use Validator, Input, Redirect ,Session ;
use Illuminate\Http\Request;

class OltController extends Controller
{

    public function index(){
        return view('vendor.adminlte.pages.fttx.dashboard');
    }

    public function table(){
        $olt = Olt::select('olts.*');
        return Datatables::of($olt)
            ->editColumn('type', function ($olt) {
                $key = olt_type();
                return $olt->type = $key[$olt->type];
            })
            ->editColumn('splitting_level', function ($olt) {
                $key = splitting_level();
                return $olt->splitting_level = $key[$olt->splitting_level];
            })
            ->addColumn('navigation', function ($olt) {

            })
            ->rawColumns(['action','navigation'])
            ->addColumn('action', function ($olt) {
                return '
                <td class="text-center">
                    <!-- Single button -->
                    <div class="btn-group" >
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="" data-toggle="modal" data-target="#viewModal" onclick="fun_olt_show('.$olt->id.')" >Peek</a></li>
                            <li><a href="" data-toggle="modal" data-target="#editModal" onclick="fun_olt_edit('.$olt->id.')" >Edit</a></li>
                            <li><a href="olt/'.$olt->id.'">View</a></li>
                        </ul>
                    </div>
                </td>
                ';
            })
            ->make(true);
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'                => 'required|unique:olts',
            'pon_count'            => 'numeric',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
            $data = new Olt;
            $data->title                           = $request->title;
            $data->type                            = $request->type;
            $data->number_sign                     = $request->number_sign;
            $data->adaptor_type                    = $request->adaptor_type;
            $data->accommodate                     = $request->accommodate;
            $data->brand                           = $request->brand;
            $data->model                           = $request->model;
            $data->splitting_level                 = $request->splitting_level;
            $data->splitting_ratio                 = $request->splitting_ratio;
            $data->max_splitting_ratio             = $request->max_splitting_ratio;
            $data->pon_count                       = $request->pon_count;
            $data->location                        = $request->location;
            $data->created_by                      = Auth::User()->id;
            $data->save();
            return back()
                ->with('message_ip', 'this OLT added successfully.');
        }
    }

    public function show(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = Olt::find($id);
            //echo json_decode($info);
            return response()->json($info);
        }
    }


    public function edit(Olt $olt)
    {
        //
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:olts'
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
            $id = $request -> edit_id;
            $data = Olt::find($id);
            $data->title                           = $request->title;
            $data->type                            = $request->type;
            $data->number_sign                     = $request->number_sign;
            $data->adaptor_type                    = $request->adaptor_type;
            $data->accommodate                     = $request->accommodate;
            $data->brand                           = $request->brand;
            $data->model                           = $request->model;
            $data->splitting_level                 = $request->splitting_level;
            $data->splitting_ratio                 = $request->splitting_ratio;
            $data->max_splitting_ratio             = $request->max_splitting_ratio;
            $data->pon_count                       = $request->pon_count;
            $data->location                        = $request->location;
            $data->updated_by                      = Auth::User()->id;
            $data -> save();
            return back()
                ->with('success','Olt Updated successfully.');
        }
    }

    public function destroy(Olt $olt)
    {
        //
    }
}
