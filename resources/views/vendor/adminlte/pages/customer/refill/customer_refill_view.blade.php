@if ($message = Session::get('message_ip'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

<!-- Table -->
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



<!-- refill -->
<div class="modal fade" id="addModal_refill" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" > <label class="fa fa-ticket"></label> Refill</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('isp-cpanel/customer/customer_refill') }}" method="post">
                    {{ csrf_field() }}
                    <input id="x" name="customer_id" hidden>
                    <div class="form-group">
                        <div class="form-group">
                            <label><div class="fa fa-gears"></div> Card Name / Type : </label>
                            @if ( count($refills) < 1 ) <br> <p style="color: red">you didn't add devices go to settings -> BASIC INPUT -> devices </p>  @else
                                <select name="refill_card_id" class="form-control">
                                    @foreach ($refills as $refill)
                                        <option value="{{ $refill->id }}" >{{ $refill->title .' - ' .'[ ' . number_format( $refill->selling_price / 1, 0) . '  ]'}}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>

                        <div class="form-group">
                            <label> <div class="fa fa-gears" ></div> UnPaid:</label>
                            <div class="input-group">
                        <span class="input-group-addon">
                          <input id="checkbox" type="checkbox" name="payment_status" value="1">
                        </span>
                                <input id="amount_paid" type="text" class="form-control" name="amount_paid" placeholder="amount paid / empty if no amount" disabled="disabled">
                            </div>
                        </div>

                        <div class="form-group">
                            <label> <div class="fa fa-gears" ></div> By Person:</label>
                            <input type="text" class="form-control" id="by_person" name="by_person">
                        </div>
                        <div class="form-group">
                            <label> <div class="fa fa-gears" ></div> Description:</label>
                            <input type="text" class="form-control" id="description" name="description">
                        </div>

                    <br>
                    <button type="submit" class="btn btn-warning"><i class="fa fa-btn fa-ticket"></i> Refill</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="hidden_view_refill" id="hidden_view_refill" value="{{url('isp-cpanel/customer/customer_refill/view')}}">
<!-- view -->
<div class="modal fade " id="viewModal_refill_view" role="dialog">e
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"> Ticket : </h4>
            </div>
            <div class="box">
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <tbody>
                        <tr class="warning">
                            <th><label class="glyphicon glyphicon-hand-right" style=" font-size: 22px;"></label></th>
                            <th>Label</th>
                            <th>Value</th>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Card Name / Type :</td>
                            <td><span id="view_refill_card_id"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Payment Status :</td>
                            <td><span id="view_payment_status"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Card Price :</td>
                            <td><span id="view_card_price"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Amount Paid :</td>
                            <td><span id="view_amount_paid"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Description :</td>
                            <td><span id="view_description"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> By Person :</td>
                            <td><span id="view_by_person"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Refill By :</td>
                            <td><span id="view_created_by"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Paid By :</td>
                            <td><span id="view_updated_by"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> created_at :</td>
                            <td><span id="view_created_at"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> updated_at :</td>
                            <td><span id="view_updated_at"></span></td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Dismiss</button>
            </div>
        </div>
    </div>
</div>

<!-- repayment -->
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