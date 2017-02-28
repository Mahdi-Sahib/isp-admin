@if ($message = Session::get('message_broadcast'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@include('adminlte::layouts.partials.notifications')

<button type="button" class="btn btn-warning btn-sm pull-right" data-toggle="modal" data-target="#addModal">Something Happened</button>
<br>
<br>

    <table id="ticket_table" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>title</th>
            <th>category</th>
            <th>Created by</th>
            <th>Status</th>
            <th>Options</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
        <tfoot>
        <tr>
            <th>#</th>
            <th>title</th>
            <th>category</th>
            <th>Created by</th>
            <th>Status</th>
            <th>Options</th>
        </tr>
        </tfoot>
    </table>
