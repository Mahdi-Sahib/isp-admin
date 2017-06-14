<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Validator, Input, Redirect ,Session;
use App\User;
use App\Customer;
use App\CustomerTicket;


class CustomerTicketController extends Controller
{


    public function home()
    {
        return view('vendor.adminlte.pages.customer.open_ticket_home');
    }

    public function OpenTickets()
    {
        $tickets = CustomerTicket::with('customer','user')->where('status','1')->select('customer_tickets.*');
        return Datatables::of($tickets)->take(20)
            ->editColumn('created_at', function ($tickets) {
                return $tickets->created_at->format('(D g:i A) d-n-Y');
            })
            ->rawColumns(['action'])
            ->addColumn('action', function ($tickets) {
                return '
                <td class="text-center">
                    <!-- Single button -->
                    <div class="btn-group" >
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            })
            ->make(true);
    }

    public function CustomerTicketView()
    {
        return view('vendor.adminlte.pages.customer.partials.customer_view_table_ticket');
    }

    public function CustomerTicketAjax(Request $request, $id)
    {
        if ($request->ajax()) {
            $tickets = Customer::find($id);
            return Datatables::of(CustomerTicket::with('user')->where('customer_id', $tickets->id))
                ->orderBy('created_at', 'id $1')
                ->editColumn('status', function ($tickets) {
                    if ($tickets->status == 0) {
                        return '<div class="text-green" >Closed</div>';
                    } elseif ($tickets->status == 1) {
                        return '<div class="text-red" >open</div>';
                    } elseif ($tickets->status == 2) {
                        return '<div class="text-blue" >Hint</div>';
                    };
                })
                ->editColumn('created_at', function ($tickets) {
                    return $tickets->created_at->format('(D g:i A) d-n-Y');
                })
                ->rawColumns(['action','status'])
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
                        <li><a href="" data-toggle="modal" data-target="#viewModal_ticket" onclick="fun_view_ticket('.$tickets->id.')">View</a></li>
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
                        <li><a href="" data-toggle="modal" data-target="#viewModal_ticket" onclick="fun_view_ticket('.$tickets->id.')">View</a></li>
                        </ul>
                    </div>
                </td>       
                             ';
                    }
                })
                ->make(true);
        }
    }

    public function addAjax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id'                => 'required',
            'message'                    => 'required | max:150',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
            $data = new CustomerTicket;
            $data->customer_id           = $request->customer_id;
            $data->message               = $request->message;
            $data->created_by            = Auth::User()->id;
            $data->updated_by            = Auth::User()->id;
            $data->save();
            return back()
                ->with('message', 'Ticket Opened successfully.');
        }
    }

    public function addHint(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id'                => 'required',
            'message'                    => 'required | max:150',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
            $data = new CustomerTicket;
            $data->customer_id           = $request->customer_id;
            $data->message               = $request->message;
            $data->status                = 2 ;
            $data->created_by            = Auth::User()->id;
            $data->updated_by            = Auth::User()->id;
            $data->save();
            return back()
                ->with('message', 'Hint Add successfully.');
        }
    }

    public function viewAjax(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = CustomerTicket::with('user')->find($id);
            //echo json_decode($info);
            return response()->json($info);
        }
    }

    public function closeTicket(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'close_message'                    => 'required | max:150',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
            $id = $request->edit_id_ticket;
            $data = CustomerTicket::find($id);
            $data->status = 0;
            $data->close_message = $request->close_message;
            $data->updated_by = Auth::User()->id;
            $data->save();
            return back()
                ->with('message', 'Ticket Closed successfully.');
        }
    }

}
