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
                { data: 'connection_method', name: 'connection_method' , orderable: false, searchable: true },
                { data: 'action',         name: 'action', orderable: false, searchable: false , width:'11%' , class:'text-center'}
            ]
        });
    </script>
@endsection

