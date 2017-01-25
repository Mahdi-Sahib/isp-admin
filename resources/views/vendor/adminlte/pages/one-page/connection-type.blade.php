@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Setting -> Connection Type
@endsection

@section('contentheader_title')
    Settings -> Connection Type
@endsection

@section('contentheader_description')
    Basics
@endsection

@section('page-name')
    Connection Type
@endsection

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"/>

@section('main-content')
    @include('adminlte::layouts.partials.notifications')
    @include('adminlte::layouts.partials.pageheader')
    @include('adminlte::pages.one-page.partials.view_connection_type')
    @include('adminlte::layouts.partials.pagefooter')
@endsection

@section('page-scripts')
    @include('adminlte::pages.one-page.partials.secript_connection_type')
@endsection
