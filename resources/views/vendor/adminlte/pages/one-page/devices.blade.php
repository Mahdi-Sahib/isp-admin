@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Setting -> Devices
@endsection

@section('contentheader_title')
    Setting -> Devices
@endsection

@section('contentheader_description')
@endsection

@section('page-name')
    Devices
@endsection

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"/>

@section('main-content')
    @include('adminlte::layouts.partials.notifications')
    @include('adminlte::layouts.partials.pageheader')
    @include('adminlte::pages.one-page.partials.view_devices')
    @include('adminlte::layouts.partials.pagefooter')
@endsection

@section('page-scripts')
    @include('adminlte::pages.one-page.partials.secript_devices')
@endsection

