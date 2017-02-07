@if ($message = Session::get('message_link'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif
@include('adminlte::layouts.partials.notifications')

        <button type="button" class="btn btn-info btn-sm pull-right margin-l-5 " data-toggle="modal" data-target="#addModal_link_info">Add Link Information</button>
        <button type="button" class="btn btn-info btn-sm pull-right margin-r-5" data-toggle="modal" data-target="#addModal_link_new">Add New Link</button>

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
        @foreach($tower->towerlink as $tower_link)
            <tr>
                <td>{{ $tower_link->slave_ip }}</td>
                <td>@if ($tower_link->connectiontype  ==  null) unknown !   @else {{ $tower_link->connectiontype->method }} @endif  </td>
                <td class="text-center">
                    <!-- Single button -->
                    <div class="btn-group" >
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="" data-toggle="modal" data-target="#viewModal_link" onclick="fun_view_link('{{$tower_link -> id}}')">View</a></li>
                            <li><a href="" data-toggle="modal" data-target="#editModal_link" onclick="fun_edit_link('{{$tower_link -> id}}')">Edit</a></li>
                            <li><a href="" data-toggle="modal" data-target="#editModal_method" onclick="fun_edit_method('{{$tower_link -> id}}')">Change method</a></li>
                            <li><a href="" onclick="fun_delete_link('{{$tower_link -> id}}')">Delete</a></li>
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
<div class="modal fade" id="addModal_link_new" role="dialog">
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
                            <select name="connection_type_id" class="form-control">
                                @foreach ($connection as $connection)
                                    <option value="{!! $connection->id !!}" >{!! $connection->method !!}</option>
                                @endforeach
                            </select>
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

<!-- Add Modal start -->
<div class="modal fade" id="addModal_link_info" role="dialog">
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
                            <label for="edit_repeater_id">repeater_id: </label>
                            <input type="text" class="form-control" id="edit_repeater_id" name="repeater_id">
                        </div>
                        <div class="form-group">
                            <label for="edit_channal_width">channal_width : </label>
                            <input type="text" class="form-control" id="edit_channal_width" name="channal_width">
                        </div>
                        <div class="form-group">
                            <label for="edit_ssid">ssid : </label>
                            <input type="text" class="form-control" id="edit_ssid" name="ssid">
                        </div>
                        <div class="form-group">
                            <label for="edit_authentication">authentication : </label>
                            <input type="text" class="form-control" id="edit_authentication" name="authentication">
                        </div>
                        <hr style="height:1px;border:none;color:#333;background-color:#333;" />
                        <div class="form-group">
                            <label for="edit_slave_ip">slave_ip : </label>
                            <input type="text" class="form-control" id="edit_slave_ip" name="slave_ip">
                        </div>
                        <div class="form-group">
                            <label for="edit_slave_antenna">slave_antenna : </label>
                            <input type="text" class="form-control" id="edit_slave_antenna" name="slave_antenna">
                        </div>
                        <div class="form-group">
                            <label for="edit_slave_brand">slave_brand : </label>
                            <input type="text" class="form-control" id="edit_slave_brand" name="slave_brand">
                        </div>
                        <div class="form-group">
                            <label for="edit_slave_username">slave_username : </label>
                            <input type="text" class="form-control" id="edit_slave_username" name="slave_username">
                        </div>
                        <div class="form-group">
                            <label for="edit_slave_password">slave_password : </label>
                            <input type="text" class="form-control" id="edit_slave_password" name="slave_password">
                        </div>
                        <hr style="height:1px;border:none;color:#333;background-color:#333;" />
                        <div class="form-group">
                            <label for="edit_master_ip">master_ip : </label>
                            <input type="text" class="form-control" id="edit_master_ip" name="master_ip">
                        </div>
                        <div class="form-group">
                            <label for="edit_master_antenna">master_antenna : </label>
                            <input type="text" class="form-control" id="edit_master_antenna" name="master_antenna">
                        </div>
                        <div class="form-group">
                            <label for="edit_master_brand">master_brand: </label>
                            <input type="text" class="form-control" id="edit_master_brand" name="master_brand">
                        </div>
                        <div class="form-group">
                            <label for="edit_master_username">master_username: </label>
                            <input type="text" class="form-control" id="edit_master_username" name="master_username">
                        </div>
                        <div class="form-group">
                            <label for="edit_master_password">master_password: </label>
                            <input type="text" class="form-control" id="edit_master_password" name="master_password">
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
                <h4 class="modal-title">about this Link </h4>
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
                    @foreach($tower->towerlink as $tower_link)

                    @if($tower_link->connectiontype->method == 'Wireless')

                    <div class="box box-warning box-solid">
                        <div class="box-header with-border">
                        <div class="form-group">
                            <label for="edit_repeater_id">Repeater Name: </label>
                            <input type="text" class="form-control" id="edit_repeater_id" name="repeater_id">
                        </div>



                            <div class="form-group">
                                <label for="edit_channal_width"> <div class="fa fa-gears"></div> Channal Width (CW):</label>
                                <select class="form-control" id="edit_channal_width" name="channal_width">
                                    @foreach($tower->towerlink as $tower_link)
                                    <option value="5"     @if($tower_link->channal_width == 5 )     selected="selected" @endif>5</option>
                                    <option value="10"    @if($tower_link->channal_width == 10 )    selected="selected" @endif>10</option>
                                    <option value="20"    @if($tower_link->channal_width == 20 )    selected="selected" @endif>20</option>
                                    <option value="30"    @if($tower_link->channal_width == 30 )    selected="selected" @endif>30</option>
                                    <option value="40"    @if($tower_link->channal_width == 40 )    selected="selected" @endif>40</option>
                                    <option value="20/40" @if($tower_link->channal_width == 20/40 ) selected="selected" @endif>20/40</option>
                                    @endforeach
                                </select>
                            </div>

                        <div class="form-group">
                            <label for="edit_ssid">ssid : </label>
                            <input type="text" class="form-control" id="edit_ssid" name="ssid">
                        </div>
                                <div class="form-group">
                                    <label for="edit_authentication_method"> <div class="fa fa-gears"></div> authentication Type :</label>
                                    <select class="form-control" id="edit_authentication_method" name="authentication_method">
                                        @foreach($tower->towerlink as $tower_link)
                                            <option value="EAP"     @if($tower_link->authentication_method == 'EAP' )     selected="selected" @endif>EAP</option>
                                            <option value="WPA"    @if($tower_link->authentication_method == 'WPA' )    selected="selected" @endif>WPA</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="edit_authentication" >authentication Key : </label>
                                    <input type="text" class="form-control" id="edit_authentication" name="authentication">
                                </div>
                    </div>
                    </div>
                    <hr style="height:5px;border:none;color:#cc4400;background-color:#cc4400;" />
                    <div class="box box-warning box-solid">
                    <div class="box-header with-border">
                        <div class="form-group">
                            <label for="edit_slave_ip">slave_ip : </label>
                            <input type="text" class="form-control" id="edit_slave_ip" name="slave_ip">
                        </div>
                        <div class="form-group">
                            <label for="edit_slave_mac">slave_mac : </label>
                            <input type="text" class="form-control" id="edit_slave_mac" name="slave_mac">
                        </div>
                        <div class="form-group">
                            <label for="edit_slave_antenna">slave_antenna : </label>
                            <input type="text" class="form-control" id="edit_slave_antenna" name="slave_antenna">
                        </div>
                        <div class="form-group">
                            <label for="edit_slave_brand">slave_brand : </label>
                            <input type="text" class="form-control" id="edit_slave_brand" name="slave_brand">
                        </div>
                        <div class="form-group">
                            <label for="edit_slave_username">slave_username : </label>
                            <input type="text" class="form-control" id="edit_slave_username" name="slave_username">
                        </div>
                        <div class="form-group">
                            <label for="edit_slave_password">slave_password : </label>
                            <input type="text" class="form-control" id="edit_slave_password" name="slave_password">
                        </div>
                        <hr style="height:5px;border:none;color:#333;background-color:#333;" />
                        <div class="form-group">
                            <label for="edit_master_ip">master_ip : </label>
                            <input type="text" class="form-control" id="edit_master_ip" name="master_ip">
                        </div>
                        <div class="form-group">
                            <label for="edit_master_mac">master_mac : </label>
                            <input type="text" class="form-control" id="edit_master_mac" name="master_mac">
                        </div>
                        <div class="form-group">
                            <label for="edit_master_antenna">master_antenna : </label>
                            <input type="text" class="form-control" id="edit_master_antenna" name="master_antenna">
                        </div>
                        <div class="form-group">
                            <label for="edit_master_brand">master_brand: </label>
                            <input type="text" class="form-control" id="edit_master_brand" name="master_brand">
                        </div>
                        <div class="form-group">
                            <label for="edit_master_username">master_username: </label>
                            <input type="text" class="form-control" id="edit_master_username" name="master_username">
                        </div>
                        <div class="form-group">
                            <label for="edit_master_password">master_password: </label>
                            <input type="text" class="form-control" id="edit_master_password" name="master_password">
                        </div>
                    </div>
                    </div>
                    @endif
                    @endforeach
                    <button type="submit" class="btn btn-default">Update</button>
                    <input type="hidden" id="edit_id" name="edit_id">
                </form>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    <!-- Edit Modal start -->
    <div class="modal fade" id="editModal_method" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit this Broadcast</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ url('isp-cpanel/tower/tower_link_method/update') }}" method="post">
                        {{ csrf_field() }}

                        @foreach($tower->towerlink as $tower_link)
                            <div class="form-group">
                                <label for="edit_connection_type_id"><div class="fa fa-gears"></div> Connection Type :</label>
                                @if ( count($connectionx) < 1 ) <br> <p style="color: red">you didn't add connection Type go to settings -> BASIC INPUT -> connection type </p>  @else
                                    <select id="edit_connection_type_id" name="connection_type_id" class="form-control" >
                                        @foreach ($connectionx as $connectionx) {
                                        <option value="{{ $connectionx->id }}" @if ($tower_link->connection_type_id == $connectionx->id) selected="selected"  @endif>
                                            {{ $connectionx->method }}</option>
                                        }
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        @endforeach

                        <button type="submit" class="btn btn-default">Update</button>
                        <input type="hidden" id="edit_id" name="edit_id">
                    </form>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
