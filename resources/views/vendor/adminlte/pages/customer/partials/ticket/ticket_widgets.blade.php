<!-- Main content -->
<section class="box-body">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
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

    <div class="col-md-4 col-sm-6 col-xs-12" >
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

    <div class="col-md-4 col-sm-6 col-xs-12">
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

    </div>
</section>