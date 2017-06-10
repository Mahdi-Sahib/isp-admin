@extends('adminlte::layouts.app')


@section('htmlheader_title')
@endsection


@section('contentheader_title')
    Customer Information
@endsection


@section('contentheader_description')
    Information & Ticket's & Refill
@endsection


@section('page-name')
    View The Customer ( {{ $customer->fullname }} )
@endsection

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>

@section('main-content')

    @include('adminlte::layouts.partials.notifications')

    @include('adminlte::layouts.partials.pageheader')

    @include('adminlte::pages.customer.partials.customer_profile')
    <hr>


    <!--     -->

    @include('adminlte::pages.customer.partials.ticket.table_ticket_this_customer')
    @include('adminlte::pages.customer.partials.ticket.modals.open_ticket')
    <input type="hidden" name="hidden_view_ticket" id="hidden_view_ticket" value="{{url('isp-cpanel/customers/customer_ticket/view')}}">
    <input type="hidden" name="hidden_view_ticket" id="hidden_view_ticket" value="{{url('isp-cpanel/customers/customer_ticket/close_ticket')}}">
    @include('adminlte::pages.customer.partials.ticket.modals.ticket_peek')
    @include('adminlte::pages.customer.partials.ticket.modals.close_ticket')


    <!--     -->
    @include('adminlte::pages.customer.partials.refill.table_refill')
    @include('adminlte::pages.customer.partials.refill.modals.refill')
    @include('adminlte::pages.customer.partials.refill.modals.refill_peek')
    <!--     -->
    @include('adminlte::pages.customer.partials.refill.modals.repayment')

    @include('adminlte::layouts.partials.pagefooter')
@endsection


@section('page-scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

    @include('adminlte::pages.customer.partials.script.customer_profile_script')
    @include('adminlte::pages.customer.partials.ticket.script.table_ticket_script')
    @include('adminlte::pages.customer.partials.ticket.script.ticket_peek_script')
    @include('adminlte::pages.customer.partials.ticket.script.close_ticket_script')

    @include('adminlte::pages.customer.partials.refill.script.table_refill_script')
    @include('adminlte::pages.customer.partials.refill.script.refill_script')
    @include('adminlte::pages.customer.partials.refill.script.script')

@endsection
