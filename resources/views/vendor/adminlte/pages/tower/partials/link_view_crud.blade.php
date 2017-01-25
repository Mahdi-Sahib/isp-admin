@if ($message = Session::get('message_link'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif
@include('adminlte::layouts.partials.notifications')
<button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addModal_link">Add New Link</button>
<br>
<br>
<div class="box-bod">
    <table id="broadcast" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>IP</th>
            <th>Connection Type</th>
            <th>Options</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tower->towerlink as $x)
            <tr>
                <td>{{ $x->slave_ip }}</td>
                <td>{{ $x->connectiontype->connection_types }}</td>
                <td class="text-center">
                    <!-- Single button -->
                    <div class="btn-group" >
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="" data-toggle="modal" data-target="#viewModal_link" onclick="fun_view('{{$x -> id}}')">View</a></li>
                            <li><a href="" data-toggle="modal" data-target="#editModal_link" onclick="fun_edit('{{$x -> id}}')">Edit</a></li>
                            <li><a href="" onclick="fun_delete('{{$x -> id}}')">Delete</a></li>
                            <li><a href="#">Ticket</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>IP</th>
            <th>Connection Type</th>
            <th>Options</th>
        </tr>
        </tfoot>
    </table>
</div>
<input type="hidden" name="hidden_view_link" id="hidden_view_link" value="{{url('isp-cpanel/tower/tower_link/view')}}">
<input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('isp-cpanel/tower/tower_link/delete')}}">

<!-- Add Modal start -->
<div class="modal fade" id="addModal_link" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add IP</h4>
            </div>

            <div class="modal-body">
                <form action="{{ url('isp-cpanel/tower/tower_link') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="form-group">
                            <label><div class="fa fa-gears"></div>Connection Type :</label>
                            <select name="connection_types_id" class="form-control">
                                @foreach ($connection as $connection)
                                    <option value="{!! $connection->id !!}" >{!! $connection->connection_types !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slave_ip">IP:</label>
                            <input type="text" class="form-control" id="slave_ip" name="slave_ip">
                        </div>
                        <input id="tower_id"  name="tower_id"  value="{{ $tower->id }}" hidden>
                    </div>
                    <button type="submit" class="btn btn-info">this new IP</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<!-- View Modal start -->
<div class="modal fade" id="viewModal_link" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">about this Broadcast </h4>
            </div>

            <div class="modal-body">
                <p><b>Device : </b><h3><span id="view_device_id" class="text-success">  </span></h3></p>
            </div>
            <hr style="height:1px;border:none;color:#333;background-color:#333;" />
            <div class="modal-body">
                <p><b>Number Sign (#): </b><h3><span id="view_number_Sign" class="text-success"></span></h3></p>
            </div>
            <hr style="height:1px;border:none;color:#333;background-color:#333;" />
            <div class="modal-body">
                <p><b>Name : </b><h3><span id="view_name" class="text-success"></span></h3></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Dismiss</button>
            </div>
        </div>
    </div>
</div>
<!-- view modal ends -->

<!-- Edit Modal start -->
<div class="modal fade" id="editModal_link" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit this Broadcast</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('isp-cpanel/tower/tower_link/update') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="form-group">
                            <label for="edit_number_Sign">ip: </label>
                            <input type="text" class="form-control" id="edit_number_Sign" name="number_sign">
                        </div>
                        <div class="form-group">
                            <label for="edit_number_Sign">Connection Type : </label>
                            <input type="text" class="form-control" id="edit_number_Sign" name="number_sign">
                        </div>
                    <button type="submit" class="btn btn-default">Update</button>
                    <input type="hidden" id="edit_id" name="edit_id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
