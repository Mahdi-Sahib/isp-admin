@extends('adminlte::layouts.app')


@section('htmlheader_title')
    Refill
@endsection


@section('contentheader_title')
    Refill Time Line
@endsection


@section('contentheader_description')

@endsection


@section('page-name')
@endsection

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>

@section('main-content')
    @include('adminlte::layouts.partials.notifications')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="row">
                @include('adminlte::pages.customer.partials.refill.money_widgets')
                <div class="col-lg-12" class="container-fluid spark-screen">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @include('adminlte::pages.customer.partials.refill.refill_time_line_view')
                            @include('adminlte::pages.customer.partials.refill.modals.refill_peek')
                            @include('adminlte::pages.customer.partials.customer_peek_view')
                            @include('adminlte::pages.customer.partials.refill.modals.repayment')
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
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

    @include('adminlte::pages.customer.partials.refill.script.refill_time_line_script')
    @include('adminlte::pages.customer.partials.customer_peek_script')
    @include('adminlte::pages.customer.partials.refill.script.script')
@endsection