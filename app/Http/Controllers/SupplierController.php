<?php

namespace App\Http\Controllers;
use App\Supplier;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Http\Request;
use App\BalanceRecharge;
use Validator, Input, Redirect ,Session ;

class SupplierController extends Controller
{

    public function index()
    {
        return view('vendor.adminlte.pages.sales.supplier.suppliers');
    }

    public function SupplierTableAjax()
    {
        $supplier = Supplier::select('suppliers.*');
        return Datatables::of($supplier)
            ->orderBy('created_at', 'id $1')

            ->addColumn('action', function ($supplier) {
                return '
                <td class="text-center">
                    <!-- Single button -->
                    <div class="btn-group" >
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="" data-toggle="modal" data-target="#viewModal" onclick="fun_view('.$supplier->id.')">Peek</a></li>
                            <li><a href="" data-toggle="modal" data-target="#editModal" onclick="fun_edit('.$supplier->id.')">Edit</a></li>
                            <li><a href="supplier/'.$supplier->id.'">View</a></li>
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
            'name' => 'required|unique:suppliers'
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
            $data = new Supplier;
            $data->name                      = $request->name;
            $data->phone                     = $request->phone;
            $data->email                     = $request->email;
            $data->address                   = $request->address;
            $data->contact                   = $request->contact;
            $data->website                   = $request->website;
            $data->bank_account              = $request->bank_account;
            $data->currency                  = $request->currency;
            $data->payment_terms             = $request->payment_terms;
            $data->tax_included              = $request->tax_included;
            $data->created_by                = Auth::User()->id;
            $data->save();
            return back()
                ->with('success', 'This Supplier  added successfully.');
        }
    }

    public function view(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = Supplier::find($id);
            //echo json_decode($info);
            return response()->json($info);
        }
    }

    public function show($id)
    {
        $supplier           = Supplier::find($id);
        return view('vendor.adminlte.pages.sales.supplier.supplier_dashboard' , compact('supplier'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:suppliers'
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
            $id = $request -> edit_id;
            $data = Supplier::find($id);
            $data->name                      = $request->name;
            $data->phone                     = $request->phone;
            $data->email                     = $request->email;
            $data->address                   = $request->address;
            $data->contact                   = $request->contact;
            $data->website                   = $request->website;
            $data->bank_account              = $request->bank_account;
            $data->currency                  = $request->currency;
            $data->payment_terms             = $request->payment_terms;
            $data->tax_included              = $request->tax_included;
            $data->updated_by                = Auth::User()->id;
            $data -> save();
            return back()
                ->with('success','Supplier Updated successfully.');
        }
    }

    public function delete(Request $request)
    {
        $id = $request -> id;
        $data = Supplier::find($id);
        $response = $data -> delete();
        if($response)
            echo "Supplier Deleted successfully.";
        else
            echo "There was a problem. Please try again later.";
    }

    public function SupplierBalanceRechargeTableView()
    {
        return view('vendor.adminlte.pages.sales.balance_recharges.supplier_dashboard');
    }

    public function SupplierBalanceRechargeTableAjax(Request $request , $id){
        if ($request->ajax()) {
            $supplier = Supplier::find($id);
            return Datatables::of(BalanceRecharge::with('user')->where('supplier_id', $supplier->id))
                ->orderBy('created_at', 'id $1')
                ->editColumn('created_at', function ($supplier) {
                    return $supplier->created_at->format('(D g:i A) d-n-y');
                })
                ->addColumn('action', function ($supplier) {
                    return '
                <td class="text-center">
                    <!-- Single button -->
                    <div class="btn-group" >
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="" data-toggle="modal" data-target="#viewModal" onclick="fun_view('.$supplier->id.')">Peek</a></li>
                            <li><a href="" data-toggle="modal" data-target="#editModal" onclick="fun_edit('.$supplier->id.')">Edit</a></li>
                        </ul>
                    </div>
                </td>
                ';
                })
                ->make(true);
        }
    }

}
