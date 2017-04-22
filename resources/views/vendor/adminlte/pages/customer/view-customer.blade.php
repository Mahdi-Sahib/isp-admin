@extends('adminlte::layouts.app')


@section('htmlheader_title')
@endsection


@section('contentheader_title')
@endsection


@section('contentheader_description')
@endsection


@section('page-name')
    View The Customer ( {{ $customer->fullname }} )
@endsection


@section('main-content')
    @include('adminlte::layouts.partials.pageheader')

    <!-- ################# -->

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
            <input type="text" class="form-control" value="{{ $customer->created_at->format('(D g:i A)    y-n-d') }}" disabled >
        </div>
        <div  class="col-lg-3 form-group">
            <label><div class="fa fa-calendar-times-o" ></div> Last Update at</label>
            <input type="text" class="form-control" value="{{ $customer->updated_at->format('(D g:i A)    y-n-d') }}" disabled >
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

    <div class="box-body">
    {!! Form::Model ( $ticket ,[

        ]) !!}
    {{ csrf_field() }}
    <div  class="col-lg-12 form-group">
        <div class="input-group input-group-sm">
            <input type="text" class="form-control" name="message" autocomplete="off">
                <span class="input-group-btn">
                  <button type="submit" name="save" class="btn btn-danger btn-flat">New Ticket!</button>
                </span>
        </div>
        <div  class="col-lg-12 form-group" hidden>
            <label><div for="ticket" class="fa fa-ticket control-label" ></div> New Ticket</label>
            <input id="message" type="text" class="form-control" name="customer_id"  value="{{ $customer->id }}">
        </div>
    </div>

    </div>


    {!! Form::close() !!}
    @include('adminlte::layouts.partials.pagefooter')
@endsection


@section('page-scripts')
@endsection
