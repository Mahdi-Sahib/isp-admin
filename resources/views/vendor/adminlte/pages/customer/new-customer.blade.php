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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#wireless").hide();
            $("#fiber").hide();
            $("#lan").hide();
            $('#type').on('change', function() {
                if ( this.value == 'Wireless')
                {
                    $("#wireless").show();
                    $("#fiber").hide();
                    $("#lan").hide();
                }
                else if ( this.value == 'Fiber Optic')
                {
                    $("#fiber").show();
                    $("#wireless").hide();
                    $("#lan").hide();
                }
                else if ( this.value == 'LAN')
                {
                    $("#fiber").hide();
                    $("#wireless").hide();
                    $("#lan").show();
                }
            });
        });
    </script>
    <form action="{{ url('isp-cpanel/customers') }}" method="post">
        {{ csrf_field() }}
    <div>
    <div class="box-body">
        <label><div class="fa fa-info-circle"></div>  Customer information</label>
        <br>
        <br>
        <div  class="col-lg-3 form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
            <label><div for="fullname" class="fa fa-user control-label" ></div> Full Name</label>
            <input id="fullname" type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" placeholder="Enter Full Name" >
            @if ($errors->has('fullname'))
                <span  class="help-block">
                                            <strong>{{ $errors->first('fullname') }}</strong>
                                        </span>
            @endif
        </div>

        <div  class="col-lg-3 form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <label><div for="username" class="fa fa-user-plus control-label" ></div> PPPOE User</label>
            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="PPPOE user (host name)">
            @if ($errors->has('username'))
                <span class="help-block">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
            @endif
        </div>

        <div  class="col-lg-2 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label><div for="password" class="fa fa-unlock control-label" ></div> Password</label>
            <input id="password" type="text" class="form-control" name="password" value="{{ old('password') }}" placeholder="(0000) IF NULL">
            @if ($errors->has('password'))
                <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
            @endif
        </div>

        <div  class="col-lg-2 form-group{{ $errors->has('mobile_1') ? ' has-error' : '' }}">
            <label><div for="mobile_1" class="fa fa-phone control-label" ></div> Mobile</label>
            <input id="mobile_1" type="text" class="form-control" name="mobile_1" value="{{ old('mobile_1') }}" placeholder="Mobile" maxlength="11">
            @if ($errors->has('mobile_1'))
                <span class="help-block">
                                                    <strong>{{ $errors->first('mobile_1') }}</strong>
                                                </span>
            @endif
        </div>

        <div  class="col-lg-2 form-group{{ $errors->has('mobile_2') ? ' has-error' : '' }}">
            <label><div for="mobile_2" class="fa fa-phone control-label" ></div> Other Mobile</label>
            <input id="mobile_2" type="text" class="form-control" name="mobile_2" value="{{ old('mobile_2') }}" placeholder="other namber" maxlength="11">
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
        <label><div class="fa fa-edit"></div> Address</label>
        <br>
        <br>
        <div class="row">

            <div class="col-lg-3">
                <div class="form-group">
                    <label><div class="fa fa-home"></div> Address</label>
                    <select name="address_1" class="form-control" >
                        @foreach ($address as $address) {
                        <option value="{{ $address->id }}" >{{ $address->place_1 }}</option>
                        }
                        @endforeach
                    </select>
                </div>
            </div>

            <div  class="col-lg-3 form-group{{ $errors->has('address_2') ? ' has-error' : '' }}">
                <label><div for="address_2" class="glyphicon glyphicon-map-marker control-label" ></div> About the address</label>
                <input id="address_2" type="text" class="form-control" name="address_2" value="{{ old('address_2') }}" placeholder="about the address">
                @if ($errors->has('address_2'))
                    <span class="help-block">
                                                <strong>{{ $errors->first('address_2') }}</strong>
                                            </span>
                @endif
            </div>

            <div  class="col-lg-6 form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                <label><div for="about" class="fa fa-home control-label" ></div> More Information</label>
                <input id="about" type="text" class="form-control" name="about" value="{{ old('about') }}" placeholder="information here">
                @if ($errors->has('about'))
                    <span class="help-block">
                                                <strong>{{ $errors->first('about') }}</strong>
                                            </span>
                @endif
            </div>

        </div>
    </div>
    <hr>
    <div class="panel-body" >
        <label><div class="fa fa-gears"></div> Station Type & Connection Type</label>
        <br>
        <br>
        <div class="col-lg-3">
            <div class="form-group">
                <label><div class="fa fa-gears"></div> Station Type</label>
                <select name="device_id" class="form-control" value="{{ old('device_id') }}">
                    @foreach ($device as $device)
                        <option value="{{ $device->id }}" >{{ $device->brand_model }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div  class="col-lg-3 form-group{{ $errors->has('mac') ? ' has-error' : '' }}">
            <label><div for="mac" class="fa fa-barcode control-label" ></div> MAC Address</label>
            <input id="mac" type="text" class="form-control" name="mac" value="{{ old('mac') }}" placeholder="Fiscal Address">
            @if ($errors->has('mac'))
                <span class="help-block">
                                                <strong>{{ $errors->first('mac') }}</strong>
                                            </span>
            @endif
        </div>

        <div  class="col-lg-3 form-group{{ $errors->has('ip') ? ' has-error' : '' }}">
            <label><div for="ip" class="fa fa-sitemap control-label" ></div> IP Address</label>
            <input id="ip" type="text" class="form-control" name="ip" value="{{ old('ip') }}" placeholder="IP Address">
            @if ($errors->has('ip'))
                <span class="help-block">
                                                <strong>{{ $errors->first('ip') }}</strong>
                                            </span>
            @endif
        </div>

        <div class="col-lg-3" class="form-group">
            <label><div class="fa fa-chevron-down"></div> Connection Method :</label>
            {!! Form::select("connection_method", connection_method(), null ,['class'=>'form-control','name'=>'','id'=>'type']) !!}
        </div>

    </div>


<div id="wireless">
    <hr>

    <div class="panel-body">
        <label><div class="fa fa-gears"></div> Wirless AP Information</label>
        <br>
        <br>

        <div class="col-lg-3">
            <div class="form-group">
                <label><div class="fa fa-map-signs"></div> point / Tower</label>
                <select name="tower_id" class="form-control" >
                    @foreach ($towers as $tower) {
                    <option value="{{ $tower->id }}" >{{ $tower->name }}</option>
                    }
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                <label><div class="fa fa-wifi"></div> Broadcast SSID</label>
                <select name="broadcast_id" class="form-control" >
                    @foreach ($broadcast as $broadcast)
                        <option value="{{ $broadcast->id }}" >{{ $broadcast->ssid }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                <label><div class="fa fa-barcode"></div> Broadcast AP MAC</label>
                <select name="apmac_id" class="form-control" >
                    @foreach ($apmac as $apmac)
                        <option value="{{ $apmac->id }}" >{{ $apmac->mac  }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                <label><div class="fa fa-gears"></div> Wireless Method</label>
                <select name="connection_method" class="form-control" value="{{ old('connection_method') }}">
                    @foreach ($connection_types as $connection_types)
                        <option value="{{ $connection_types->id }}" >{{ $connection_types->type }}</option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>
</div>

        <div  id="fiber">
            <hr>
        <div class="panel-body">
            <label><div class="fa fa-gears"></div> Provided by Fiber Optic</label>
            <br>
            <br>
            <div class="col-lg-3">
                <div class="form-group">
                    <label><div class="glyphicon glyphicon-resize-small"></div> Box Node</label>
                    <select name="tower_id" class="form-control" >

                    </select>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <label><div class="glyphicon glyphicon-resize-full"></div> Fiber Box</label>
                    <select name="broadcast_id" class="form-control" >

                    </select>
                </div>
            </div>

        </div>
</div>
 <div  id="lan">
                <hr>
        <div class="panel-body" >
            <label><div class="fa fa-gears"></div>Provided by LAN</label>
            <br>
            <br>
       <div class="col-lg-3">
                <div class="form-group">
                    <label><div class="glyphicon glyphicon-random"></div> Hub Switch</label>
                    <select name="tower_id" class="form-control" >

                    </select>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <label><div class="glyphicon glyphicon-inbox"></div> Port Number</label>
                    <select name="broadcast_id" class="form-control" >

                    </select>
                </div>
            </div>

        </div>
 </div>
        <hr>
    <div class="panel-body">
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="save" name="save">
        </div>
        </div>

</div>
    </form>

    @include('adminlte::layouts.partials.pagefooter')
@endsection


@section('page-scripts')

@endsection
