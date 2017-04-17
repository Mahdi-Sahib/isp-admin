@if ($message = Session::get('message_broadcast'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@include('adminlte::layouts.partials.notifications')

<button type="button" class="btn btn-warning btn-sm pull-right" data-toggle="modal" data-target="#addModal_tower_ticket"><i class="fa fa-btn fa-ticket"></i> Something Happened</button>
<br>
<br>
<div>
    <table id="ticket_table" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>category</th>
            <th>title</th>
            <th>Created by</th>
            <th>Created at</th>
            <th>Status</th>
            <th>Options</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
        <tfoot>
        <tr>
            <th>#</th>
            <th>category</th>
            <th>title</th>
            <th>Created by</th>
            <th>Created at</th>
            <th>Status</th>
            <th>Options</th>
        </tr>
        </tfoot>
    </table>
</div>

<!-- Add Modal start -->
<div class="modal fade" id="addModal_tower_ticket" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" > <label class="fa fa-ticket"></label> Open new ticket</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('isp-cpanel/tower/tower_ticket') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-9" class="form-group">
                                <label><div class="fa fa-comment-o"></div> Title :</label>
                                <input type="text" class="form-control"  name="title">
                            </div>
                            <div class="col-lg-3" class="form-group">
                                <label><div class="fa fa-wheelchair"></div> Priority :</label>
                                {!! Form::select("tower_ticket_priority", tower_ticket_priority(), null ,['class'=>'form-control','name'=>'priority']) !!}
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            <label><div class="fa fa-commenting"></div> Message :</label>
                            <textarea type="text" rows="5"  class="form-control"  name="message"> </textarea>
                        </div>
                        <input id="category"  name="category"  value="1" hidden>
                        <input id="tower_id"  name="tower_id"  value="{{ $tower->id }}" hidden>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-warning">
                        <i class="fa fa-btn fa-ticket"></i> Open Ticket
                    </button>                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- add code ends -->


<input type="hidden" name="hidden_view_ticket" id="hidden_view_ticket" value="{{url('isp-cpanel/tower/tower_ticket/view')}}">
<!-- View Modal start -->
<div class="modal fade " id="viewModal_ticket" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">The Tower {{ $tower->name }} have a Ticket with</h4>
            </div>

            <div class="box">

                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <tbody>
                        <tr class="warning">
                            <th><label class="glyphicon glyphicon-hand-right" style=" font-size: 22px;"></label></th>
                            <th>Label</th>
                            <th>Value</th>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 22px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td>Device :</td>
                            <td>
                                @if ( count($device) < 1 ) <br> <p style="color: red">you didn't add devices go to settings -> BASIC INPUT -> devices </p>  @else
                                    <spin id="view_device_id"> </spin>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td> <label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td>Number or Sign (#) :</td>
                            <td><span class="badge bg-yellow" id="view_number_Sign" style="color: yellow ; font-size: 21px;"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-question-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></td>
                            <td>Name :</td>
                            <td><span id="view_name"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></td>
                            <td>SSID :</td>
                            <td><span id="view_ssid"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></td>
                            <td> IP :</td>
                            <td><span id="view_ip"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></td>
                            <td>MAC Address :</td>
                            <td><span id="view_mac"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></td>
                            <td>Antenna Type :</td>
                            <td><span id="view_antenna"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></td>
                            <td>Detection Degree :</td>
                            <td><span id="view_degree"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></td>
                            <td>Antenna Gin :</td>
                            <td><span id="view_gin"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></td>
                            <td>Channel :</td>
                            <td><div><span id="view_channal"></span></div></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></td>
                            <td>Channal Width (CW) :</td>
                            <td><span id="view_channal_width"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></td>
                            <td>Direction :</td>
                            <td><span id="view_direction"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></td>
                            <td>More Information :</td>
                            <td style="width: 75px">
                                <div class="bs-callout bs-callout-danger">
                                    <textbox class="form-control" id="view_broadcasts_info" style="height: 100px ; width: 500px"></textbox>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Dismiss</button>
            </div>
        </div>
    </div>
</div>
<!-- view modal ends -->
