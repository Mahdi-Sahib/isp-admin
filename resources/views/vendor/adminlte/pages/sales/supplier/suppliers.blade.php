@extends('adminlte::layouts.app')


@section('htmlheader_title')
@endsection


@section('contentheader_title')
@endsection


@section('contentheader_description')
    supplier
@endsection


@section('page-name')
    supplier
@endsection

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>

@section('main-content')
    @include('adminlte::layouts.partials.pageheader')
    @include('adminlte::pages.sales.supplier.partials.supplier_crud_view')
    @include('adminlte::pages.sales.supplier.partials.supplier_table_ajax')
    @include('adminlte::layouts.partials.pagefooter')
@endsection


@section('page-scripts')
    @include('adminlte::pages.sales.supplier.partials.supplier_crud_script')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    @include('adminlte::pages.sales.supplier.partials.supplier_table_script')
@endsection
