<div class="box-body">
    <button type="button" class="btn btn-warning btn-sm pull-right" data-toggle="modal" data-target="#addModal_refill" onclick="fun_get_id('{{ $customer->id }}')"><i class="fa fa-btn fa-ticket"></i> Refill</button>
    <br>
    <br>
    <div>
        <table id="refill_table" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Card Type</th>
                <th>Status</th>
                <th>Amount Paid</th>
                <th>By Person</th>
                <th>Refill By</th>
                <th>Date</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
                <th>Card Type</th>
                <th>Status</th>
                <th>Amount Paid</th>
                <th>By Person</th>
                <th>Refill By</th>
                <th>Date</th>
                <th>Options</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>