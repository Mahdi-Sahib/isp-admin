@extends('adminlte::layouts.app')


@section('htmlheader_title')
    UnPaid
@endsection


@section('contentheader_title')
    Unpaid Refills
@endsection


@section('contentheader_description')
    <strong class="text-red"> Unpaid : {{ number_format(App\RefillCustomer::where('payment_status','=', 1)->pluck('card_price')->sum() - App\RefillCustomer::where('payment_status','=', 1)->pluck('amount_paid')->sum()) }}</strong>
@endsection


@section('page-name')
@endsection

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.15/r-2.1.1/datatables.min.css"/>

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
                        @include('adminlte::pages.customer.partials.refill.table_unpaid')
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
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.15/r-2.1.1/datatables.min.js"></script>

    @include('adminlte::pages.customer.partials.refill.script.table_unpaid_script')
    @include('adminlte::pages.customer.partials.customer_peek_script')
    @include('adminlte::pages.customer.partials.refill.script.script')
@endsection