@extends('adminlte::layouts.app')


@section('htmlheader_title')
@endsection


@section('contentheader_title')
    Edit Customer
@endsection


@section('contentheader_description')
    Edit Customer Information
@endsection


@section('page-name')
    Edit  ( {{ $customer->fullname }} )
@endsection


@section('main-content')
    @include('adminlte::layouts.partials.notifications')
    @include('adminlte::layouts.partials.pageheader')
    @include('adminlte::pages.customer.partials.edit_customer_view')
    @include('adminlte::layouts.partials.pagefooter')
@endsection


@section('page-scripts')
    @include('adminlte::pages.customer.partials.edit_customer_script')
@endsection
