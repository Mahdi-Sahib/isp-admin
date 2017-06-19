{!! Form::Model ( $customer ,[
    'method' => 'PATCH' ,
    'url'  => ['isp-cpanel/customers' , $customer->id]
    ]) !!}

{{ csrf_field() }}


<div class="box-body">
    <label><div class="fa fa-info-circle"></div> Customer information</label>
    <br>
    <br>
    <div class="row">
        <div  class="col-lg-3 form-group{{ $errors->has('fullname') ? ' has-error' : '' }}">
            <label><div for="fullname" class="fa fa-user control-label" ></div> Full Name</label>
            <input id="fullname" type="text" class="form-control" name="fullname" value="{{ $customer->fullname }}" >
            @if ($errors->has('fullname'))
                <span  class="help-block">
                                            <strong>{{ $errors->first('fullname') }}</strong>
                                        </span>
            @endif
        </div>


        <div  class="col-lg-3 form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <label><div for="username" class="fa fa-user-plus control-label" ></div> PPPOE User</label>
            <input id="username" type="text" class="form-control" name="username" value="{{ $customer->username }}" >
            @if ($errors->has('username'))
                <span class="help-block">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
            @endif
        </div>

        <div  class="col-lg-2 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label><div for="password" class="fa fa-unlock control-label" ></div> Password</label>
            <input id="password" type="text" class="form-control" name="password" value="{{ $customer->password }}" >
            @if ($errors->has('password'))
                <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
            @endif
        </div>

        <div  class="col-lg-2 form-group{{ $errors->has('mobile_1') ? ' has-error' : '' }}">
            <label><div for="mobile_1" class="fa fa-phone control-label" ></div> Mobile</label>
            <input id="mobile_1" type="tel" class="form-control" name="mobile_1" value="{{ $customer->mobile_1 }}"  placeholder="(ZIN) 078" maxlength="11">
            @if ($errors->has('mobile_1'))
                <span class="help-block">
                                                    <strong>{{ $errors->first('mobile_1') }}</strong>
                                                </span>
            @endif
        </div>

        <div  class="col-lg-2 form-group{{ $errors->has('mobile_2') ? ' has-error' : '' }}">
            <label><div for="mobile_2" class="fa fa-phone control-label" ></div> Other Mobile</label>
            <input id="mobile_2" type="tel" class="form-control" name="mobile_2" value="{{ $customer->mobile_2 }}"  placeholder="other namber" maxlength="11">
            @if ($errors->has('mobile_2'))
                <span class="help-block">
                                                        <strong>{{ $errors->first('mobile_2') }}</strong>
                                                    </span>
            @endif
        </div>
    </div>
</div>
<hr>
<div class="box-body"><label><div class="fa fa-edit"></div> Address</label>
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
                    <option value="{!! $address->id !!}"
                            @if ($customer->address_1 == $address->id) selected="selected" @endif>{!! $address->place_1 !!}</option>
                    }
                    @endforeach
                </select>
            </div>
        </div>

        <div  class="col-lg-3 form-group{{ $errors->has('address_2') ? ' has-error' : '' }}">
            <label><div for="address_2" class="fa fa-home control-label" ></div> About the address</label>
            <input id="address_2" type="text" class="form-control" name="address_2" value="{{ $customer->address_2 }}" >
            @if ($errors->has('address_2'))
                <span  class="help-block">
                                            <strong>{{ $errors->first('address_2') }}</strong>
                                        </span>
            @endif
        </div>

        <div  class="col-lg-6 form-group{{ $errors->has('about') ? ' has-error' : '' }}">
            <label><div for="about" class="fa fa-user control-label" ></div> More Information</label>
            <input id="about" type="text" class="form-control" name="about" value="{{ $customer->about }}" >
            @if ($errors->has('about'))
                <span  class="help-block">
                                            <strong>{{ $errors->first('about') }}</strong>
                                        </span>
            @endif
        </div>

    </div>
</div>
<hr>
<div class="box-body">
    <label>
        <div class="fa fa-gears"></div>
         Station Type & Connection Type</label>
    <br>
    <br>
    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <label>
                    <div class="fa fa-home"></div>Station Type</label>
                <select name="device_id" class="form-control">
                    @foreach ($device as $device) {
                    <option value="{!! $device->id !!}"
                            @if ($customer->device_id == $device->id) selected="selected" @endif>{!! $device->brand_model !!}</option>
                    }
                    @endforeach
                </select>
            </div>
        </div>
        <div  class="col-lg-3 form-group{{ $errors->has('mac') ? ' has-error' : '' }}">
            <label><div for="mac" class="fa fa-barcode control-label" ></div> MAC Address</label>
            <input id="mac" type="text" class="form-control" name="mac" value="{{ $customer->mac }}" placeholder="Fiscal Address">
            @if ($errors->has('mac'))
                <span class="help-block">
                                                <strong>{{ $errors->first('mac') }}</strong>
                                            </span>
            @endif
        </div>

        <div  class="col-lg-3 form-group{{ $errors->has('ip') ? ' has-error' : '' }}">
            <label><div for="ip" class="fa fa-sitemap control-label" ></div> IP Address</label>
            <input id="ip" type="tel" class="form-control" name="ip" value="{{ $customer->ip }}" placeholder="IP Address">
            @if ($errors->has('ip'))
                <span class="help-block">
                                                <strong>{{ $errors->first('ip') }}</strong>
                                            </span>
            @endif
        </div>


        <div class="col-lg-3">
            <div class="form-group">
                <label>
                    <div class="fa fa-home"></div>
                    Connection Method</label>
                <select id="connection_method" name="connection_method" class="form-control">
                    @foreach (connection_method_value() as $key => $value) {
                    <option value="{!! $key !!}"
                            @if ($customer->connection_method == $key) selected="selected" @endif>{!! $value !!}</option>
                    }
                    @endforeach
                </select>
            </div>
        </div>


        <input id="connection_method_id" value="{{ $customer->connection_method }}" hidden>
    </div>
