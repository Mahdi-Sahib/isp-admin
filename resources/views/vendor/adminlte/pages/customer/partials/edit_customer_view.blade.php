<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



        <div class="box-body">
                <label><div class="fa fa-info-circle"></div>  Customer information</label>
                <br>
                <br>
            <div class="row">
                    <div  class="col-lg-3 form-group">
                        <label><div class="fa fa-user"></div> Full Name</label>
                        <input type="text" class="form-control" value="{{ $customer->fullname }}"  >
                    </div>
                    <div  class="col-lg-3 form-group">
                        <label><div class="fa fa-user-plus"></div> PPPOE User</label>
                        <input type="text" class="form-control" value="{{ $customer->username }}"  >
                    </div>
                    <div  class="col-lg-2 form-group">
                        <label><div class="fa fa-unlock"></div> Password</label>
                        <input type="text" class="form-control" value="{{ $customer->password }}"  >
                    </div>
                    <div  class="col-lg-2 form-group">
                        <label><div class="fa fa-phone"></div> Mobile</label>
                        <input type="text" class="form-control" value="{{ $customer->mobile_1 }}"  >
                    </div>
                    <div  class="col-lg-2 form-group">
                        <label><div class="fa fa-phone" ></div> Other Mobile</label>
                        <input type="text" class="form-control" value="{{ $customer->mobile_2 }}"  >
                    </div>
            </div>
        </div>

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
                                    <option value="{!! $address->id !!}" @if ($customer->address_1 == $address->id) selected="selected" @endif>{!! $address->place_1 !!}</option>
                                    }
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div  class="col-lg-3 form-group">
                            <label><div class="fa fa-home"></div> About the address</label>
                            <input type="text" class="form-control" value="{{ $customer->address_2 }}"  >
                        </div>
                        <div  class="col-lg-6 form-group">
                            <label><div class="fa fa-home"></div> More Information</label>
                            <input type="text" class="form-control" value="{{ $customer->about }}"  >
                        </div>
                </div>
    </div>

<hr>

    <div class="panel-body" >
                <label><div class="fa fa-gears"></div> Station Type & Connection Type</label>
                <br>
                <br>
                <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label><div class="fa fa-home"></div> Station Type</label>
                                <select name="device_id" class="form-control" >
                                    @foreach ($device as $device) {
                                    <option value="{!! $device->id !!}" @if ($customer->device_id == $device->id) selected="selected" @endif>{!! $device->brand_model !!}</option>
                                    }
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div  class="col-lg-3 form-group">
                            <label><div class="fa fa-barcode"></div> MAC Address</label>
                            <input type="text" class="form-control" value="{{ $customer->mac }}"  name="mac" >
                        </div>
                        <div  class="col-lg-3 form-group">
                            <label><div class="fa fa-sitemap"></div> IP Address</label>
                            <input type="text" class="form-control" value="{{ $customer->ip }}" name="ip" >
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label><div class="fa fa-home"></div> Connection Method</label>
                                <select name="connection_method" class="form-control" >
                                    @foreach (connection_method_value() as $key => $value) {
                                    <option value="{!! $key !!}" @if ($customer->connection_method == $key) selected="selected" @endif>{!! $value !!}</option>
                                    }
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <input id="v" value="{{ $customer->connection_method }}" hidden>
                </div>
    </div>

