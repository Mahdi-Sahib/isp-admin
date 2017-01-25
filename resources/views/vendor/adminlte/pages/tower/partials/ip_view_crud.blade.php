@if ($message = Session::get('message_ip'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif
@include('adminlte::layouts.partials.notifications')
<button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addModal_ip">Add New IP</button>
<br>
<br>
<div class="box-bod">
    <table id="broadcast" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>IP</th>
            <th>Options</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tower->towerip as $tower_ips)
            <tr>
                <td>{{$tower_ips->ip}}</td>
                <td class="text-center">
                    <!-- Single button -->
                    <div class="btn-group" >
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="" data-toggle="modal" data-target="#viewModal_ip" onclick="fun_view('{{$tower_ips -> id}}')">View</a></li>
                            <li><a href="" data-toggle="modal" data-target="#editModal_ip" onclick="fun_edit('{{$tower_ips -> id}}')">Edit</a></li>
                            <li><a href="" onclick="fun_delete('{{$tower_ips -> id}}')">Delete</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>IP</th>
            <th>Options</th>
        </tr>
        </tfoot>
    </table>
</div>
<input type="hidden" name="hidden_view_ip" id="hidden_view_ip" value="{{url('isp-cpanel/tower/tower_ip/view')}}">
<input type="hidden" name="hidden_delete_ip" id="hidden_delete_ip" value="{{url('isp-cpanel/tower/tower_ip/delete')}}">

<!-- Add Modal start -->
<div class="modal fade" id="addModal_ip" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add IP</h4>
            </div>

            <div class="modal-body">
                <form action="{{ url('isp-cpanel/tower/tower_ip') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="box-body">
                            <div class="form-group">
                                Example ..
                                <lo>
                                    <li>10.33.196</li>
                                    <li>10.33.196.1</li>
                                </lo>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="ip">IP:</label>
                            <input type="text" class="form-control" id="ip" name="ip">
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
<!-- add code ends -->

<!-- View Modal start -->
<div class="modal fade" id="viewModal_ip" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">about this IP </h4>
            </div>
            <div class="modal-body">
                <p><b>IP : </b><h3><span id="view_tower_ip" class="text-success"></span></h3></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Dismiss</button>
            </div>
        </div>
    </div>
</div>
<!-- view modal ends -->

<!-- Edit Modal start -->
<div class="modal fade" id="editModal_ip" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit this Broadcast</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('isp-cpanel/tower/tower_ip/update') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="form-group">
                            <label for="edit_tower_ip">IP : </label>
                            <input type="text" class="form-control" id="edit_tower_ip" name="ip">
                        </div>
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
