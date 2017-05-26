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
            @include('adminlte::layouts.partials.notifications')
            <div class="row">
                <div class="col-lg-12" class="container-fluid spark-screen">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @include('adminlte::pages.customer.unpaid.unpaid_table_view')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    @include('adminlte::pages.customer.unpaid.paid_view')
@endsection


@section('page-scripts')
    @include('adminlte::pages.customer.unpaid.unpaid_table_script')
    @include('adminlte::pages.customer.unpaid.paid_script')
@endsection