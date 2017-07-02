@if ($message = Session::get('success_link'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

<button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addModal_tl">Add New
    Source Link
</button>
<br>
<br>

<table id="broadcast" class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>Source Name</th>
        <th>Link Type</th>
        <th>Options</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tower->towerlink as $tower_link)
        <tr>
            <td>{{ $tower_link->source_name }}</td>
            <td>
                @if($tower_link->connection_method == 0) !Unknown
                @elseif($tower_link->connection_method  ==  1) Wireless
                @elseif($tower_link->connection_method  ==  2) LAN
                @elseif($tower_link->connection_method  ==  3) FTTX
                @endif
            </td>
            <td class="text-center">
                <!-- Single button -->
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        Action <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="" data-toggle="modal" data-target="#viewModal_tl"
                               onclick="fun_view_tl('{{$tower_link -> id}}')">View</a></li>
                        <li><a href="" data-toggle="modal" data-target="#editModal_tl"
                               onclick="fun_edit_tl('{{$tower_link -> id}}')">Edit</a></li>
                        <li><a href="" onclick="fun_delete_tl('{{$tower_link -> id}}')">Delete</a></li>
                        <li><a href="" data-toggle="modal" data-target="#addModal_link_ticket">Ticket</a></li>
                    </ul>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th>Source Name</th>
        <th>Link Type</th>
        <th>Options</th>
    </tr>
    </tfoot>
</table>

<input type="hidden" name="hidden_tl" id="hidden_view_tl" value="{{url('isp-cpanel/tower/tower_link/view')}}">
<input type="hidden" name="hidden_delete_tl" id="hidden_delete_tl"
       value="{{url('isp-cpanel/tower/tower_link/delete')}}">

<!-- Add Modal start -->
<div class="modal fade" id="addModal_tl" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Source Link</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('isp-cpanel/tower/tower_link') }}" method="post" onsubmit="document.getElementById('submit_new_link').disabled=true;
document.getElementById('submit_new_link').value='Submitting, please wait...';">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="form-group">
                            <label for="source_name">
                                <div class="fa fa-gears"></div>
                                Source Name :</label>
                            <input type="text" class="form-control" id="source_name" name="source_name" maxlength="10">
                        </div>
                        <div class="form-group">
                            <label>
                                <div class="fa fa-gears"></div>
                                Station Type</label>
                            <select id="connection_method" name="connection_method" class="form-control">
                                @foreach (connection_method_value() as $key => $value) {
                                <option value="{!! $key !!}">{!! $value !!}</option>
                                }
                                @endforeach
                            </select>
                        </div>
                        <input id="tower_id" name="tower_id" value="{{ $tower->id }}" hidden>
                    </div>
                    <button type="submit" id="submit_new_link" class="btn btn-info">New Link</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- add code ends -->

<!-- Add Modal start -->
<div class="modal fade" id="addModal_link_ticket" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><label class="fa fa-ticket"></label> Link Ticket</h4>
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
                        <input id="category" name="category" value="2" hidden>
                        @if ( count($link) > 0 )
                            <input id="category" name="tower_link_id" hidden>
                        @endif
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

