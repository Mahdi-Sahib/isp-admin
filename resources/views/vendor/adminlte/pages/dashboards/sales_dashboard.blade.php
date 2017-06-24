@extends('adminlte::layouts.app')


@section('htmlheader_title')
    Sales
@endsection


@section('contentheader_title')
    Sales Dashboard
@endsection


@section('contentheader_description')
    Income , Money Time Flow
@endsection


@section('page-name')
    Employee Income
@endsection

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>

@section('main-content')

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="row">
                @include('adminlte::pages.dashboards.partials.sales_widgets')
                <div class="col-lg-12" class="container-fluid spark-screen">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @include('adminlte::pages.dashboards.partials.sales_dashboard_view')
                        </div>
                    </div>
                </div>
                @include('adminlte::pages.dashboards.partials.profits_widgets')
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection


@section('page-scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    @include('adminlte::pages.dashboards.partials.sales_dashboard_script')

@endsection
