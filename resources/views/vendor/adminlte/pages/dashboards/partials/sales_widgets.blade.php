
<div class="col-md-4 col-12-4 col-xs-4">
    <div class="info-box">
        <span class="info-box-icon bg-olive" ><i class="fa fa-money" style="padding-top:20px;"></i></span>
        <div class="info-box-content" style="padding-top:5px;">
            <small class="info-box-text"><strong class="text-green">Today</strong> Card Refill</small>
            <small class="info-box-number" style="margin-top: 10px;">{{ App\RefillCustomer::where('created_at', '>=', Carbon\Carbon::today())->count() }} &nbsp; Card Refill </small>
            <small class="info-box-number"><small style="color: red;">{{ App\RefillCustomer::where('payment_status','1')->where('created_at', '>=', Carbon\Carbon::today())->count() }}</small> &nbsp; Unpaid Refill</small>
        </div>
    </div>
</div>

<div class="col-md-4 col-12-4 col-xs-4">
    <div class="info-box">
        <span class="info-box-icon bg-olive"><i class="fa fa-money" style="padding-top:20px;"></i></span>
        <div class="info-box-content" style="padding-top:5px;">
            <small class="info-box-text"><strong class="text-green">Today</strong> Payment</small>
            <small class="info-box-number" style="margin-top: 10px;"><small style="color: green;">{{ number_format(App\RefillCustomer::whereColumn('created_at','=','updated_at')->where('created_at', '>=', Carbon\Carbon::today())->pluck('amount_paid')->sum() + App\RefillCustomer::where('created_at', '>=', Carbon\Carbon::today())->pluck('first_piad')->sum()) }}</small> &nbsp; Total Amount Paid</small>
            <small class="info-box-number"><small style="color: green;">{{ number_format(App\RefillCustomer::where('updated_at', '>=', Carbon\Carbon::today())->pluck('second_paid')->sum()) }}</small> &nbsp; Total Repayment</small>
        </div>
    </div>
</div>

<div class="col-md-4 col-12-4 col-xs-4">
    <div class="info-box">
        <span class="info-box-icon bg-olive"><i class="fa fa-line-chart" style="padding-top:20px;"></i></span>
        <div class="info-box-content" style="padding-top:5px;">
            <small class="info-box-text"><strong class="text-green">Today</strong> Status</small>
            <small class="info-box-number"><small style="color: red;">{{ number_format(App\RefillCustomer::where('payment_status','=', 1)->where('created_at', '>=', Carbon\Carbon::today())->pluck('card_price')->sum() - App\RefillCustomer::where('payment_status','=', 1)->where('created_at', '>=', Carbon\Carbon::today())->pluck('amount_paid')->sum()) }}</small> &nbsp; Total Amount Unpaid</small>
            <small class="info-box-number"><small style="color: blue;">{{ number_format(App\RefillCustomer::whereColumn('created_at', 'updated_at')->where('created_at', '>=', Carbon\Carbon::today())->pluck('amount_paid')->sum() + App\RefillCustomer::where('updated_at', '>=', Carbon\Carbon::today())->pluck('second_paid')->sum()) }}</small> Total Income</small>
            <small class="info-box-number"><small style="color: blue;">{{ number_format(App\RefillCustomer::where('created_at', '>=', Carbon\Carbon::today())->pluck('card_price')->sum() - App\RefillCustomer::where('created_at', '>=', Carbon\Carbon::today())->pluck('card_cost')->sum()) }}</small> Total Profits</small>
        </div>
    </div>
</div>

<!--  ######   ######   ######   ######   ######   ######   ######   ######   ######   ######   ###### -->



<div class="col-md-4 col-12-4 col-xs-4">
    <div class="info-box">
        <span class="info-box-icon bg-olive" ><i class="fa fa-money" style="padding-top:20px;"></i></span>
        <div class="info-box-content" style="padding-top:5px;">
            <small class="info-box-text"><strong class="text-green">Yesterday</strong> Card Refill</small>
            <small class="info-box-number" style="margin-top: 10px;">{{ App\RefillCustomer::where('created_at', '>=', Carbon\Carbon::yesterday())->count() }} &nbsp; Card Refill </small>
            <small class="info-box-number"><small style="color: red;">{{ App\RefillCustomer::where('payment_status','1')->where('created_at', '>=', Carbon\Carbon::yesterday())->count() }}</small> &nbsp; Unpaid Refill</small>
        </div>
    </div>
</div>

