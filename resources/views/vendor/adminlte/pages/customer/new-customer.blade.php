@extends('adminlte::layouts.app')


@section('htmlheader_title')
@endsection


@section('contentheader_title')
    New Customer
@endsection


@section('contentheader_description')
@endsection


@section('page-name')
    Add New Customer
@endsection


@section('main-content')
    @include('adminlte::layouts.partials.pageheader')

    <form action="{{ url('isp-cpanel/customers') }}" method="post" onsubmit="document.getElementById('submit_add_customer').disabled=true;
document.getElementById('submit_add_customer').value='Submitting, please wait...';">
        {{ csrf_field() }}
        <div>
            <div class="box-body">
                <label>
                    <div class="fa fa-info-circle"></div>
                    Customer information</label>
                <br>
                <br>
                <div class="col-lg-3 form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
                    <label>
                        <div for="fullname" class="fa fa-user control-label"></div>
                        Full Name <i style="color: red">*</i></label>
                    <input id="fullname" type="text" class="form-control" name="fullname" value="{{ old('fullname') }}"
                           placeholder="Enter Full Name">
                    @if ($errors->has('fullname'))
                        <span class="help-block">
                                            <strong>{{ $errors->first('fullname') }}</strong>
                                        </span>
                    @endif
                </div>

                <div class="col-lg-3 form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label>
                        <div for="username" class="fa fa-user-plus control-label"></div>
                        PPPOE User <i style="color: red">*</i></label>
                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}"
                           placeholder="PPPOE user (host name)">
                    @if ($errors->has('username'))
                        <span class="help-block">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                    @endif
                </div>

                <div class="col-lg-2 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label>
                        <div for="password" class="fa fa-unlock control-label"></div>
                        Password</label>
                    <input id="password" type="text" class="form-control" name="password" value="{{ old('password') }}"
                           placeholder="(0000) IF NULL">
                    @if ($errors->has('password'))
                        <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                    @endif
                </div>

                <div class="col-lg-2 form-group{{ $errors->has('mobile_1') ? ' has-error' : '' }}">
                    <label>
                        <div for="mobile_1" class="fa fa-phone control-label"></div>
                        Mobile <i style="color: red">*</i></label>
                    <input id="mobile_1" type="tel" class="form-control" name="mobile_1" value="{{ old('mobile_1') }}"
                           placeholder="Mobile" maxlength="11">
                    @if ($errors->has('mobile_1'))
                        <span class="help-block">
                                                    <strong>{{ $errors->first('mobile_1') }}</strong>
                                                </span>
                    @endif
                </div>

                <div class="col-lg-2 form-group{{ $errors->has('mobile_2') ? ' has-error' : '' }}">
                    <label>
                        <div for="mobile_2" class="fa fa-phone control-label"></div>
                        Other Mobile</label>
                    <input id="mobile_2" type="tel" class="form-control" name="mobile_2" value="{{ old('mobile_2') }}"
                           placeholder="other namber" maxlength="11">
                    @if ($errors->has('mobile_2'))
                        <span class="help-block">
                                                        <strong>{{ $errors->first('mobile_2') }}</strong>
                                                    </span>
                    @endif
                </div>
            </div>
            <!-- /.col-lg-6 (nested) -->

            <!-- /.row (nested) -->

            <hr>
            <div class="panel-body">
                <label>
                    <div class="fa fa-edit"></div>
                    Address</label>
                <br>
                <br>
                <div class="row">

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>
                                <div class="fa fa-home"></div>
                                Address</label>
                            <select name="address_1" class="form-control">
                                @foreach ($address as $address) {
                                <option value="{{ $address->id }}"
                                        @if(old('address_1') == $address->id) selected="selected" @endif>{{ $address->place_1 }}</option>
                                }
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3 form-group{{ $errors->has('address_2') ? ' has-error' : '' }}">
                        <label>
                            <div for="address_2" class="glyphicon glyphicon-map-marker control-label"></div>
                            About the address <i style="color: red">*</i></label>
                        <input id="address_2" type="text" class="form-control" name="address_2"
                               value="{{ old('address_2') }}" placeholder="about the address">
                        @if ($errors->has('address_2'))
                            <span class="help-block">
                                                <strong>{{ $errors->first('address_2') }}</strong>
                                            </span>
                        @endif
                    </div>

                    <div class="col-lg-6 form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                        <label>
                            <div for="about" class="fa fa-home control-label"></div>
                            More Information</label>
                        <input id="about" type="text" class="form-control" name="about" value="{{ old('about') }}"
                               placeholder="information here">
                        @if ($errors->has('about'))
                            <span class="help-block">
                       <strong>{{ $errors->first('about') }}</strong>
                    </span>
                        @endif
                    </div>

                </div>
            </div>
            <hr>
            <div class="panel-body">
                <label>
                    <div class="fa fa-gears"></div>
                    Station Type & Connection Type</label>
                <br>
                <br>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>
                            <div class="fa fa-gears"></div>
                            Station Type</label>
                        <select name="device_id" class="form-control" value="{{ old('device_id') }}">
                            @foreach ($device as $device)
                                <option value="{{ $device->id }}"
                                        @if(old('device_id') == $device->id) selected="selected" @endif>{{ $device->brand_model }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-3 form-group{{ $errors->has('mac') ? ' has-error' : '' }}">
                    <label>
                        <div for="mac" class="fa fa-barcode control-label"></div>
                        MAC Address</label>
                    <input id="mac" type="text" class="form-control" name="mac" value="{{ old('mac') }}"
                           placeholder="Fiscal Address">
                    @if ($errors->has('mac'))
                        <span class="help-block">
                                                <strong>{{ $errors->first('mac') }}</strong>
                                            </span>
                    @endif
                </div>

                <div class="col-lg-3 form-group{{ $errors->has('ip') ? ' has-error' : '' }}">
                    <label>
                        <div for="ip" class="fa fa-sitemap control-label"></div>
                        IP Address</label>
                    <input id="ip" type="text" class="form-control" name="ip" value="{{ old('ip') }}"
                           placeholder="IP Address">
                    @if ($errors->has('ip'))
                        <span class="help-block">
                                                <strong>{{ $errors->first('ip') }}</strong>
                                            </span>
                    @endif
                </div>

                <div class="col-lg-3">
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
                </div>

            </div>


            <div id="wireless">
                <hr>

                <div class="panel-body">
                    <label>
                        <div class="fa fa-gears"></div>
                        Wirless AP Information</label>
                    <br>
                    <br>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>
                                <div class="fa fa-map-signs"></div>
                                point / Tower</label>
                            <select name="tower_id" class="form-control">
                                @foreach ($towers as $tower) {
                                <option value="{{ $tower->id }}"
                                        @if(old('tower_id') == $tower->id) selected="selected" @endif>{{ $tower->name }}</option>
                                }
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>
                                <div class="fa fa-wifi"></div>
                                Access Point SSID</label>
                            <select name="broadcast_id" class="form-control">
                                @foreach ($broadcast as $broadcast)
                                    <option value="{{ $broadcast->id }}"
                                            @if(old('broadcast_id') == $broadcast->id) selected="selected" @endif>{{ $broadcast->ssid }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>
                                <div class="fa fa-barcode"></div>
                                Access Point AP MAC</label>
                            <select name="apmac_id" class="form-control">
                                @foreach ($apmac as $apmac)
                                    <option value="{{ $apmac->id }}"
                                            @if(old('apmac_id') == $apmac->id) selected="selected" @endif>{{ $apmac->mac  }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>
                                <div class="fa fa-gears"></div>
                                Wireless Method</label>
                            <select name="connection_type_id" class="form-control"
                                    value="{{ old('connection_type_id') }}">
                                @foreach ($connection_types as $connection_types)
                                    <option value="{{ $connection_types->id }}"
                                            @if(old('connection_type_id') == $connection_types->id) selected="selected" @endif >{{ $connection_types->type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
            </div>

            <div id="fiber">
                <hr>
                <div class="panel-body">
                    <label>
                        <div class="fa fa-gears"></div>
                        Provided by Fiber Optic</label>
                    <br>
                    <br>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>
                                <div class="glyphicon glyphicon-resize-small"></div>
                                OLT No. & Location</label>
                            <select name="olt_id" class="form-control">
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>
                                <div class="glyphicon glyphicon-resize-full"></div>
                                First Splitter No. & Location</label>
                            <select name="splitter_id" class="form-control">
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div id="lan">
                <hr>
                <div class="panel-body">
                    <label>
                        <div class="fa fa-gears"></div>
                        Provided by LAN</label>
                    <br>
                    <br>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>
                                <div class="glyphicon glyphicon-random"></div>
                                Hub Switch</label>
                            <select name="hub_id" class="form-control">

                            </select>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label>
                                <div class="glyphicon glyphicon-inbox"></div>
                                Port Number</label>
                            <select name="switch_port" class="form-control">

                            </select>
                        </div>
                    </div>

                </div>
            </div>
            <hr>
            <div class="panel-body">
                <div class="form-group">
                    <input type="submit" id="submit_add_customer" class="btn btn-primary" value="save" name="save">
                </div>
            </div>

        </div>
    </form>

    @include('adminlte::layouts.partials.pagefooter')
@endsection


@section('page-scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#wireless").hide();
            $("#fiber").hide();
            $("#lan").hide();
            $('#connection_method').on('change', function () {
                if (this.value === '1') {
                    $("#wireless").show();
                    $("#fiber").hide();
                    $("#lan").hide();
                }
                else if (this.value === '3') {
                    $("#fiber").show();
                    $("#wireless").hide();
                    $("#lan").hide();
                }
                else if (this.value === '2') {
                    $("#fiber").hide();
                    $("#wireless").hide();
                    $("#lan").show();
                }
                else if (this.value === '0') {
                    $("#fiber").hide();
                    $("#wireless").hide();
                    $("#lan").hide();
                }
            });
        });

        $(function(){
            // HTML Text Input allow only Numeric input
            $('[type=tel]').on('change', function(e) {
                $(e.target).val($(e.target).val().replace(/[^\d\.]/g, ''))
            })
            $('[type=tel]').on('keypress', function(e) {
                keys = ['0','1','2','3','4','5','6','7','8','9','.']
                return keys.indexOf(event.key) > -1
            });
        })

    </script>

@endsection
