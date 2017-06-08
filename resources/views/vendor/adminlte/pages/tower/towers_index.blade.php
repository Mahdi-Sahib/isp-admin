@extends('adminlte::layouts.app')


@section('htmlheader_title')
@endsection


@section('contentheader_title')
@endsection


@section('contentheader_description')
@endsection


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"/>

@section('page-name')
    Broadcast point / Tower
@endsection


@section('main-content')
    @include('adminlte::layouts.partials.pageheader')

    <div class="box-body">
        <table id="data" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Broadcast Point</th>
                <th>Agent / Admin</th>
                <th>Location</th>
                <th>Statistics</th>
                <th>Navigation's</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
                <th>Broadcast Point</th>
                <th>Agent / Admin</th>
                <th>Location</th>
                <th>Statistics</th>
                <th>Navigation's</th>
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
            "ajax": '{{ url('isp-cpanel/towers/tower-table') }}',
            "columns": [
                {data: 'name', name: 'name', orderable: false, searchable: true, class: 'text-center'},
                {data: 'agent', name: 'agent', orderable: false, searchable: true, class: 'text-center'},
                {data: 'location', name: 'location', orderable: false, searchable: true},
                {data: 'statistics', name: 'statistics', orderable: false, searchable: true},
                {
                    data: 'navigation',
                    name: 'navigation',
                    orderable: false,
                    searchable: false,
                    width: '11%',
                    class: 'text-center'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '11%',
                    class: 'text-center'
                }]
        });
    </script>
@endsection
