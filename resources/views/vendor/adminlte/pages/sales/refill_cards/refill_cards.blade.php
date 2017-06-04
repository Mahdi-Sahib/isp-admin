@extends('adminlte::layouts.app')


@section('htmlheader_title')
@endsection


@section('contentheader_title')
    <br>
@endsection


@section('contentheader_description')
@endsection

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>

@section('page-name')
    Refill Cards
@endsection


@section('main-content')
    @include('adminlte::layouts.partials.pageheader')
    @include('adminlte::pages.sales.refill_cards.partials.refill_cards_view')
    @include('adminlte::layouts.partials.pagefooter')
@endsection


@section('page-scripts')
    @include('adminlte::pages.sales.refill_cards.partials.refill_cards_script')
@endsection



