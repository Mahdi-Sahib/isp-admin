<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
        <div class="inner">
            <h3>{{ \App\TowerTicket::where(['status' => 1])->whereDay('created_at', '=', date('d'))->get()->count() }}</h3>
            <p>Open Ticket's</p>
        </div>
        <a href="#"
           class="small-box-footer"> {{  \App\TowerTicket::whereDay('created_at', '=', date('d'))->get()->count() }}
            Tecket(s) Today Opened</a></div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
        <div class="inner">
            <h3>{{ \App\TowerTicket::where(['status' => 0])->whereDay('created_at', '=', date('d'))->get()->count() }}</h3>
            <p>Ticket Closed Today</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
        <div class="inner">
            <h3>{{  \App\Broadcast::count()  }}</h3>

            <p>Broadcast's</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
        <div class="inner">
            <h3>{{  \App\TowerLink::count()  }}</h3>

            <p>Link's</p>
        </div>
        <div class="icon">
            <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
