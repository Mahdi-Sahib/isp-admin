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

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>

@section('main-content')
    @include('adminlte::layouts.partials.pageheader')
    @include('adminlte::pages.customer.partials.customer_view')
    @include('adminlte::pages.customer.partials.customer_ticket_view')
    <hr>
    @include('adminlte::pages.customer.refill.customer_refill_view')
    @include('adminlte::layouts.partials.pagefooter')
@endsection


@section('page-scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    @include('adminlte::pages.customer.partials.customer_ticket_script')
    @include('adminlte::pages.customer.refill.customer_refill_script')
@endsection
