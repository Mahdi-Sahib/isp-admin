<?php

namespace App\Http\Controllers;

use App\Customer;
use App\RefillCard;
use App\RefillCustomer;
use App\User;
use Response;
use UxWeb\SweetAlert\SweetAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Facades\Datatables;
use Validator, Input, Redirect ,Session ;

class RefillCustomerController extends Controller
{

    public function unpaid()
    {
        return view('vendor.adminlte.pages.customer.unpaid_customer');
    }

    public function CustomerRefillAjax(Request $request, $id)
    {
        if ($request->ajax()) {
            $refill = Customer::find($id);
            return Datatables::of(RefillCustomer::with('user','card')->where('customer_id', $refill->id))
                ->orderBy('created_at', 'id $1')
                ->editColumn('payment_status',function ($refill){
                    if ($refill->payment_status == 1){
                        return '<div class="text-red" >Unpaid</div>' ;
                    }elseif ($refill->payment_status == 0){
                        return "Paid" ;
                    }
                })
                ->editColumn('card.title', function ($refill) {
                    return $refill->card->title . ' ' . number_format($refill->card->selling_price/ 1, 0);
                })
                ->editColumn('created_at', function ($refill) {
                    return $refill->created_at->format('(D g:i A) d-n-Y');
                })
                ->editColumn('amount_paid', function ($refill) {
                    return number_format( $refill->amount_paid / 1, 0);
                })
                ->rawColumns(['payment_status','action'])
                ->addColumn('action', function ($refill) {
                    if($refill->payment_status == 1) {
                    return '
                <td class="text-center">
                    <!-- Single button -->
                    <div class="btn-group" >
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                        <li><a href="" data-toggle="modal" data-target="#viewModal_refill_view" onclick="fun_view_refill('.$refill->id.')">Refill Info</a></li>
                        
                        <li><a href="" data-toggle="modal" data-target="#addModal_repayment" onclick="fun_repayment('.$refill->id.')">Repayment</a></li>
                      
                        </ul>
                    </div>
                </td>       
                             ';
                    }elseif ($refill->payment_status == 0){
                        return '
                <td class="text-center">
                    <!-- Single button -->
                    <div class="btn-group" >
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                        <li><a href="" data-toggle="modal" data-target="#viewModal_refill_view" onclick="fun_view_refill('.$refill->id.')">Refill Info</a></li>           
                        </ul>
                    </div>
                </td>       
                             ';

                    }

                })
                ->make(true);
        }
    }

    public function unpaidTable()
    {
        $unpaid = RefillCustomer::with('customer','user','card')->where('payment_status', '1')->select('refill_customers.*');
        return Datatables::of($unpaid)
            ->editColumn('card.title', function ($refill) {
                return $refill->card->title . ' ' . number_format($refill->card->selling_price/ 1, 0);
            })
            ->editColumn('amount_paid', function ($refill) {
                return number_format( $refill->amount_paid / 1, 0);
            })
            ->editColumn('payment_status',function ($refill){
                if ($refill->payment_status == 1){
                    return '<div class="text-red" >Unpaid</div>' ;
                }elseif ($refill->payment_status == 0){
                    return "Paid" ;
                }
            })
            ->editColumn('created_at', function ($refill) {
                return $refill->created_at->format('(D g:i A) d-n-Y');
            })
            ->addColumn('navigation',function ($unpaid){
                $total_unpaid = $unpaid->where('payment_status', '=', 1)->where('customer_id', $unpaid->customer->id)->pluck('card_price')->sum() - $unpaid->where('payment_status', '=', 1)->where('customer_id', $unpaid->customer->id)->pluck('amount_paid')->sum() ;
                $card_amount_paid = $unpaid->card_price - $unpaid->amount_paid;
                if (($total_unpaid - $card_amount_paid) == 0) {
                    return '<small class="label bg-blue"> Unpaid  ' . number_format($card_amount_paid / 1, 0) . ' </small>';
                }elseif (($total_unpaid - $card_amount_paid) > 0){
                    return '<small class="label bg-blue"> Unpaid  ' . number_format($card_amount_paid / 1, 0) . ' </small>' . '<br><br>' .
                           '<small class="label bg-red-active"> Total  ' . number_format($total_unpaid / 1, 0) . ' </small>'
                        ;
                }
            })
            ->addColumn('action', function ($unpaid) {
                return '
                <td class="text-center">
                    <!-- Single button -->
                    <div class="btn-group" >
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="" data-toggle="modal" data-target="#viewModal_refill_view" onclick="fun_view_refill('.$unpaid->id.')" >Peek</a></li>
                            <li><a href="" data-toggle="modal" data-target="#addModal_repayment" onclick="fun_repayment('.$unpaid->id.')" disabled="disabled">Repayment</a></li>
                        </ul>
                    </div>
                </td>
                ';
            })
            ->rawColumns(['payment_status','action','navigation'])
            ->make(true);
    }


    public function viewAjax(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = RefillCustomer::with('user','card')->find($id);
            //echo json_decode($info);
            return response()->json($info);
        }
    }


    public function updateAjax(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tower_ip'         => 'required|unique:tower_ips'
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
            $id = $request -> edit_id_ip;
            $data = TowerIp::find($id);
            $data->tower_ip              = $request->tower_ip;
            $data->updated_by            = Auth::User()->id;
            $data -> save();
            return back()
                ->with('message_ip','ip Updated successfully.');
        }
    }


    public function refillCustomer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'by_person'                => 'max:20',
            'description'                => 'max:60',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        } else {
        $refill = new RefillCustomer;
        if ($request->payment_status == 0){
            $refill->payment_status           = 0;
            $refill->customer_id              = $request->customer_id;
            $refill->refill_card_id           = $request->refill_card_id;
            $refill->amount_paid              = RefillCard::find($refill->refill_card_id)->selling_price;
            $refill->card_price               = RefillCard::find($refill->refill_card_id)->selling_price;
            $refill->description              = $request->description;
            $refill->by_person                = $request->by_person;
            $refill->created_by               = Auth::User()->id;
            $refill->save();
            // redirect
            Session::flash('message', 'Successfuly Refill !');
            return back();
        }elseif ($request->payment_status == 1) {
            if ($request->amount_paid > 0) {
                $refill->amount_paid              = $request->amount_paid;
            }elseif ($request->amount_paid == 0) {
            $refill->amount_paid              = 0 ;
            }
            $refill->payment_status           = 1;
            $refill->customer_id              = $request->customer_id;
            $refill->refill_card_id           = $request->refill_card_id;
            $refill->description              = $request->description;
            $refill->card_price               = RefillCard::find($refill->refill_card_id)->selling_price;
            $refill->by_person                = $request->by_person;
            $refill->created_by               = Auth::User()->id;
                if($request->amount_paid < $refill->card_price) {
                    $refill->save();
                    return back();
                }elseif ($request->amount_paid == $refill->card_price){
                    $refill->payment_status           = 0;
                    $refill->save();
                    return back();
                }elseif ($request->amount_paid > $refill->card_price){
                    Session::flash('message_danger', 'try again!     Dude the amount paid much more then card price be careful');
                    return back();
                }

            }
        }
    }

    public function repayment(Request $request)
    {
        $id = $request -> edit_id_refill;
        $data = RefillCustomer::find($id);
        $data->payment_status        = 0;
        $data->amount_paid           = RefillCard::find($data->refill_card_id)->selling_price;;
        $data->created_by            = Auth::User()->id;
        $data -> save();
        return back()
            ->with('message_ticket','Ticket Closed successfully.');
    }

}