<!-- View Modal start -->
<div class="modal fade " id="viewModal_tl" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">About This Link</h4>
            </div>
            <div class="box-body no-padding">

                <table id="show_message_lanx" class="table table-striped">
                    <tbody>
                    <tr>
                    <tr class="danger">
                        <th><label class="glyphicon glyphicon-hand-right" style=" font-size: 22px;"></label></th>
                        <th>There is no any information for this method</th>
                        <th></th>
                    </tr>
                    </tbody>
                </table>
                <table id="wirless_show" class="table table-striped">
                    <tbody>
                    <tr>
                    <tr class="info">
                        <th><label class="glyphicon glyphicon-hand-right" style=" font-size: 22px;"></label></th>
                        <th>Link Information</th>
                        <th></th>
                    </tr>
                    <tr class="Active">
                        <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                   href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                   title="any sign for hint the broadcast"></label></td>
                        <td>Repeater / Source Name :</td>
                        <td><span id="view_repeater_name"></span></td>
                    </tr>
                    <tr class="Active">
                        <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                   href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                   title="any sign for hint the broadcast"></label></td>
                        <td>Wireless Type :</td>
                        <td><span id="view_wireless_type"></span></td>
                    </tr>
                    <tr class="Active">
                        <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                   href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                   title="any sign for hint the broadcast"></label></td>
                        <td>Channal Width (CW) :</td>
                        <td><span id="view_link_channel_width"></span></td>
                    </tr>
                    <tr class="Active">
                        <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                   href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                   title="any sign for hint the broadcast"></label></td>
                        <td>SSID :</td>
                        <td><span id="view_ssid"></span></td>
                    </tr>
                    <tr class="Active">
                        <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                   href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                   title="any sign for hint the broadcast"></label></td>
                        <td>Authentication Method :</td>
                        <td><span id="view_authentication_method"></span></td>
                    </tr>
                    <tr class="Active">
                        <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                   href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                   title="any sign for hint the broadcast"></label></td>
                        <td>Authentication Key :</td>
                        <td><span id="view_authentication"></span></td>
                    </tr>
                    <tr class="info">
                        <th><label class="glyphicon glyphicon-hand-right" style=" font-size: 22px;"></label></th>
                        <th>Slave Information</th>
                        <th></th>
                    </tr>
                    <tr class="Active">
                        <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                   href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                   title="any sign for hint the broadcast"></label></td>
                        <td>Slave IP :</td>
                        <td><span id="view_slave_ip"></span></td>
                    </tr>
                    <tr class="Active">
                        <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                   href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                   title="any sign for hint the broadcast"></label></td>
                        <td>Slave MAC :</td>
                        <td><span id="view_slave_mac"></span></td>
                    </tr>
                    <tr class="Active">
                        <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                   href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                   title="any sign for hint the broadcast"></label></td>
                        <td>Slave Antenna :</td>
                        <td><span id="view_slave_antenna"></span></td>
                    </tr>
                    <tr class="Active">
                        <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                   href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                   title="any sign for hint the broadcast"></label></td>
                        <td>Slave Brand :</td>
                        <td><span id="view_slave_brand"></span></td>
                    </tr>
                    <tr class="Active">
                        <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                   href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                   title="any sign for hint the broadcast"></label></td>
                        <td>Slave Username :</td>
                        <td><span id="view_slave_username"></span></td>
                    </tr>
                    <tr class="Active">
                        <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                   href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                   title="any sign for hint the broadcast"></label></td>
                        <td>Slave Password :</td>
                        <td><span id="view_slave_password"></span></td>
                    </tr>
                    <tr class="info">
                        <th><label class="glyphicon glyphicon-hand-right" style=" font-size: 22px;"></label></th>
                        <th>Master Information</th>
                        <th></th>
                    </tr>
                    <tr class="Active">
                        <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                   href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                   title="any sign for hint the broadcast"></label></td>
                        <td>Master IP :</td>
                        <td><span id="view_master_ip"></span></td>
                    </tr>
                    <tr class="Active">
                        <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                   href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                   title="any sign for hint the broadcast"></label></td>
                        <td>Master MAC :</td>
                        <td><span id="view_master_mac"></span></td>
                    </tr>
                    <tr class="Active">
                        <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                   href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                   title="any sign for hint the broadcast"></label></td>
                        <td>Master Antenna :</td>
                        <td><span id="view_master_antenna"></span></td>
                    </tr>
                    <tr class="Active">
                        <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                   href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                   title="any sign for hint the broadcast"></label></td>
                        <td>Master Brand :</td>
                        <td><span id="view_master_brand"></span></td>
                    </tr>
                    <tr class="Active">
                        <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                   href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                   title="any sign for hint the broadcast"></label></td>
                        <td>Master Username :</td>
                        <td><span id="view_master_username"></span></td>
                    </tr>
                    <tr class="Active">
                        <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                   href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                   title="any sign for hint the broadcast"></label></td>
                        <td>Master Password :</td>
                        <td><span id="view_master_password"></span></td>
                    </tr>
                    </tbody>
                </table>
                <table id="fiber_show" class="table table-striped">
                    <tbody>
                    <tr>
                    <tr class="info">
                        <th><label class="glyphicon glyphicon-hand-right" style=" font-size: 22px;"></label></th>
                        <th>Fiber Optic Link Information</th>
                        <th></th>
                    </tr>
                    <tr class="Active">
                        <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                   href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                   title="any sign for hint the broadcast"></label></td>
                        <td>Fiber Type :</td>
                        <td><span id="view_fiber_type"></span></td>
                    </tr>
                    <tr class="Active">
                        <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                   href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                   title="any sign for hint the broadcast"></label></td>
                        <td>Fiber Core :</td>
                        <td><span id="view_fiber_core"></span></td>
                    </tr>
                    <tr class="Active">
                        <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                   href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                   title="any sign for hint the broadcast"></label></td>
                        <td>Fiber SFP Type :</td>
                        <td><span id="view_fiber_sfp_type"></span></td>
                    </tr>
                    <tr class="Active">
                        <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                   href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                   title="any sign for hint the broadcast"></label></td>
                        <td>Fiber Distance :</td>
                        <td><span id="view_fiber_distance"></span></td>
                    </tr>
                    <tr class="Active">
                        <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                   href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                   title="any sign for hint the broadcast"></label></td>
                        <td>Fiber Master Port Number :</td>
                        <td><span id="view_fiber_master_port_number"></span></td>
                    </tr>
                    <tr class="Active">
                        <td><label class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;"
                                   href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left"
                                   title="any sign for hint the broadcast"></label></td>
                        <td>Fiber Clint Port Number :</td>
                        <td><span id="view_fiber_clint_port_number"></span></td>
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