<hr>

    <div class="box-body" id="wireless">
        <label><div class="fa fa-gears"></div> Wirless AP Information</label>
        <br>
        <br>
        <div class="row">

                <div class="col-lg-3">
                    <div class="form-group">
                        <label><div class="fa fa-wifi"></div> point / Tower</label>
                        <select name="tower_id" class="form-control" >
                            @foreach ($towers as $tower) {
                            <option value="{!! $tower->id !!}" @if ($customer->tower_id == $tower->id) selected="selected" @endif>{!! $tower->name !!}</option>
                            }
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label><div class="fa fa-wifi"></div> Broadcast SSID</label>
                        <select name="broadcast_id" class="form-control" >
                            @foreach ($broadcasts as $broadcast) {
                            <option value="{!! $broadcast->id !!}" @if ($customer->broadcast_id == $broadcast->id) selected="selected" @endif>{!! $broadcast->ssid !!}</option>
                            }
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label><div class="fa fa-wifi"></div> Broadcast AP MAC</label>
                        <select name="apmac_id" class="form-control" >
                            @foreach ($apmac as $apmac) {
                            <option value="{!! $apmac->id !!}" @if ($customer->apmac_id == $apmac->id) selected="selected" @endif>{!! $apmac->mac !!}</option>
                            }
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label><div class="fa fa-home"></div> Wireless Method</label>
                        <select name="wireless_type_id" class="form-control" >
                            @foreach (wireless_type() as $key => $value) {
                            <option value="{!! $key !!}" @if ($customer->wireless_type_id == $key) selected="selected" @endif>{!! $value !!}</option>
                            }
                            @endforeach
                        </select>
                    </div>
                </div>
          </div>
    </div>


            <div class="box-body" id="fttx">
                        <label><div class="fa fa-gears"></div> Station Type & Connection Type</label>
                        <br>
                        <br>
                        <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label><div class="fa fa-wifi"></div> OLT No. & Location</label>
                                        <select name="olt_id" class="form-control" >
                                            @foreach ($olt as $olt) {
                                            <option value="{!! $olt->id !!}" @if ($customer->apmac_id == $olt->id) selected="selected" @endif>{!! $olt->title !!}</option>
                                            }
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @if($customer->tower)
                                    <div  class="col-lg-4 form-group">
                                        <label><div class="fa fa-wifi"></div> OLT No. & Location</label>
                                        <input  type="text" class="form-control" value="{{ $customer->tower->name }}"  >
                                    </div>
                                @endif
                                <div  class="col-lg-4 form-group">
                                    <label><div class="fa fa-wifi"></div> First Splitter No. & Location</label>
                                    <input type="text" class="form-control"  value=""  >
                                </div>
                                <div  class="col-lg-4 form-group">
                                    <label><div class="fa fa-wifi"></div> Second Splitter No. & Location</label>
                                    <input type="text" class="form-control"  value=""  >
                                </div>
                                </div>
                            </div>

                            <div class="box-body" id="lan">
                                <div  class="col-lg-4 form-group">
                                    <label><div class="fa fa-wifi"></div> Hub Switch</label>
                                    <input  type="text" class="form-control" value=""  >
                                </div>
                                <div  class="col-lg-4 form-group">
                                    <label><div class="fa fa-wifi"></div> Port Number</label>
                                    <input type="text" class="form-control"  value=""  >
                                </div>
                            </div>
                       </dive>
                    </dive>


<hr>


<hr>
<div class="box-body">
    <div  class="col-lg-3 form-group">
        <label><div class="fa fa-calendar-times-o"></div> Add Date</label>
        <input type="text" class="form-control" value="{{ $customer->created_at->format('(D g:i A)    d-n-Y') }}"  >
    </div>
    <div  class="col-lg-3 form-group">
        <label><div class="fa  fa-user-secret"></div> Add by</label>
        <input type="text" class="form-control" value="{{ $customer->userCreated->name}}"  >
    </div>
    @if ($customer->updated_at != $customer->created_at)
        <div  class="col-lg-3 form-group">
            <label><div class="fa fa-calendar-times-o"></div> Last Update at</label>
            <input type="text" class="form-control" value="{{ $customer->updated_at->format('(D g:i A)    d-n-Y') }}"  >
        </div>
    @endif
    @if ($customer->updated_by)
        <div  class="col-lg-3 form-group">
            <label><div class="fa  fa-user-secret"></div> Last Update by</label>
            <input type="text" class="form-control" value="{{ $customer->userUpdated->name}}"  >
        </div>
    @endif
</div>
<hr>
