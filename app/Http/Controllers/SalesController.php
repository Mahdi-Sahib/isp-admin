<?php

namespace App\Http\Controllers;


use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
                return number_format(RefillCustomer::where('created_by', $query->id)->whereColumn('created_at','=','updated_at')->where('created_at', '>=', Carbon::today())->pluck('amount_paid')->sum() + RefillCustomer::where('created_by', $query->id)->where('created_at', '>=', Carbon::today())->pluck('first_piad')->sum());
            })
            ->addColumn('total_repayment', function ($query) {
                return number_format(RefillCustomer::where('created_by', $query->id)->where('created_at', '>=', Carbon::today())->pluck('second_paid')->sum());
            })
            ->addColumn('total_unpaid_refill', function ($query) {
                return number_format(RefillCustomer::where('created_by', $query->id)->where('payment_status','=', 1)->where('created_at', '>=', Carbon::today())->pluck('card_price')->sum() - RefillCustomer::where('created_by', $query->id)->where('payment_status','=', 1)->where('created_at', '>=', Carbon::today())->pluck('amount_paid')->sum());
            })
            ->addColumn('total_income', function ($query) {
                return number_format(RefillCustomer::where('created_by', $query->id)->where('created_at', '>=', Carbon::today())->pluck('amount_paid')->sum());
            })

            ->make(true);
    }
}
