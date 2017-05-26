
    <div class="col-md-4 col-12-4 col-xs-4">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-ticket" style="padding-top:20px;"></i></span>
            <div class="info-box-content" style="padding-top:5px;">
                <small class="info-box-text">Today Ticket's by <i style="color: #9f191f;"> {{ Auth::user()->name }} </i></small>
                <small class="info-box-number">{{ App\CustomerTicket::with('user')->where('created_by', Auth::user()->id)->where('status','1')->where('created_at', '>=', Carbon\Carbon::now()->subDay(1))->count() }} &nbsp; Open Today</small>
                <small class="info-box-number">{{ App\CustomerTicket::with('user')->where('created_by', Auth::user()->id)->where('status','0')->where('created_at', '>=', Carbon\Carbon::now()->subDay(1))->count() }} &nbsp; Closed Owned Today</small>
                <small class="info-box-number">{{ App\CustomerTicket::with('user')->where('status','0')->where('created_at', '>=', Carbon\Carbon::now()->subDay(1))->count() }} &nbsp; Closed Foreign Today</small>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-12-4 col-xs-4 " >
        <div class="info-box">
            <span class="info-box-icon bg-yellow" ><i class="fa fa-ticket" style="padding-top:20px;"></i></span>
            <div class="info-box-content" style="padding-top:5px;">
                <small class="info-box-text ">All Time Ticket,s by <i style="color: #9f191f;"> {{ Auth::user()->name }} </i> </small>
                <small class="info-box-number">{{ App\CustomerTicket::with('user')->where('created_by', Auth::user()->id)->where('status','1')->count() }} &nbsp; Open Ticket's </small>
                <small class="info-box-number">{{ App\CustomerTicket::with('user')->where('created_by', Auth::user()->id)->where('status','0')->count() }} &nbsp; Closed Owned Ticket's</small>
                <small class="info-box-number">{{ App\CustomerTicket::with('user')->where('created_by', '!=' , Auth::user()->id)->where('status','0')->count() }} &nbsp; Closed Foreign Ticket's</small>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-12-4 col-xs-4">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-pie-chart" style="padding-top:20px;"></i></span>
            <div class="info-box-content" style="padding-top:5px;">
                <small class="info-box-number">{{ App\CustomerTicket::where('status','1')->count() }} &nbsp; All Unclosed Ticket's All members</small>
                <small class="info-box-number">{{ App\CustomerTicket::with('user')->where('created_by', Auth::user()->id)->where('status','1')->count() }} &nbsp; Your Unclosed Ticket's All Time</small>
                <small class="info-box-number">{{ App\CustomerTicket::where('status','1')->where('created_at', '>=', Carbon\Carbon::now()->subDay(1))->count() }} &nbsp; Open By members Today</small>
                <small class="info-box-number">{{ App\CustomerTicket::where('status','0')->where('created_at', '>=', Carbon\Carbon::now()->subDay(1))->count() }} &nbsp; Closed By members Today</small>
            </div>
        </div>
    </div>
        <!-----  ==============  ------>
    <div class="col-md-4 col-12-4 col-xs-4">
        <div class="info-box">
            <span class="info-box-icon bg-red" ><i class="fa fa-money" style="padding-top:20px;"></i></span>
            <div class="info-box-content" style="padding-top:5px;">
                <small class="info-box-text">Today Card Refill by <i style="color: #9f191f;"> {{ Auth::user()->name }} </i></small>
                <small class="info-box-number" style="margin-top: 10px;">{{ App\RefillCustomer::with('user')->where('created_by', Auth::user()->id)->where('created_at', '>=', Carbon\Carbon::now()->subDay(1))->count() }} &nbsp; Card Refill Today</small>
                <small class="info-box-number">{{ App\RefillCustomer::with('user')->where('created_by', Auth::user()->id)->where('payment_status','1')->where('created_at', '>=', Carbon\Carbon::now()->subDay(1))->count() }} &nbsp; Unpaid Refill</small>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-12-4 col-xs-4">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-money" style="padding-top:20px;"></i></span>
            <div class="info-box-content" style="padding-top:5px;">
                <small class="info-box-text">Today Payment Status  <i style="color: #9f191f;"> {{ Auth::user()->name }} </i></small>
                <small class="info-box-number" style="margin-top: 10px;">{{ number_format(App\RefillCustomer::with('user')->where('created_by', Auth::user()->id)->where('created_at', '>=', Carbon\Carbon::now()->subDay(1))->pluck('amount_paid')->sum()) }} &nbsp; Total Amount Paid Today</small>
                <small class="info-box-number">{{ number_format(App\RefillCustomer::with('user')->where('created_by', Auth::user()->id)->where('payment_status','=', 1)->where('created_at', '>=', Carbon\Carbon::now()->subDay(1))->pluck('card_price')->sum() - App\RefillCustomer::with('user')->where('created_by', Auth::user()->id)->where('payment_status','=', 1)->where('created_at', '>=', Carbon\Carbon::now()->subDay(1))->pluck('amount_paid')->sum()) }} &nbsp; Total Amount Unpaid</small>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-12-4 col-xs-4">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-line-chart" style="padding-top:20px;"></i></span>
            <div class="info-box-content" style="padding-top:5px;">
                <small class="info-box-number"><i class="fa fa-arrow-down"></i> {{ number_format(App\RefillCustomer::where('payment_status','=', 1)->pluck('card_price')->sum() - App\RefillCustomer::where('payment_status','=', 1)->pluck('amount_paid')->sum()) }} Total Unpaid Amount</small>
                <small class="info-box-number"><i class="fa fa-arrow-up"></i> {{ number_format(App\RefillCustomer::where('payment_status','=', 1)->pluck('card_price')->sum() - App\RefillCustomer::where('payment_status','=', 1)->pluck('amount_paid')->sum()) }} Customer Add By {{ Auth::user()->name }}</small>
                <small class="info-box-number"><i class="fa fa-arrow-up"></i> {{ number_format(App\RefillCustomer::where('payment_status','=', 1)->pluck('card_price')->sum() - App\RefillCustomer::where('payment_status','=', 1)->pluck('amount_paid')->sum()) }} Total Unpaid Amount</small>
                <small class="info-box-number"><i class="fa fa-arrow-down"></i> {{ number_format(App\RefillCustomer::where('payment_status','=', 1)->pluck('card_price')->sum() - App\RefillCustomer::where('payment_status','=', 1)->pluck('amount_paid')->sum()) }} Total Debt</small>
            </div>
        </div>
    </div>
