<div class="box-body">
    <div  class="col-lg-3 form-group">
        <label><div class="fa fa-user" ></div> Full Name</label>
        <input type="text" class="form-control" value="{{ $customer->fullname }}" disabled >
    </div>
    <div  class="col-lg-3 form-group">
        <label><div class="fa fa-user-plus" ></div> PPPOE User</label>
        <input type="text" class="form-control" value="{{ $customer->username }}" disabled >
    </div>
    <div  class="col-lg-2 form-group">
        <label><div class="fa fa-unlock" ></div> Password</label>
        <input type="text" class="form-control" value="{{ $customer->password }}" disabled >
    </div>
    <div  class="col-lg-2 form-group">
        <label><div class="fa fa-phone" ></div> Mobile (ZIN)</label>
        <input type="text" class="form-control" value="{{ $customer->mobile_1 }}" disabled >
    </div>
    <div  class="col-lg-2 form-group">
        <label><div class="fa fa-phone" ></div> Other Mobile</label>
        <input type="text" class="form-control" value="{{ $customer->mobile_2 }}" disabled >
    </div>
    <div  class="col-lg-3 form-group">
        <label><div class="fa fa-home" ></div> Adress</label>
        <input type="text" class="form-control" value="" disabled >
    </div>
    <div  class="col-lg-3 form-group">
        <label><div class="fa fa-home" ></div> About the address</label>
        <input type="text" class="form-control" value="{{ $customer->address_2 }}" disabled >
    </div>
    <div  class="col-lg-6 form-group">
        <label><div class="fa fa-home" ></div> More Information</label>
        <input type="text" class="form-control" value="{{ $customer->about }}" disabled >
    </div>
    <div  class="col-lg-2 form-group">
        <label><div class="fa fa-gears" ></div> Station Type</label>
        <input type="text" class="form-control" value="" disabled >
    </div>
    <div  class="col-lg-2 form-group">
        <label><div class="fa fa-barcode" ></div> MAC Address</label>
        <input type="text" class="form-control" value="{{ $customer->mac }}" disabled >
    </div>
    <div  class="col-lg-2 form-group">
        <label><div class="fa fa-sitemap" ></div> IP Address</label>
        <input type="text" class="form-control" value="{{ $customer->ip }}" disabled >
    </div>
    <div  class="col-lg-2 form-group">
        <label><div class="fa fa-wifi" ></div> Tower ASOC</label>
        <input  type="text" class="form-control" value="" disabled >
    </div>
    <div  class="col-lg-2 form-group">
        <label><div class="fa fa-wifi" ></div> SSID ASOC</label>
        <input type="text" class="form-control"  value="" disabled >
    </div>
    <div  class="col-lg-2 form-group">
        <label><div class="fa fa-wifi" ></div> AP MAC ASOC</label>
        <input type="text" class="form-control"  value="" disabled >
    </div>
    <div  class="col-lg-3 form-group">
        <label><div class="fa fa-calendar-times-o" ></div> Add Date</label>
        <input type="text" class="form-control" value="{{ $customer->created_at->format('(D g:i A)    d-n-Y') }}" disabled >
    </div>
    <div  class="col-lg-3 form-group">
        <label><div class="fa fa-calendar-times-o" ></div> Last Update at</label>
        <input type="text" class="form-control" value="{{ $customer->updated_at->format('(D g:i A)    d-n-Y') }}" disabled >
    </div>
    <div  class="col-lg-3 form-group">
        <label><div class="fa fa-calendar-times-o" ></div> Add by</label>
        <input type="text" class="form-control" value="{{ $customer->created_by}}" disabled >
    </div>
    <div  class="col-lg-3 form-group">
        <label><div class="fa fa-calendar-times-o" ></div> Last Update by</label>
        <input type="text" class="form-control" value="{{ $customer->updated_by}}" disabled >
    </div>
</div>

