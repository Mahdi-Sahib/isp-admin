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
<div class="modal fade" id="viewModal_ticket" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">about this ticket </h4>
            </div>
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td> </td>
                        <td></td>
                        <td><span class="badge bg-yellow" id="view_tower_ticket_title" style="color: yellow ; font-size: 21px;"></span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Dismiss</button>
            </div>
        </div>
    </div>
</div>

<!-- view modal ends -->
