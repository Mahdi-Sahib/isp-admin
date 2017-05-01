@extends('adminlte::layouts.app')


@section('htmlheader_title')
    Supplier
@endsection


@section('contentheader_title')
@endsection


@section('contentheader_description')
@endsection


@section('page-name')
    Supplier
@endsection


@section('main-content')
    @include('adminlte::layouts.partials.pageheader')
    @include('adminlte::pages.sales.partials.supplier_view')
    @include('adminlte::pages.sales.partials.supplier_script')
    @include('adminlte::layouts.partials.pagefooter')
@endsection


@section('page-scripts')
@endsection
