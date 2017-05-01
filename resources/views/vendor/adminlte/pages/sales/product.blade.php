@extends('adminlte::layouts.app')


@section('htmlheader_title')
@endsection


@section('contentheader_title')
@endsection


@section('contentheader_description')
@endsection


@section('page-name')
@endsection


@section('main-content')
    @include('adminlte::layouts.partials.pageheader')
    @include('adminlte::pages.sales.partials.product_view')
    @include('adminlte::pages.sales.partials.product_script')
    @include('adminlte::layouts.partials.pagefooter')
@endsection


@section('page-scripts')
@endsection
