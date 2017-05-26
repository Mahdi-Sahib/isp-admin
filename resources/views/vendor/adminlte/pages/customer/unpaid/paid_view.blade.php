<div class="modal fade" id="addModal_repayment" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" > <label class="fa fa-ticket"></label> Debt Repayment</h4>
            </div>
            <div class="modal-body">
                {!! Form::open( ['url' => 'isp-cpanel/customer/debt_repayment' , 'method' => 'post']) !!}
                {{ csrf_field() }}
                <input id="x" name="customer_id" hidden>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-5">
                            <label>Refill By:</label>
                            <input id="edit_created_by" type="text" class="form-control" readonly>
                        </div>
                        <div class="col-xs-7">
                            <label>Refill Date:</label>
                            <input id="edit_created_at" type="text" class="form-control" placeholder="Unknown" readonly>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-3">
                            <label>Received Amount:</label>
                            <input id="edit_amount_paid" type="text" class="form-control" placeholder="Unknown" readonly>
                        </div>
                        <div class="col-xs-4">
                            <label>By Person:</label>
                            <input id="edit_by_person" type="text" class="form-control" placeholder="Unknown" readonly>
                        </div>
                        <div class="col-xs-5">
                            <label>Elapsed Time:</label>
                            <input id="" type="text" class="form-control" placeholder="Unknown" readonly>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xs-12">
                            <label>Description:</label>
                            <input id="edit_description" type="text" class="form-control"  readonly>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-3">
                            <label>Paid Amount:</label>
                            <input id="edit_by_remaining" type="text" class="form-control" readonly>
                        </div>
                        <div class="col-xs-3">
                            <label>&nbsp</label>
                            <button type="submit" class="btn btn-warning"><i class="fa fa-btn fa-ticket"></i> I,m {{ Auth::User()->name }} and I receved the Remaining amount</button>
                        </div>
                    </div>
                    <br>
                </div>
                <input type="hidden" id="edit_id_refill" name="edit_id_refill">
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>