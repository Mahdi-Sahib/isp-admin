<div class="box-body">
    <button type="button" class="btn btn-warning btn-sm pull-right" data-toggle="modal" data-target="#addModal_customer_refill" onclick="fun_get_id('{{ $customer->id }}')"><i class="fa fa-btn fa-ticket"></i> Refill</button>
    <br>
    <br>
    <div>
        <table id="refill_table" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Card Type</th>
                <th>Payment Status</th>
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
                <th>Payment Status</th>
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

<input type="hidden" name="hidden_view_refill" id="hidden_view_refill" value="{{url('isp-cpanel/customer/customer_ticket/view')}}">
<input type="hidden" name="hidden_view_refill" id="hidden_view_refill" value="{{url('isp-cpanel/customer/customer_ticket/close_ticket')}}">




<!-- Edit Modal start -->
<div class="modal fade" id="close_message" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Close Ticket</h4>
            </div>
            <div class="modal-body">
                {!! Form::open( ['url' => 'isp-cpanel/customer/customer_ticket/close_ticket' , 'method' => 'post']) !!}
                {{ csrf_field() }}
                <div class="form-group">
                    <label><div class="fa fa-commenting"></div> Message :</label>
                    <textarea id="" type="text" rows="5"  class="form-control"  name="close_message"> </textarea>
                </div>
                <button type="submit" class="btn btn-default">Close Ticket</button>
                <input type="hidden" id="edit_id_ticket" name="edit_id_ticket">
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
