@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
    Customer Area
@endsection

@section('contentheader_description')
    [ view , add , delete , all  -> customers ]
@endsection

@section('page-name')
    ALL CUSTOMERS
@endsection


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.7/jq-2.2.4/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.13/af-2.1.3/b-1.2.4/b-colvis-1.2.4/b-flash-1.2.4/b-html5-1.2.4/b-print-1.2.4/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.2.0/r-2.1.0/rr-1.2.0/sc-1.4.2/se-1.2.0/datatables.min.css"/>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"/>


@section('main-content')
    @include('adminlte::layouts.partials.pageheader')

                        <div class="box-body">
                            <table id="data" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>User Name</th>
                                    <th>Mobile</th>
                                    <th>Connection Type</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Full Name</th>
                                    <th>User Name</th>
                                    <th>Mobile</th>
                                    <th>Connection Type</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

@include('adminlte::layouts.partials.pagefooter')
@endsection

@section('page-scripts')


    <script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.7/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.13/af-2.1.3/b-1.2.4/b-colvis-1.2.4/b-flash-1.2.4/b-html5-1.2.4/b-print-1.2.4/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.2.0/r-2.1.0/rr-1.2.0/sc-1.4.2/se-1.2.0/datatables.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $('#data').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": '{!! route('isp-cpanel.customers.customer-table-one-ajax') !!}',


            "columns": [
                { data: 'fullname',          name: 'fullname' , orderable: false, searchable: true ,class:'text-center'},
                { data: 'username',          name: 'username' , orderable: false, searchable: true  },
                { data: 'mobile_1',          name: 'mobile_1' , orderable: false, searchable: true  },
                { data: 'connection_type',   name: 'connection_type' , orderable: false, searchable: true },
                { data: 'action',            name: 'action', orderable: false, searchable: false , class:'text-center'}
            ]
        });
    </script>
@endsection

