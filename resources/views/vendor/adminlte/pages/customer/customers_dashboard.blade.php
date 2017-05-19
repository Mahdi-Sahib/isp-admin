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

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>

@section('main-content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            @include('adminlte::layouts.partials.notifications')
            <div class="row">
                @include('adminlte::pages.customer.partials.dashboard.dashboard_widgets_view')
                    <div class="col-lg-12" class="container-fluid spark-screen">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                @include('adminlte::pages.customer.partials.dashboard.customer_table_one_view')
                                @include('adminlte::pages.customer.partials.dashboard.addModal_customer_refill')
                                @include('adminlte::pages.customer.partials.dashboard.add_ticket_view')
                                @include('adminlte::pages.customer.partials.customer_peek_view')

                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('page-scripts')
    @include('adminlte::pages.customer.partials.dashboard.customer_table_one_script')
    @include('adminlte::pages.customer.partials.customer_peek_script')
    @include('adminlte::pages.customer.partials.dashboard.addModal_customer_refill_script')
    @include('adminlte::pages.customer.partials.dashboard.add_ticket_script')

@endsection

