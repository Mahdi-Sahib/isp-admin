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

            ->addColumn('total_refill_income', function () {
                return number_format(RefillCustomer::with('user')->whereColumn('created_at','=','updated_at')->where('created_at', '>=', Carbon::today())->pluck('amount_paid')->sum() + RefillCustomer::with('user')->where('created_at', '>=', Carbon::today())->pluck('first_piad')->sum());
            })
            ->addColumn('total_repayment', function () {
                return number_format(RefillCustomer::with('user')->where('created_at', '>=', Carbon::today())->pluck('second_paid')->sum());
            })
            ->addColumn('total_unpaid_refill', function () {
                return number_format(RefillCustomer::with('user')->where('payment_status','=', 1)->where('created_at', '>=', Carbon::today())->pluck('card_price')->sum() - RefillCustomer::with('user')->where('payment_status','=', 1)->where('created_at', '>=', Carbon::today())->pluck('amount_paid')->sum());
            })
            ->addColumn('total_income', function () {
                return number_format(RefillCustomer::with('user')->where('created_at', '>=', Carbon::today())->pluck('amount_paid')->sum());
            })

            ->make(true);
    }
}
