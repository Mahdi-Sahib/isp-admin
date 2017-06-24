<?php

namespace App\Http\Controllers;


use App\User;
use Carbon\Carbon;
use App\RefillCustomer;
use Yajra\Datatables\Datatables;

class SalesController extends Controller
{
    public function sales_dashboard_layout()
    {
        return view('vendor.adminlte.pages.dashboards.sales_dashboard');
    }

    public function users_Income_table()
    {
        $query = User::select('users.*');
        return Datatables::of($query)->take(20)

            ->addColumn('total_refill_income', function ($query) {
                return '<strong class="text-green"> ' . number_format(RefillCustomer::where('created_by', $query->id)->whereColumn('created_at','updated_at')->where('created_at', '>=', Carbon::today())->pluck('amount_paid')->sum() + RefillCustomer::where('created_by', $query->id)->where('created_at', '>=', Carbon::today())->pluck('first_piad')->sum())  . '</strong>';
            })
            ->addColumn('total_repayment', function ($query) {
                return '<strong class="text-green"> ' . number_format(RefillCustomer::where('created_by', $query->id)->where('updated_at', '>=', Carbon::today())->pluck('second_paid')->sum())  . '</strong>';
            })
            ->addColumn('total_unpaid_refill', function ($query) {
                return '<strong class="text-red"> ' . number_format(RefillCustomer::where('created_by', $query->id)->where('payment_status','=', 1)->where('created_at', '>=', Carbon::today())->pluck('card_price')->sum() - RefillCustomer::where('created_by', $query->id)->where('payment_status','=', 1)->where('created_at', '>=', Carbon::today())->pluck('amount_paid')->sum())  . '</strong>';
            })
            ->addColumn('total_income', function ($query) {
                return '<strong class="text-blue"> ' . number_format(RefillCustomer::where('created_by', $query->id)->whereColumn('created_at', 'created_at')->where('created_at', '>=', Carbon::today())->pluck('amount_paid')->sum() + RefillCustomer::where('created_by', $query->id)->where('updated_at', '>=', Carbon::today())->pluck('second_paid')->sum())  . '</strong>';
            })
            ->rawColumns(['total_refill_income','total_repayment','total_unpaid_refill','total_income'])
            ->make(true);
    }
}
