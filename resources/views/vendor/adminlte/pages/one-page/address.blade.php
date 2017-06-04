@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Setting -> Address
@endsection

@section('contentheader_title')
    Setting -> Address
@endsection

@section('contentheader_description')
    Address
@endsection

@section('page-name')
    Address
@endsection

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"/>

@section('main-content')
    @include('adminlte::layouts.partials.notifications')
    @include('adminlte::layouts.partials.pageheader')
    @include('adminlte::pages.one-page.partials.view_address')
    @include('adminlte::layouts.partials.pagefooter')
@endsection

@section('page-scripts')
    @include('adminlte::pages.one-page.partials.secript_address')
@endsection


