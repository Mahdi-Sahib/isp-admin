<?php

namespace App\Http\Controllers;

use App\Customer;
use App\RefillCard;
use App\RefillCustomer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Facades\Datatables;
use Validator, Input, Redirect ,Session ;

class RefillCustomerController extends Controller
{

    public function refillCustomer(Request $request)
    {

        $refill = new RefillCustomer;
        if ($request->payment_status == 0){
            $refill->payment_status           = 0;
            $refill->customer_id              = $request->customer_id;
            $refill->refill_card_id           = $request->refill_card_id;
            $refill->amount_paid              = RefillCard::find($refill->refill_card_id)->selling_price;
            $refill->description              = $request->description;
            $refill->by_person                = $request->by_person;
            $refill->created_by               = Auth::User()->id;
            $refill->save();
        }elseif ($request->payment_status == 1) {
            $refill->amount_paid              = $request->amount_paid;
            $refill->payment_status           = 1;
            $refill->customer_id              = $request->customer_id;
            $refill->refill_card_id           = $request->refill_card_id;
            $refill->card_price              = RefillCard::find($refill->refill_card_id)->selling_price;
            $refill->by_person                = $request->by_person;
            $refill->created_by               = Auth::User()->id;
            $refill->save();
            }
        // redirect
        Session::flash('message','Successfuly Refill !' ) ;

        return redirect('isp-cpanel/customers');
    }


    public function CustomerRefillAjax(Request $request, $id)
    {
        if ($request->ajax()) {
            $refill = Customer::find($id);
            return Datatables::of(RefillCustomer::with('user','card')->where('customer_id', $refill->id))
                ->orderBy('created_at', 'id $1')
                ->editColumn('payment_status',function ($refill){
                    if ($refill->payment_status == 1){
                        return "UnPaid" ;
                    }elseif ($refill->payment_status == 0){
                        return "Paid" ;
                    }
                })
                ->editColumn('created_at', function ($refill) {
                    return $refill->created_at->format('(D g:i A) d-n-Y');
                })
                ->editColumn('amount_paid', function ($refill) {
                    return number_format( $refill->amount_paid / 1, 0);
                })
                ->addColumn('action', function ($refill) {
                    return '
                <td class="text-center">
                    <!-- Single button -->
                    <div class="btn-group" >
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                        <li><a href="" data-toggle="modal" data-target="#viewModal_ticket" onclick="fun_view_ticket('.$refill->id.')">View</a></li>
                        <li><a href="" data-toggle="modal" data-target="#close_message" onclick="fun_close_ticket('.$refill->id.')">Close Ticket</a></li>
                        </ul>
                    </div>
                </td>       
                             ';
                })
                ->make(true);
        }
    }



}
