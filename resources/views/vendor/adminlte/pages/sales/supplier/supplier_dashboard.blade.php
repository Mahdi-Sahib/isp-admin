@extends('adminlte::layouts.app')

@section('htmlheader_title')
@endsection

@section('contentheader_title')
    {{ $supplier->name }}
@endsection

@section('contentheader_description')
    Supplier Information
@endsection

@section('page-name')
    {{ $supplier->name }} Supplier Information
@endsection

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>

@section('main-content')
    @include('adminlte::layouts.partials.pageheader')
    @include('adminlte::pages.sales.supplier.partials.supplier_info_view')
    Balance Recharge
    @include('adminlte::pages.sales.supplier.partials.supplier_balancerecharge_view')
    @include('adminlte::layouts.partials.pagefooter')
@endsection

@section('page-scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    @include('adminlte::pages.sales.supplier.partials.supplier_balancerecharge_script')
@endsection
