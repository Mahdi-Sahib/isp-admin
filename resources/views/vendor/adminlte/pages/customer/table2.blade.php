@extends('/backend.adminlte.layout.layout')


@section('title')



@endsection



@section('header')

    <!-- DataTables -->

    {!! Html::style('/backend/adminlte/plugins/datatables/dataTables.bootstrap.css') !!}

@endsection


@section('pagetitle')

    <section class="content-header">
        <h1>
            All Customer
            <small>All customer with information</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> @opera</a></li>
            <li><a href="#">{{ Auth::user()->name }}</a></li>
            <li class="active">All Customers</li>
        </ol>
    </section>


@endsection



@section('content')


    <!-- Main content -->
    <section class="content">
        <!-- will be used to show any messages -->
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') . ' by  '  . '( ' . Auth::user()->name . ' )'}} </div>
    @endif




    <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">All customeres</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">




                <!-- /.box-header -->
                <div class="box-body">
                    <table id="customers" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>User Name</th>
                            <th>Mobile</th>

                            <th>SSID</th>
                            <th>Address</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customer as $customer)
                            <tr>
                                <td> {{ $customer->fullname }}  </td>
                                <td> {{ $customer->username }} </td>
                                <td> {{ $customer->mobile_1 }} </td>


                                <td> {{ $customer->broadcast->ssid }} </td>
                                <td> {{ $customer->info->place_1 . " | " . $customer->address_2  }} </td>

                                <td>
                                    <!-- Single button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('admin.customer.show' , $customer->id) }}">View</a></li>
                                            <li><a href="{{ route('admin.customer.edit' , $customer->id) }}">Edit</a></li>
                                            <li><a href="">Config</a></li>
                                            <li><a href="{{ route('admin.customer.destroy' , $customer->id) }}">Delete</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="#">Invoice</a></li>
                                            <li><a href="#">Refill</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Full Name</th>
                            <th>User Name</th>
                            <th>Mobile</th>

                            <th>SSID</th>
                            <th>Address</th>
                            <th>Options</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>


                <!-- /.box-body -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                All Customer
            </div>
            <!-- /.box-footer-->
        </div>


    </section>
    <!-- /.content -->
    </div>

@endsection









@section('footer')

    <!-- DataTables -->
    {!! Html::script('/backend/adminlte/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('/backend/adminlte/plugins/datatables/dataTables.bootstrap.min.js') !!}


    <script>
        $(function () {

            $('#customers').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true
            });
        });
    </script>


@endsection


