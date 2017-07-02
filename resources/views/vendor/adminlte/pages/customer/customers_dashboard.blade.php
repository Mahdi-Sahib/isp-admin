@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
    Customer Area
@endsection

@section('contentheader_description')
    Customer Dashboard How can {{ Auth::User()->name }} See
@endsection

@section('page-name')
    ALL CUSTOMERS
@endsection

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.15/r-2.1.1/datatables.min.css"/>



@section('main-content')
    @include('adminlte::layouts.partials.notifications')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="row">
                @include('adminlte::pages.customer.partials.dashboard.dashboard_widgets_view')
                    <div class="col-lg-12" class="container-fluid spark-screen">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                @include('adminlte::pages.customer.partials.dashboard.customer_table_one_view')
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    @include('adminlte::pages.customer.partials.refill.modals.refill')
    @include('adminlte::pages.customer.partials.ticket.modals.open_ticket')
    @include('adminlte::pages.customer.partials.ticket.modals.hint')
    @include('adminlte::pages.customer.partials.customer_peek_view')
@endsection

@section('page-scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.15/r-2.1.1/datatables.min.js"></script>
    @include('adminlte::pages.customer.partials.dashboard.customer_table_one_script')
    @include('adminlte::pages.customer.partials.customer_peek_script')
    @include('adminlte::pages.customer.partials.refill.script.refill_script')
    @include('adminlte::pages.customer.partials.refill.script.refill_script')
    @include('adminlte::pages.customer.partials.ticket.script.open_ticket_script')
    @include('adminlte::pages.customer.partials.ticket.script.hint_script')
@endsection

