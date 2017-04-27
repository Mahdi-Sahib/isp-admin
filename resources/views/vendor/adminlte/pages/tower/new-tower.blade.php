@extends('adminlte::layouts.app')


@section('htmlheader_title')
@endsection


@section('contentheader_title')
    New ًWireless Point
@endsection


@section('contentheader_description')
@endsection


@section('page-name')
    Add New ًWireless (Tower or Access points)
@endsection


@section('main-content')
    @include('adminlte::layouts.partials.pageheader')
    <form action="{{ url('isp-cpanel/towers') }}" method="post">

    {{ csrf_field() }}

    <div>
        <div class="box-body">
            <label><div class="fa fa-info-circle"></div>   Point information</label>
            <br>
            <br>
            <div  class="col-lg-3 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label><div for="name" class="glyphicon glyphicon-info-sign control-label" ></div> Wireless Point Name</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter the  Name" >
                @if ($errors->has('name'))
                    <span  class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                @endif
            </div>

            <div  class="col-lg-3 form-group{{ $errors->has('agent') ? ' has-error' : '' }}">
                <label><div for="agent" class="glyphicon glyphicon-info-sign control-label" ></div> Agent / Admine</label>
                <input id="agent" type="text" class="form-control" name="agent" value="{{ old('agent') }}" placeholder="Name of agent" >
                @if ($errors->has('agent'))
                    <span  class="help-block">
                                            <strong>{{ $errors->first('agent') }}</strong>
                                        </span>
                @endif
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <label><div class="fa fa-home"></div> Address</label>
                    <select name="location" class="form-control" >
                        @foreach ($address as $address) {
                        <option value="{!! $address->id !!}" >{!! $address->place_1 !!}</option>
                        }
                        @endforeach
                    </select>
                </div>
            </div>

            <div  class="col-lg-3 form-group{{ $errors->has('google_location') ? ' has-error' : '' }}">
                <label><div for="google_location" class="glyphicon glyphicon-map-marker control-label" ></div> google_location</label>
                <input id="google_location" type="text" class="form-control" name="google_location" value="{{ old('google_location') }}"  >
                @if ($errors->has('google_location'))
                    <span  class="help-block">
                                            <strong>{{ $errors->first('google_location') }}</strong>
                                        </span>
                @endif
            </div>



        </div>

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
