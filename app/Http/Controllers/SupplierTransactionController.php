<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierTransactionController extends Controller
{
    public function index()
    {
        return view('vendor.adminlte.pages.supplier.supplier_transaction');
    }

    public function BalanceRechargeTableAjax()
    {
        $balance_recharges = BalanceRecharge::with('user','supplier')->select('balance_recharges.*');
        return Datatables::of($balance_recharges)
            ->orderBy('created_at', 'id $1')

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
                            <li><a href="isp-cpanel/financial/supplier/'.$balance_recharges->id.'">View Invoices</a></li>
                            <li><a href="financial/'.$balance_recharges->id.'/edit">Edit</a></li>
                        </ul>
                    </div>
                </td>
                ';
            })
            ->make(true);
    }
}
