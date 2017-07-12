@extends('adminlte::layouts.app')


@section('htmlheader_title')
    Edit Wireless Point
@endsection


@section('contentheader_title')
    Edit Wireless Point
@endsection


@section('contentheader_description')
    change the information
@endsection


@section('page-name')
    Edit Wireless Point
@endsection


@section('main-content')
    @include('adminlte::layouts.partials.pageheader')

    {!! Form::open([
    'method' => 'PATCH',
    'action'=>'TowerController@store',
    'url'  => ['isp-cpanel/towers' , $tower->id],
    'onsubmit'=>'onsubmit()'

    ])!!}


    {{ csrf_field() }}

    <div>
        <div class="box-body">
            <label><div class="fa fa-info-circle"></div>   Tower information</label>
            <br>
            <br>

            <div  class="col-lg-3 form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label><div for="title" class="fa fa-info control-label" ></div> Title OR Name</label>
                <input id="title" type="title" class="form-control" name="title" value="{{ $tower->title }}" >
                @if ($errors->has('title'))
                    <span class="help-block">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                @endif
            </div>

            <div  class="col-lg-3 form-group{{ $errors->has('agent') ? ' has-error' : '' }}">
                <label><div for="agent" class="fa fa-info control-label" ></div> Agent</label>
                <input id="agent" type="agent" class="form-control" name="agent" value="{{ $tower->agent }}" >
                @if ($errors->has('agent'))
                    <span class="help-block">
                                                <strong>{{ $errors->first('agent') }}</strong>
                                            </span>
                @endif
            </div>

            <div  class="col-lg-3 form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                <label><div for="location" class="glyphicon glyphicon-map-marker control-label" ></div> Location</label>
                <input id="location" type="location" class="form-control" name="location" value="{{ $tower->location }}" >
                @if ($errors->has('agent'))
                    <span class="help-block">
                                                <strong>{{ $errors->first('location') }}</strong>
                                            </span>
                @endif
            </div>

            <div  class="col-lg-3 form-group{{ $errors->has('google_location') ? ' has-error' : '' }}">
                <label><div for="google_location" class="glyphicon glyphicon-map-marker control-label" ></div> google_location</label>
                <input id="google_location" type="google_location" class="form-control" name="google_location" value="{{ $tower->google_location }}" >
                @if ($errors->has('google_location'))
                    <span class="help-block">
                                                <strong>{{ $errors->first('google_location') }}</strong>
                                            </span>
                @endif
            </div>


        </div>

        <div class="panel-body">
            <div class="form-group">
                <input type="submit" id="submit_edit_tower" class="btn btn-primary" value="save" name="save">
            </div>
        </div>

    </div>

    {!! Form::close() !!}

    @include('adminlte::layouts.partials.pagefooter')
@endsection


@section('page-scripts')
    <script type="text/javascript">
        function onsubmit() {
            onsubmit=document.getElementById('submit_edit_tower').disabled=true;
            document.getElementById('submit_edit_tower').value='Submitting, please wait...';
        }
    </script>
@endsection
