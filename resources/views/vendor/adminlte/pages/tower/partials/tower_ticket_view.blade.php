@if ($message = Session::get('message_ticket'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

<button type="button" class="btn btn-warning btn-sm pull-right" data-toggle="modal"
        data-target="#addModal_tower_ticket"><i class="fa fa-btn fa-ticket"></i> Something Happened
</button>
<br>
<br>
<div>
    <table id="ticket_table" class="table table-bordered table-striped">
        <thead>
        <tr>
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
                <h4 class="modal-title"><label class="fa fa-ticket"></label> Open new ticket</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('isp-cpanel/tower/tower_ticket') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-9" class="form-group">
                                <label>
                                    <div class="fa fa-comment-o"></div>
                                    Title :</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="col-lg-3" class="form-group">
                                <label>
                                    <div class="fa fa-wheelchair"></div>
                                    Priority :</label>
                                {!! Form::select("tower_ticket_priority", tower_ticket_priority(), null ,['class'=>'form-control','name'=>'priority']) !!}
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            <label>
                                <div class="fa fa-commenting"></div>
                                Message :</label>
                            <textarea type="text" rows="5" class="form-control" name="message"> </textarea>
                        </div>
                        <input id="category" name="category" value="0" hidden>
                        <input id="tower_id" name="tower_id" value="{{ $tower->id }}" hidden>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-warning">
                        <i class="fa fa-btn fa-ticket"></i> Open Ticket
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- add code ends -->


<input type="hidden" name="hidden_view_ticket" id="hidden_view_ticket"
       value="{{url('isp-cpanel/tower/tower_ticket/view-ticket')}}">
<input type="hidden" name="hidden_view_ticket" id="hidden_view_ticket"
       value="{{url('isp-cpanel/tower/tower_ticket/close_ticket')}}">
<!-- View Modal start -->
<div class="modal fade " id="viewModal_ticket" role="dialog">e
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"> Ticket : </h4>
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
                            <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                       href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                       title="any sign for hint the broadcast"></label></td>
                            <td> Category :</td>
                            <td><span id="view_category"></span></td>
                        </tr>
                        <tr>
                            <td><label class="glyphicon glyphicon-question-sign" style="color: green ; font-size: 21px;"
                                       href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                       title="any sign for hint the broadcast"></label></td>
                            <td> Priority :</td>
                            <td><span id="view_priority"></span></td>
                        </tr>
                        <tr>
                            <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                       href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                       title="any sign for hint the broadcast"></label></td>
                            <td> Status :</td>
                            <td><span id="view_status" class="label bg-red" style="font-size: 21px;"></span></td>
                        </tr>
                        <tr>
                            <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                       href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                       title="any sign for hint the broadcast"></label></td>
                            <td> Created by :</td>
                            <td><span id="view_created_by"></span></td>
                        </tr>
                        <tr>
                            <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                       href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                       title="any sign for hint the broadcast"></label></td>
                            <td> Update by :</td>
                            <td><span id="view_updated_by"></span></td>
                        </tr>
                        <tr>
                            <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                       href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                       title="any sign for hint the broadcast"></label></td>
                            <td> Closed_by :</td>
                            <td><span id="view_closed_by"></span></td>
                        </tr>
                        <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                   href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                   title="any sign for hint the broadcast"></label></td>
                        <td> Title :</td>
                        <td><span id="view_title"></span></td>
                        </tr>
                        <tr>
                            <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                       href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                       title="any sign for hint the broadcast"></label></td>
                            <td> Message :</td>
                            <td><span style="color: red " id="view_message"></span></td>
                        </tr>
                        <tr>
                            <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                       href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                       title="any sign for hint the broadcast"></label></td>
                            <td> Close Message :</td>
                            <td><span style="color: green " id="view_close_message"></span></td>
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


<!-- Edit Modal start -->
<div class="modal fade" id="close_message" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Close Ticket</h4>
            </div>
            <div class="modal-body">
                {!! Form::open( ['url' => 'isp-cpanel/tower/tower_ticket/close_ticket' , 'method' => 'post']) !!}
                {{ csrf_field() }}
                <div class="form-group">
                    <label>
                        <div class="fa fa-commenting"></div>
                        Message :</label>
                    <textarea id="" type="text" rows="5" class="form-control" name="close_message"> </textarea>
                </div>
                <button type="submit" class="btn btn-default">Close Ticket</button>
                <input type="hidden" id="edit_id_ticket" name="edit_id_ticket">
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
