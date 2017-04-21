@if ($message = Session::get('message_broadcast'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

<button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addModal">Add New BroadCast</button>
<br>
<br>

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
                <td> @if ($x->device  ==  null) unknown !   @else {{$x->device->brand_model}} @endif </td>
                <td class="text-center">
                    <!-- Single button -->
                    <div class="btn-group" >
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="" data-toggle="modal" data-target="#viewModal_broadcast" onclick="fun_view_broadcast('{{$x -> id}}')">View</a></li>
                            <li><a href="" data-toggle="modal" data-target="#editModal_broadcast" onclick="fun_edit_broadcast('{{$x -> id}}')">Edit</a></li>
                            <li><a href="">Config</a></li>
                            <li><a href="" onclick="fun_delete_broadcast('{{$x -> id}}')">Delete</a></li>
                            <li><a href="" data-toggle="modal" data-target="#addModal_broadcast_ticket">Ticket</a></li>
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

<br>
                    <div class="form-group">
                        <div class="form-group">
                            <label><div class="fa fa-gears"></div> Brand : </label>
                            @if ( count($device) < 1 ) <br> <p style="color: red">you didn't add devices go to settings -> BASIC INPUT -> devices </p>  @else
                            <select name="device_id" class="form-control" value="{{ old('device_id') }}">
                                @foreach ($device as $device)
                                    <option value="{!! $device->id !!}" >{!! $device->brand_model !!}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="number_Sign" class="fa fa-gears"> Label or Sign (#):</label>
                            <input type="text" class="form-control" id="number_Sign" name="number_sign">
                        </div>

                        <div class="form-group">
                            <label for="name" class="fa fa-gears"> Name:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>

                        <div class="form-group">
                            <label for="ssid" class="fa fa-gears"> SSID:</label>
                            <input type="text" class="form-control" id="ssid" name="ssid">
                        </div>

                        <div class="form-group">
                            <label for="ip" class="fa fa-gears"> IP:</label>
                            <input type="text" class="form-control" id="ip" name="ip">
                        </div>

                        <div class="form-group">
                            <label for="mac" class="fa fa-gears"> MAC Assress:</label>
                            <input type="text" class="form-control" id="mac" name="mac" maxlength="17">
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label class="fa fa-gears">Edit Antenna : </label>
                                <input type="text" class="form-control"  name="antenna" maxlength="17">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label class="fa fa-gears">Edit Degree : </label>
                                <input type="text" class="form-control"  name="degree" maxlength="17">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label class="fa fa-gears">Edit Gin : </label>
                                <input type="text" class="form-control"  name="gin" maxlength="17">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label class="fa fa-gears">Edit Channal : </label>
                                <input type="text" class="form-control"  name="channal" maxlength="17">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="channal_width" class="fa fa-gears"> Channal Width (CW):</label>
                                {!! Form::select("channel_width", channel_width(), null ,['class'=>'form-control','name'=>'channal_width']) !!}
                        </div>

                        <div class="form-group">
                            <label for="direction" class="fa fa-gears"> Direction:</label>
                            <input type="text" class="form-control" id="direction" name="direction">
                        </div>

                        <div class="form-group" >
                            <label for="broadcasts_info" class="fa fa-gears"> Broadcasts info:</label>
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
<div class="modal fade " id="viewModal_broadcast" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">About This Broadcast</h4>
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

<!-- Edit Modal start -->
<div class="modal fade" id="editModal_broadcast" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit this Link</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('isp-cpanel/tower/tower_broadcast/update') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="edit_device_id"><div class="fa fa-gears"></div> Station Type</label>
                        @if ( count($device) < 1 ) <br> <p style="color: red">you didn't add devices go to settings -> BASIC INPUT -> devices </p>  @else
                            <select id="edit_device_id" name="device_id" class="form-control" >
                                @foreach ($devicex as $devicex)
           <option value="{{ $devicex->id }}" @if ($tower->device_id == $devicex->id) selected="selected" @endif>{{ $devicex->brand_model }}</option>
                                @endforeach
                            </select>
                        @endif
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
                            <label for="edit_antenna">Edit Antenna : </label>
                            <input type="text" class="form-control" id="edit_antenna" name="antenna" maxlength="17">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="edit_degree">Edit Degree : </label>
                            <input type="text" class="form-control" id="edit_degree" name="degree" maxlength="17">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="edit_gin">Edit Gin : </label>
                            <input type="text" class="form-control" id="edit_gin" name="gin" maxlength="17">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="edit_channal">Edit Channal : </label>
                            <input type="text" class="form-control" id="edit_channal" name="channal" maxlength="17">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit_channal_width" class="fa fa-gears"> Channal Width (CW):</label>
                        {!! Form::select("channel_width", channel_width(), null ,['class'=>'form-control','id'=>'edit_channal_width','name'=>'channal_width']) !!}
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

<!-- Add Modal start -->
<div class="modal fade" id="addModal_broadcast_ticket" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" > <label class="fa fa-ticket"></label>Broadcast ticket</h4>
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
                        <input id="category"  name="category"  value="2" hidden>
                        @if ( count($broadcast) > 0 )
                            <input id="category"  name="broadcast_id"  value="{{ $x->id  }}" hidden>
                        @endif
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
