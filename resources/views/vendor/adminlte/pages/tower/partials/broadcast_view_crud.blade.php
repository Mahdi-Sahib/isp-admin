@if ($message = Session::get('message_broadcast'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif
@include('adminlte::layouts.partials.notifications')
<button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addModal">Add New BroadCast</button>
<br>
<br>
<div class="box-bod">
    <table id="broadcast" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>ssid</th>
            <th>IP</th>
            <th>MAC</th>
            <th>CW</th>
            <th>Brand</th>
            <th>Options</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tower->broadcast as $x)
            <tr>
                <td>{{$x -> number_sign}}</td>
                <td>{{$x -> ssid}}</td>
                <td>{{$x -> ip}}</td>
                <td>{{$x -> mac}}</td>
                <td>{{$x -> channal_width}}</td>
                <td>{{$x->device -> brand_model}}</td>
                <td class="text-center">
                    <!-- Single button -->
                    <div class="btn-group" >
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="" data-toggle="modal" data-target="#viewModal_broadcast" onclick="fun_view('{{$x -> id}}')">View</a></li>
                            <li><a href="" data-toggle="modal" data-target="#editModal" onclick="fun_edit('{{$x -> id}}')">Edit</a></li>
                            <li><a href="">Config</a></li>
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
            <th>#</th>
            <th>ssid</th>
            <th>IP</th>
            <th>MAC</th>
            <th>CW</th>
            <th>Brand</th>
            <th>Options</th>
        </tr>
        </tfoot>
    </table>
</div>
<input type="hidden" name="hidden_view" id="hidden_view" value="{{url('isp-cpanel/tower/tower_broadcast/view')}}">
<input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('isp-cpanel/tower/tower_broadcast/delete')}}">

<!-- Add Modal start -->
<div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Broadcast</h4>
            </div>

            <div class="modal-body">
                <form action="{{ url('isp-cpanel/tower/tower_broadcast') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="form-group">
                            <label><div class="fa fa-gears"></div> Brand</label>
                            <select name="device_id" class="form-control" value="{{ old('device_id') }}">
                                @foreach ($device as $device)
                                    <option value="{!! $device->id !!}" >{!! $device->brand_model !!}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="number_Sign">Number Sign (#):</label>
                            <input type="text" class="form-control" id="number_Sign" name="number_sign">
                        </div>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="ssid">SSID:</label>
                            <input type="text" class="form-control" id="ssid" name="ssid">
                        </div>
                        <div class="form-group">
                            <label for="ip">IP:</label>
                            <input type="text" class="form-control" id="ip" name="ip">
                        </div>
                        <div class="form-group">
                            <label for="mac">MAC Assress:</label>
                            <input type="text" class="form-control" id="mac" name="mac" maxlength="17">
                        </div>
                        <div class="form-group">
                            <label for="channal_width">Channal Width (CW):</label>
                            <select class="form-control" id="channal_width" name="channal_width">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                                <option value="20/40">20/40</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="direction">Direction:</label>
                            <input type="text" class="form-control" id="direction" name="direction">
                        </div>
                        <div class="form-group">
                            <label for="broadcasts_info">Broadcasts info:</label>
                            <input type="text" class="form-control" id="broadcasts_info" name="broadcasts_info">
                        </div>

                        <input id="tower_id"  name="tower_id"  value="{{ $tower->id }}" hidden>

                    </div>
                    <button type="submit" class="btn btn-info">This is a new Broadcast</button>
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
<div class="modal fade" id="viewModal_broadcast" role="dialog">
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
            <hr style="height:1px;border:none;color:#333;background-color:#333;" />
            <div class="modal-body">
                <p><b>SSID : </b><h3><span id="view_ssid" class="text-success"></span></h3></p>
            </div>
            <hr style="height:1px;border:none;color:#333;background-color:#333;" />
            <div class="modal-body">
                <p><b>IP : </b><h3><span id="view_ip" class="text-success"></span></h3></p>
            </div>
            <hr style="height:1px;border:none;color:#333;background-color:#333;" />
            <div class="modal-body">
                <p><b>MAC Assress : </b><h3><span id="view_mac" class="text-success"></span></h3></p>
            </div>
            <hr style="height:1px;border:none;color:#333;background-color:#333;" />
            <div class="modal-body">
                <p><b>Channal Width (CW): </b><h3><span id="view_channal_width" class="text-success"></span></h3></p>
            </div>
            <hr style="height:1px;border:none;color:#333;background-color:#333;" />
            <div class="modal-body">
                <p><b>Direction : </b><h3><span id="view_direction" class="text-success"></span></h3></p>
            </div>
            <hr style="height:1px;border:none;color:#333;background-color:#333;" />
            <div class="modal-body">
                <p><b>Broadcasts info : </b><h3><span id="view_broadcasts_info" class="text-success"></span></h3></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Dismiss</button>
            </div>
        </div>
    </div>
</div>
<!-- view modal ends -->

<!-- Edit Modal start -->
<div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit this Broadcast</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('isp-cpanel/tower/tower_broadcast/update') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="edit_device_id"><div class="fa fa-gears"></div> Station Type</label>
                        <select id="edit_device_id" name="device_id" class="form-control" >
                            @foreach ($devicex as $devicex) {
                            <option value="{{ $devicex->id }}" @if ($tower->device_id == $devicex->id) selected="selected" @endif>{{ $devicex->brand_model }}</option>
                            }
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <div class="form-group">
                            <label for="edit_number_Sign">Number Sign (#): </label>
                            <input type="text" class="form-control" id="edit_number_Sign" name="number_sign">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="edit_name">Name : </label>
                            <input type="text" class="form-control" id="edit_name" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="edit_ssid">SSID : </label>
                            <input type="text" class="form-control" id="edit_ssid" name="ssid">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="edit_ip">IP : </label>
                            <input type="text" class="form-control" id="edit_ip" name="ip">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="edit_mac">MAC Assress : </label>
                            <input type="text" class="form-control" id="edit_mac" name="mac" maxlength="17">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="edit_channal_width">Channal Width (CW): </label>
                            <input type="text" class="form-control" id="edit_channal_width" name="channal_width" maxlength="3">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="edit_direction">Direction : </label>
                            <input type="text" class="form-control" id="edit_direction" name="direction">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="edit_broadcasts_info">Broadcasts info : </label>
                            <input type="text" class="form-control" id="edit_broadcasts_info" name="broadcasts_info" >
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