</div>
<hr>
<div class="box-body" id="wireless">
    <label>
        <div class="fa fa-gears"></div>
        Wirless AP Information</label>
    <br>
    <br>
    <div class="row">

        <div class="col-lg-3">
            <div class="form-group">
                <label>
                    <div class="fa fa-wifi"></div>
                    point / Tower</label>
                <select name="tower_id" class="form-control">
                    @foreach ($towers as $tower) {
                    <option value="{!! $tower->id !!}"
                            @if ($customer->tower_id == $tower->id) selected="selected" @endif>{!! $tower->name !!}</option>
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
                    @foreach ($broadcasts as $broadcast) {
                    <option value="{!! $broadcast->id !!}"
                            @if ($customer->broadcast_id == $broadcast->id) selected="selected" @endif>{!! $broadcast->ssid !!}</option>
                    }
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label>
                    <div class="fa fa-wifi"></div>
                    Access Point MAC</label>
                <select name="apmac_id" class="form-control">
                    @foreach ($apmac as $apmac) {
                    <option value="{!! $apmac->id !!}"
                            @if ($customer->apmac_id == $apmac->id) selected="selected" @endif>{!! $apmac->mac !!}</option>
                    }
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label>
                    <div class="fa fa-home"></div>
                    Wireless Method</label>
                <select name="wireless_type_id" class="form-control">
                    @foreach (wireless_type() as $key => $value) {
                    <option value="{!! $key !!}"
                            @if ($customer->wireless_type_id == $key) selected="selected" @endif>{!! $value !!}</option>
                    }
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <hr>
</div>

<div class="box-body" id="fttx">
    <label>
        <div class="fa fa-gears"></div>
        FTTH </label>
    <br>
    <br>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label>
                    <div class="fa fa-wifi"></div>
                    OLT No. & Location</label>
                <select name="olt_id" class="form-control">
                    @foreach ($olt as $olt) {
                    <option value="{!! $olt->id !!}"
                            @if ($customer->apmac_id == $olt->id) selected="selected" @endif>{!! $olt->title !!}</option>
                    }
                    @endforeach
                </select>
            </div>
        </div>
        @if($customer->tower)
            <div class="col-lg-4 form-group">
                <label>
                    <div class="fa fa-random"></div>
                    OLT No. & Location</label>
                <input type="text" class="form-control" value="{{ $customer->tower->name }}">
            </div>
        @endif
        <div class="col-lg-4 form-group">
            <label>
                <div class="fa fa-sitemap"></div>
                First Splitter No. & Location</label>
            <input type="text" class="form-control" value="">
        </div>
        <div class="col-lg-4 form-group">
            <label>
                <div class="fa fa-sitemap"></div>
                Second Splitter No. & Location</label>
            <input type="text" class="form-control" value="">
        </div>
    </div>
    <hr>
</div>

<div class="box-body" id="lan">
<div class="row">
    <div class="col-lg-4">
        <div class="form-group">
            <label>
                <div class="fa fa-home"></div>
                 Hub Switch</label>
            <select name="address_1" class="form-control">
                @foreach ($hubs as $hub) {
                <option value="{!! $address->id !!}"
                        @if ($customer->hub_id == $hub->id) selected="selected" @endif>{!! $hub->name .  $hub->name !!}</option>
                }
                @endforeach
            </select>
        </div>
    </div>

    <div  class="col-lg-4 form-group{{ $errors->has('switch_port') ? ' has-error' : '' }}">
        <label><div for="switch_port" class="fa fa-user control-label" ></div> Port Number</label>
        <input id="switch_port" type="text" class="form-control" name="switch_port" value="{{ $customer->switch_port }}" >
        @if ($errors->has('switch_port'))
            <span  class="help-block">
                                            <strong>{{ $errors->first('switch_port') }}</strong>
                                        </span>
        @endif
    </div>
</div>
</div>


<hr>
<div class="form-group">
    <input type="submit" class="btn btn-success" value="Update" name="save">
</div>


{!! Form::close() !!}