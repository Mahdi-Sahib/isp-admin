@extends('adminlte::layouts.app')


@section('htmlheader_title')
    Wireless Point's
@endsection


@section('contentheader_title')
    Wireless Point's
@endsection


@section('contentheader_description')
    tower - or group of AP 's
@endsection


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"/>

@section('page-name')
    Wireless Point's
@endsection


@section('main-content')
    @include('adminlte::layouts.partials.notifications')
    @include('adminlte::layouts.partials.pageheader')
    <a href="towers/create"  class="btn btn-info btn-sm pull-right">New Tower</a>
    <br>
    <br>
    <div class="box-body">
        <table id="data" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Wireliss Point</th>
                <th>Agent / Admin</th>
                <th>Location</th>
                <th>Statistics</th>
                <th>Alerts</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
                <th>Wireliss Point</th>
                <th>Agent / Admin</th>
                <th>Location</th>
                <th>Statistics</th>
                <th>Alerts</th>
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
            "searching": false,
            "iDisplayLength": 50,
            "lengthMenu": [ 5,10, 25, 50, 75, 100 ],
            "lengthChange": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "paging": true,
            "ajax": '{{ url('isp-cpanel/towers/tower-table') }}',
            "columns": [
                {data: 'title', name: 'title', orderable: false, searchable: true, class: 'text-center'},
                {data: 'agent', name: 'agent', orderable: false, searchable: true, class: 'text-center'},
                {data: 'location', name: 'location', orderable: false, searchable: true},
                {data: 'statistics', name: 'statistics', orderable: false, searchable: true},
                {
                    data: 'alert',
                    name: 'alert',
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
