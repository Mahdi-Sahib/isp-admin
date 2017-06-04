@extends('adminlte::layouts.app')


@section('htmlheader_title')
    FTTX
@endsection


@section('contentheader_title')
    FTTX
@endsection


@section('contentheader_description')
    OLT
@endsection


@section('page-name')
    FTTX
@endsection

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>

@section('main-content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            @include('adminlte::layouts.partials.notifications')
            <div class="row">
                @include('adminlte::pages.fttx.partials.widgets')
                <div class="col-lg-12" class="container-fluid spark-screen">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @include('adminlte::pages.fttx.partials.olt_crud')
                            @include('adminlte::pages.fttx.partials.olt_table')
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
         @include('adminlte::pages.fttx.partials.script')
@endsection