<div class="col-md-4 col-12-4 col-xs-4">
    <div class="info-box">
        <span class="info-box-icon bg-olive"><i class="fa fa-money" style="padding-top:20px;"></i></span>
        <div class="info-box-content" style="padding-top:5px;">
            <small class="info-box-text"><strong class="text-green">Yesterday</strong> Payment</small>
            <small class="info-box-number" style="margin-top: 10px;"><small style="color: green;">{{ number_format(App\RefillCustomer::whereColumn('created_at','=','updated_at')->where('created_at', '>=', Carbon\Carbon::yesterday())->pluck('amount_paid')->sum() + App\RefillCustomer::where('created_at', '>=', Carbon\Carbon::yesterday())->pluck('first_piad')->sum()) }}</small> &nbsp; Total Amount Paid</small>
            <small class="info-box-number"><small style="color: green;">{{ number_format(App\RefillCustomer::where('updated_at', '>=', Carbon\Carbon::yesterday())->pluck('second_paid')->sum()) }}</small> &nbsp; Total Repayment</small>
        </div>
    </div>
</div>

<div class="col-md-4 col-12-4 col-xs-4">
    <div class="info-box">
        <span class="info-box-icon bg-olive"><i class="fa fa-line-chart" style="padding-top:20px;"></i></span>
        <div class="info-box-content" style="padding-top:5px;">
            <small class="info-box-text"><strong class="text-green">Yesterday</strong> Status</small>
            <small class="info-box-number"><small style="color: red;">{{ number_format(App\RefillCustomer::where('payment_status','=', 1)->where('created_at', '>=', Carbon\Carbon::yesterday())->pluck('card_price')->sum() - App\RefillCustomer::where('payment_status','=', 1)->where('created_at', '>=', Carbon\Carbon::yesterday())->pluck('amount_paid')->sum()) }}</small> &nbsp; Total Amount Unpaid</small>
            <small class="info-box-number"><small style="color: blue;">{{ number_format(App\RefillCustomer::whereColumn('created_at', 'updated_at')->where('created_at', '>=', Carbon\Carbon::yesterday())->pluck('amount_paid')->sum() + App\RefillCustomer::where('updated_at', '>=', Carbon\Carbon::yesterday())->pluck('second_paid')->sum()) }}</small> Total Income</small>
            <small class="info-box-number"><small style="color: blue;">{{ number_format(App\RefillCustomer::where('created_at', '>=', Carbon\Carbon::yesterday())->pluck('card_price')->sum() - App\RefillCustomer::where('created_at', '>=', Carbon\Carbon::yesterday())->pluck('card_cost')->sum()) }}</small> Total Profits</small>
        </div>
    </div>
</div>

<!--  ######   ######   ######   ######   ######   ######   ######   ######   ######   ######   ###### -->

<div class="col-md-4 col-12-4 col-xs-4">
    <div class="info-box">
        <span class="info-box-icon bg-olive" ><i class="fa fa-money" style="padding-top:20px;"></i></span>
        <div class="info-box-content" style="padding-top:5px;">
            <small class="info-box-text"><strong class="text-green">week</strong> Card Refill</small>
            <small class="info-box-number" style="margin-top: 10px;">{{ App\RefillCustomer::where('created_at', '>=', Carbon\Carbon::now()->subWeek())->count() }} &nbsp; Card Refill </small>
            <small class="info-box-number"><small style="color: red;">{{ App\RefillCustomer::where('payment_status','1')->where('created_at', '>=', Carbon\Carbon::now()->subWeek())->count() }}</small> &nbsp; Unpaid Refill</small>
        </div>
    </div>
</div>

<div class="col-md-4 col-12-4 col-xs-4">
    <div class="info-box">
        <span class="info-box-icon bg-olive"><i class="fa fa-money" style="padding-top:20px;"></i></span>
        <div class="info-box-content" style="padding-top:5px;">
            <small class="info-box-text"><strong class="text-green">week</strong> Payment</small>
            <small class="info-box-number" style="margin-top: 10px;"><small style="color: green;">{{ number_format(App\RefillCustomer::whereColumn('created_at','=','updated_at')->where('created_at', '>=', Carbon\Carbon::now()->subWeek())->pluck('amount_paid')->sum() + App\RefillCustomer::where('created_at', '>=', Carbon\Carbon::now()->subWeek())->pluck('first_piad')->sum()) }}</small> &nbsp; Total Amount Paid</small>
            <small class="info-box-number"><small style="color: green;">{{ number_format(App\RefillCustomer::where('updated_at', '>=', Carbon\Carbon::now()->subWeek())->pluck('second_paid')->sum()) }}</small> &nbsp; Total Repayment</small>
        </div>
    </div>
</div>

