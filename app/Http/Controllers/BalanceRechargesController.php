<?php

namespace App\Http\Controllers;

use App\BalanceRecharge;
use App\Supplier;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Auth;
use Validator, Input, Redirect ,Session ;

class BalanceRechargesController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('vendor.adminlte.pages.sales.balance_recharges.balance_recharges_crud',compact('suppliers'));
    }

    public function BalanceRechargeTable()
    {
        $balance_recharges = BalanceRecharge::with('user','supplier')->select('balance_recharges.*');
        return Datatables::of($balance_recharges)
            ->orderBy('created_at', 'id $1')
            ->editColumn('created_at', function ($supplier) {
                return $supplier->created_at->format('(D g:i A) d-n-Y');
            })
            ->addColumn('action', function ($balance_recharges) {
                return '
                <td class="text-center">
                    <!-- Single button -->
                    <div class="btn-group" >
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="" data-toggle="modal" data-target="#viewModal_ticket" onclick="fun_fullview_customer('.$balance_recharges->supplier->id.')">Peek</a></li>
                            <li><a href="supplier/'.$balance_recharges->supplier->id.'">View Supplier</a></li>
                            <li><a href="financial/'.$balance_recharges->id.'/edit">Edit</a></li>
                        </ul>
                    </div>
                </td>
                ';
            })
            ->make(true);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
            $data = new BalanceRecharge;
            $data->supplier_id               = $request->supplier_id;
            $data->amount                    = $request->amount;
            $data->description               = $request->description;
            $data->created_by                = Auth::User()->id;
            $data->save();
            return back()
                ->with('success', 'This Supplier  added successfully.');
        }
    }

    public function show(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = BalanceRecharge::find($id);
            //echo json_decode($info);
            return response()->json($info);
        }
    }

}
