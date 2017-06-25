<div class="col-md-4 col-12-4 col-xs-4">
    <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-ticket" style="padding-top:20px;"></i></span>
        <div class="info-box-content" style="padding-top:5px;">
            <small class="info-box-text">Today Ticket's by <i style="color: #9f191f;"> {{ Auth::user()->name }} </i></small>
            <small class="info-box-number"><small style="color: red;">{{ App\CustomerTicket::with('user')->where('created_by', Auth::user()->id)->where('status','1')->where('created_at', '>=', Carbon\Carbon::today())->count() }}</small> &nbsp; Open Today</small>
            <small class="info-box-number"><small style="color: green;">{{ App\CustomerTicket::with('user')->where('created_by', Auth::user()->id)->where('status','0')->where('created_at', '>=', Carbon\Carbon::today())->count() }}</small> &nbsp; Closed Owned Today</small>
            <small class="info-box-number"><small style="color: green;">{{ App\CustomerTicket::with('user')->where('status','0')->where('created_at', '>=', Carbon\Carbon::today())->count() }}</small> &nbsp; Closed Foreign Today</small>
        </div>
    </div>
</div>

<div class="col-md-4 col-12-4 col-xs-4 " >
    <div class="info-box">
        <span class="info-box-icon bg-yellow" ><i class="fa fa-ticket" style="padding-top:20px;"></i></span>
        <div class="info-box-content" style="padding-top:5px;">
            <small class="info-box-text ">All Time Ticket,s by <i style="color: #9f191f;"> {{ Auth::user()->name }} </i> </small>
            <small class="info-box-number"><small style="color: red;">{{ App\CustomerTicket::with('user')->where('created_by', Auth::user()->id)->where('status','1')->count() }}</small> &nbsp; Open Ticket's </small>
            <small class="info-box-number"><small style="color: green;">{{ App\CustomerTicket::with('user')->where('created_by', Auth::user()->id)->where('status','0')->count() }}</small> &nbsp; Closed Owned Ticket's</small>
            <small class="info-box-number"><small style="color: green;">{{ App\CustomerTicket::with('user')->where('created_by', '!=' , Auth::user()->id)->where('status','0')->count() }}</small> &nbsp; Closed Foreign Ticket's</small>
        </div>
    </div>
</div>

<div class="col-md-4 col-12-4 col-xs-4">
    <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-pie-chart" style="padding-top:20px;"></i></span>
        <div class="info-box-content" style="padding-top:5px;">
            <small class="info-box-number"><small style="color: red;">{{ App\CustomerTicket::where('status','1')->count() }}</small> &nbsp; All Unclosed Ticket's All members</small>
            <small class="info-box-number"><small style="color: red;">{{ App\CustomerTicket::with('user')->where('created_by', Auth::user()->id)->where('status','1')->count() }}</small> &nbsp; Your Unclosed Ticket's All Time</small>
            <small class="info-box-number"><small style="color: red;">{{ App\CustomerTicket::where('status','1')->where('created_at', '>=', Carbon\Carbon::today())->count() }}</small> &nbsp; Open By members Today</small>
            <small class="info-box-number"><small style="color: green;">{{ App\CustomerTicket::where('status','0')->where('created_at', '>=', Carbon\Carbon::today())->count() }}</small> &nbsp; Closed By members Today</small>
        </div>
    </div>
</div>
<!-----  ==============  ------>
<div class="col-md-4 col-12-4 col-xs-4">
    <div class="info-box">
        <span class="info-box-icon bg-red" ><i class="fa fa-money" style="padding-top:20px;"></i></span>
        <div class="info-box-content" style="padding-top:5px;">
            <small class="info-box-text">Today Card Refill by <i style="color: #9f191f;"> {{ Auth::user()->name }} </i></small>
            <small class="info-box-number" style="margin-top: 10px;">{{ App\RefillCustomer::with('user')->where('created_by', Auth::user()->id)->where('created_at', '>=', Carbon\Carbon::today())->count() }} &nbsp; Card Refill </small>
            <small class="info-box-number"><small style="color: red;">{{ App\RefillCustomer::with('user')->where('created_by', Auth::user()->id)->where('payment_status','1')->where('created_at', '>=', Carbon\Carbon::today())->count() }}</small> &nbsp; Unpaid Refill</small>
        </div>
    </div>
</div>

<div class="col-md-4 col-12-4 col-xs-4">
    <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-money" style="padding-top:20px;"></i></span>
        <div class="info-box-content" style="padding-top:5px;">
            <small class="info-box-text">Today Payment Status  <i style="color: #9f191f;"> {{ Auth::user()->name }} </i></small>
            <small class="info-box-number" style="margin-top: 10px;"><small style="color: green;">{{ number_format(App\RefillCustomer::with('user')->where('created_by', Auth::user()->id)->whereColumn('created_at','=','updated_at')->where('created_at', '>=', Carbon\Carbon::today())->pluck('amount_paid')->sum() + App\RefillCustomer::with('user')->where('created_by', Auth::user()->id)->where('created_at', '>=', Carbon\Carbon::today())->pluck('first_piad')->sum()) }}</small> &nbsp; Total Amount Paid</small>
            <small class="info-box-number"><small style="color: green;">{{ number_format(App\RefillCustomer::with('user')->where('created_by', Auth::user()->id)->where('updated_at', '>=', Carbon\Carbon::today())->pluck('second_paid')->sum()) }}</small> &nbsp; Total Repayment</small>
        </div>
    </div>
</div>

<div class="col-md-4 col-12-4 col-xs-4">
    <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-line-chart" style="padding-top:20px;"></i></span>
        <div class="info-box-content" style="padding-top:5px;">
            <small class="info-box-text">Status  <i style="color: #9f191f;">  </i></small>
            <small class="info-box-number" style="margin-top: 10px;"><small style="color: red;">{{ number_format(App\RefillCustomer::with('user')->where('created_by', Auth::user()->id)->where('payment_status','=', 1)->where('created_at', '>=', Carbon\Carbon::today())->pluck('card_price')->sum() - App\RefillCustomer::with('user')->where('created_by', Auth::user()->id)->where('payment_status','=', 1)->where('created_at', '>=', Carbon\Carbon::today())->pluck('amount_paid')->sum()) }}</small> &nbsp; Total Amount Unpaid</small>
            <small class="info-box-number"><small style="color: blue;">{{ number_format(App\RefillCustomer::with('user')->where('created_by', Auth::user()->id)->whereColumn('created_at', 'created_at')->where('created_at', '>=', Carbon\Carbon::today())->pluck('amount_paid')->sum() + App\RefillCustomer::with('user')->where('created_by', Auth::user()->id)->where('updated_at', '>=', Carbon\Carbon::today())->pluck('second_paid')->sum()) }}</small> Total Income</small>
        </div>
    </div>
</div>