<div class="col-md-4 col-12-4 col-xs-4">
    <div class="info-box">
        <span class="info-box-icon bg-olive"><i class="fa fa-line-chart" style="padding-top:20px;"></i></span>
        <div class="info-box-content" style="padding-top:5px;">
            <small class="info-box-text"><strong class="text-green">week</strong> Status</small>
            <small class="info-box-number"><small style="color: red;">{{ number_format(App\RefillCustomer::where('payment_status','=', 1)->where('created_at', '>=', Carbon\Carbon::now()->subWeek())->pluck('card_price')->sum() - App\RefillCustomer::where('payment_status','=', 1)->where('created_at', '>=', Carbon\Carbon::now()->subWeek())->pluck('amount_paid')->sum()) }}</small> &nbsp; Total Amount Unpaid</small>
            <small class="info-box-number"><small style="color: blue;">{{ number_format(App\RefillCustomer::whereColumn('created_at', 'updated_at')->where('created_at', '>=', Carbon\Carbon::now()->subWeek())->pluck('amount_paid')->sum() + App\RefillCustomer::where('updated_at', '>=', Carbon\Carbon::now()->subWeek())->pluck('second_paid')->sum()) }}</small> Total Income</small>
            <small class="info-box-number"><small style="color: blue;">{{ number_format(App\RefillCustomer::where('created_at', '>=', Carbon\Carbon::now()->subWeek())->pluck('card_price')->sum() - App\RefillCustomer::where('created_at', '>=', Carbon\Carbon::now()->subWeek())->pluck('card_cost')->sum()) }}</small> Total Profits</small>
        </div>
    </div>
</div>


<!--  ######   ######   ######   ######   ######   ######   ######   ######   ######   ######   ###### -->


<div class="col-md-4 col-12-4 col-xs-4">
    <div class="info-box">
        <span class="info-box-icon bg-olive" ><i class="fa fa-money" style="padding-top:20px;"></i></span>
        <div class="info-box-content" style="padding-top:5px;">
            <small class="info-box-text"><strong class="text-green">Month</strong> Card Refill</small>
            <small class="info-box-number" style="margin-top: 10px;">{{ App\RefillCustomer::where('created_at', '>=', Carbon\Carbon::now()->subMonth())->count() }} &nbsp; Card Refill </small>
            <small class="info-box-number"><small style="color: red;">{{ App\RefillCustomer::where('payment_status','1')->where('created_at', '>=', Carbon\Carbon::now()->subMonth())->count() }}</small> &nbsp; Unpaid Refill</small>
        </div>
    </div>
</div>

<div class="col-md-4 col-12-4 col-xs-4">
    <div class="info-box">
        <span class="info-box-icon bg-olive"><i class="fa fa-money" style="padding-top:20px;"></i></span>
        <div class="info-box-content" style="padding-top:5px;">
            <small class="info-box-text"><strong class="text-green">Month</strong> Payment</small>
            <small class="info-box-number" style="margin-top: 10px;"><small style="color: green;">{{ number_format(App\RefillCustomer::whereColumn('created_at','=','updated_at')->where('created_at', '>=', Carbon\Carbon::now()->subMonth())->pluck('amount_paid')->sum() + App\RefillCustomer::where('created_at', '>=', Carbon\Carbon::now()->subMonth())->pluck('first_piad')->sum()) }}</small> &nbsp; Total Amount Paid</small>
            <small class="info-box-number"><small style="color: green;">{{ number_format(App\RefillCustomer::where('updated_at', '>=', Carbon\Carbon::now()->subMonth())->pluck('second_paid')->sum()) }}</small> &nbsp; Total Repayment</small>
        </div>
    </div>
</div>

<div class="col-md-4 col-12-4 col-xs-4">
    <div class="info-box">
        <span class="info-box-icon bg-olive"><i class="fa fa-line-chart" style="padding-top:20px;"></i></span>
        <div class="info-box-content" style="padding-top:5px;">
            <small class="info-box-text"><strong class="text-green">Month</strong> Status</small>
            <small class="info-box-number"><small style="color: red;">{{ number_format(App\RefillCustomer::where('payment_status','=', 1)->where('created_at', '>=', Carbon\Carbon::now()->subMonth())->pluck('card_price')->sum() - App\RefillCustomer::where('payment_status','=', 1)->where('created_at', '>=', Carbon\Carbon::now()->subMonth())->pluck('amount_paid')->sum()) }}</small> &nbsp; Total Amount Unpaid</small>
            <small class="info-box-number"><small style="color: blue;">{{ number_format(App\RefillCustomer::whereColumn('created_at', 'updated_at')->where('created_at', '>=', Carbon\Carbon::now()->subMonth())->pluck('amount_paid')->sum() + App\RefillCustomer::where('updated_at', '>=', Carbon\Carbon::now()->subMonth())->pluck('second_paid')->sum()) }}</small> Total Income</small>
            <small class="info-box-number"><small style="color: blue;">{{ number_format(App\RefillCustomer::where('created_at', '>=', Carbon\Carbon::now()->subMonth())->pluck('card_price')->sum() - App\RefillCustomer::where('created_at', '>=', Carbon\Carbon::now()->subMonth())->pluck('card_cost')->sum()) }}</small> Total Profits</small>

        </div>
    </div>
</div>