<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\CustomerTicket;

class TicketsDashboardController extends Controller
{
    public function tickets_dashboard()
    {
        return view('vendor.adminlte.pages.one-page.tickets_dashboard');
    }

    public function all_customers_tickets()
    {
        $tickets = CustomerTicket::with('customer','user')->select('customer_tickets.*');
        return Datatables::of($tickets)->take(20)
            ->orderBy('created_at', 'id $1')
            ->editColumn('created_at', function ($tickets) {
                return $tickets->created_at->diffForHumans();
            })
            ->editColumn('status', function ($tickets) {
                if ($tickets->status == 0) {
                    return '<strong class="text-green" >Closed</strong>';
                } elseif ($tickets->status == 1) {
                    return '<strong class="text-red" >open</strong>';
                } elseif ($tickets->status == 2) {
                    return '<strong class="text-blue" >Hint</strong>';
                }
            })
            ->editColumn('message', function ($tickets) {
                if ($tickets->status == 1) {
                    return '<div class="text-red" >' . $tickets->message . '</div>';
                } elseif ($tickets->status == 0) {
                    return '<div class="text-red" >' . $tickets->message . '</div>' . '' . '<div class="text-green" >' . $tickets->close_message . '</div>';
                } elseif ($tickets->status == 2) {
                    return '<div class="text-blue" >' . $tickets->message . '</div>';                }
            })
            ->rawColumns(['action','status','message'])
            ->addColumn('action', function ($tickets) {
                if ($tickets->status == 1){
                    return '
                <td class="text-center">
                    <!-- Single button -->
                    <div class="btn-group" >
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                        <li><a href="" data-toggle="modal" data-target="#viewModal_ticket" onclick="fun_view_ticket('.$tickets->id.')">Peek Ticket</a></li>
                        <li><a href="" data-toggle="modal" data-target="#viewModal_customer_peek" onclick="fun_peek_customer('.$tickets->customer->id.')" >Peek Customer</a></li>
                        <li><a href="'.$tickets->customer->id.'">View Customer</a></li>
                        <li><a href="" data-toggle="modal" data-target="#close_message" onclick="fun_close_ticket('.$tickets->id.')">Close Ticket</a></li>
                        </ul>
                    </div>
                </td>       
                             ';
                }elseif ($tickets->status == 0){
                    return '
                <td class="text-center">
                    <!-- Single button -->
                    <div class="btn-group" >
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                        <li><a href="" data-toggle="modal" data-target="#viewModal_ticket" onclick="fun_view_ticket('.$tickets->id.')">Peek Ticket</a></li>
                        <li><a href="" data-toggle="modal" data-target="#viewModal_customer_peek" onclick="fun_peek_customer('.$tickets->customer->id.')" >Peek Customer</a></li>
                        <li><a href="'.$tickets->customer->id.'">View Customer</a></li>
                        </ul>
                    </div>
                </td>       
                             ';
                }elseif ($tickets->status == 2){
                    return '
                <td class="text-center">
                    <!-- Single button -->
                    <div class="btn-group" >
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                        <li><a href="" data-toggle="modal" data-target="#viewModal_ticket" onclick="fun_view_ticket('.$tickets->id.')">Peek Ticket</a></li>
                        <li><a href="" data-toggle="modal" data-target="#viewModal_customer_peek" onclick="fun_peek_customer('.$tickets->customer->id.')" >Peek Customer</a></li>
                        <li><a href="'.$tickets->customer->id.'">View Customer</a></li>
                        </ul>
                    </div>
                </td>       
                             ';
                }
            })
            ->make(true);
    }
}