<!-- Edit Modal start -->
<div class="modal fade" id="editModal_tl" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit this Link</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('isp-cpanel/tower/tower_link/update') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" id="edit_id_tl" name="edit_id">
                    <div id="show_message_lan"><p> There is no settings for this connection</p></div>
                    <div id="wirless_edit">
                        <div class="box box-warning box-solid">
                            <div class="box-header with-border">
                                <div class="form-group">
                                    <label for="edit_repeater_name">Repeater Name: </label>
                                    <input type="text" class="form-control" id="edit_repeater_name"
                                           name="repeater_name" maxlength="50">
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label for="edit_channal_width">
                                            <div class="fa fa-gears"></div>
                                            Wireless Type :</label>
                                        {!! Form::select("wireless_type", wireless_type(), null ,['class'=>'form-control','id'=>'edit_wireless_type','name'=>'wireless_type']) !!}
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label for="edit_channal_width">
                                            <div class="fa fa-gears"></div>
                                            Channel Width (CW):</label>
                                        {!! Form::select("channel_width", channel_width(), null ,['class'=>'form-control','id'=>'edit_tlcw','name'=>'channel_width']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="edit_link_ssid">SSID : </label>
                                    <input type="text" class="form-control" id="edit_link_ssid" name="ssid">
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label for="edit_channal_width">
                                            <div class="fa fa-gears"></div>
                                            Authentication Type :</label>
                                        {!! Form::select("channal_width", authentication_method(), null ,['class'=>'form-control','id'=>'edit_authentication_method','name'=>'authentication_method']) !!}
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label for="edit_authentication">Authentication Key : </label>
                                        <input type="text" class="form-control" id="edit_authentication"
                                               name="authentication">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr style="height:5px;border:none;color:#cc4400;background-color:#cc4400;"/>
                        <div class="box box-warning box-solid">
                            <div class="box-header with-border">
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label for="edit_slave_ip">Slave IP : </label>
                                        <input type="tel" class="form-control" id="edit_slave_ip" name="slave_ip">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label for="edit_slave_mac">Slave MAC : </label>
                                        <input type="text" class="form-control" id="edit_slave_mac" name="slave_mac">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="edit_slave_antenna">Slave Antenna : </label>
                                    <input type="text" class="form-control" id="edit_slave_antenna"
                                           name="slave_antenna">
                                </div>
                                <div class="form-group">
                                    <label for="edit_slave_brand">Slave Brand : </label>
                                    <input type="text" class="form-control" id="edit_slave_brand" name="slave_brand">
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label for="edit_slave_username">Slave Username : </label>
                                        <input type="text" class="form-control" id="edit_slave_username"
                                               name="slave_username">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label for="edit_slave_password">Slave Password : </label>
                                        <input type="text" class="form-control" id="edit_slave_password"
                                               name="slave_password">
                                    </div>
                                </div>
                                <hr style="height:5px;border:none;color:#333;background-color:#333;"/>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label for="edit_master_ip">Master IP : </label>
                                        <input type="tel" class="form-control" id="edit_master_ip" name="master_ip">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label for="edit_master_mac">Master MAC : </label>
                                        <input type="text" class="form-control" id="edit_master_mac" name="master_mac">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="edit_master_antenna">Master Antenna : </label>
                                    <input type="text" class="form-control" id="edit_master_antenna"
                                           name="master_antenna">
                                </div>
                                <div class="form-group">
                                    <label for="edit_master_brand">Master Brand : </label>
                                    <input type="text" class="form-control" id="edit_master_brand" name="master_brand">
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label for="edit_master_username">Master Username : </label>
                                        <input type="text" class="form-control" id="edit_master_username"
                                               name="master_username">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label for="edit_master_password">Master Password : </label>
                                        <input type="text" class="form-control" id="edit_master_password"
                                               name="master_password">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="fiber_edit">
                        <div class="box box-warning box-solid">
                            <div class="box-header with-border">
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label for="edit_channal_width">
                                            <div class="fa fa-gears"></div>
                                            Fiber Type :</label>
                                        {!! Form::select("fiber_type", fiber_type(), null ,['class'=>'form-control','id'=>'edit_fiber_type','name'=>'fiber_type']) !!}
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label for="edit_channal_width">
                                            <div class="fa fa-gears"></div>
                                            Fiber core Count:</label>
                                        {!! Form::select("fiber_core", fiber_core_count(), null ,['class'=>'form-control','id'=>'edit_fiber_core','name'=>'fiber_core']) !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label for="edit_channal_width">
                                            <div class="fa fa-gears"></div>
                                            Adaptor Type :</label>
                                        {!! Form::select("fiber_sfp_type", adaptor_type(), null ,['class'=>'form-control','id'=>'edit_fiber_sfp_type','name'=>'fiber_sfp_type']) !!}
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label for="edit_fiber_distance">Fiber Distance (m) : </label>
                                        <input type="tel" class="form-control" id="edit_fiber_distance"
                                               name="fiber_distance">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label for="edit_fiber_master_port_number">Fiber Master Port Number : </label>
                                        <input type="tel" class="form-control" id="edit_fiber_master_port_number"
                                               name="fiber_master_port_number">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label for="edit_fiber_clint_port_number">Fiber Clint Port Number : </label>
                                        <input type="tel" class="form-control" id="edit_fiber_clint_port_number"
                                               name="fiber_clint_port_number">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default">Update</button>
                </form>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>