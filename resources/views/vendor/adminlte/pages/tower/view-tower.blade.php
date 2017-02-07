@extends('adminlte::layouts.app')


@section('htmlheader_title')
    Tower
@endsection


@section('contentheader_title')


@endsection


@section('contentheader_description')
@endsection


@section('page-name')

@endsection

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"/>

@section('main-content')

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">

             <div class="row">
                    @include('adminlte::pages.tower.partials.dashboard-heder')

                            <div class="col-lg-12" class="container-fluid spark-screen">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        @include('adminlte::pages.tower.partials.broadcast_view_crud')
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4" class="container-fluid spark-screen">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                    @include('adminlte::pages.tower.partials.ip_view_crud')
                                </div>
                                </div>
                            </div>

                            <div class="col-lg-8" class="container-fluid spark-screen">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        @include('adminlte::pages.tower.partials.link_view_crud')
                                    </div>
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
    @include('adminlte::pages.tower.partials.ip_secript_crud')
    @include('adminlte::pages.tower.partials.broadcast_secript_crud')
@endsection
