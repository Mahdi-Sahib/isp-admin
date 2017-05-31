@extends('adminlte::layouts.app')


@section('htmlheader_title')
@endsection


@section('contentheader_title')
@endsection


@section('contentheader_description')
@endsection


@section('page-name')
@endsection

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>


@section('main-content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="row">
                @include('adminlte::pages.customer.partials.ticket.ticket_widgets')
                <div class="col-lg-12" class="container-fluid spark-screen">
                    @include('adminlte::layouts.partials.notifications')
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @include('adminlte::pages.customer.partials.ticket.table_all_open_tickets')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    <input type="hidden" name="hidden_view_ticket" id="hidden_view_ticket" value="{{url('isp-cpanel/customers/customer_ticket/view')}}">
    <input type="hidden" name="hidden_view_ticket" id="hidden_view_ticket" value="{{url('isp-cpanel/customers/customer_ticket/close_ticket')}}">
    @include('adminlte::pages.customer.partials.ticket.modals.ticket_peek')
    @include('adminlte::pages.customer.partials.ticket.modals.close_ticket')
@endsection


@section('page-scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    @include('adminlte::pages.customer.partials.ticket.script.ticket_peek_script')
    @include('adminlte::pages.customer.partials.ticket.script.table_all_open_tickets_script')
    @include('adminlte::pages.customer.partials.ticket.script.close_ticket_script')
@endsection