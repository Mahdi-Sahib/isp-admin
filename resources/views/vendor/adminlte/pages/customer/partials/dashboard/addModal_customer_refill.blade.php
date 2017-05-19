<div class="modal fade" id="addModal_customer_refill" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" > <label class="fa fa-money"></label> Refill</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('isp-cpanel/customer/customer_refill') }}" method="post">
                    {{ csrf_field() }}
                    <input id="x" name="customer_id" hidden>
                    <div class="form-group">
                        <div class="form-group">
                            <label><div class="fa fa-credit-card"></div> Card Name / Type : </label>
                            @if ( count($refills) < 1 ) <br> <p style="color: red">you didn't add devices go to settings -> BASIC INPUT -> devices </p>  @else
                                <select name="refill_card_id" class="form-control">
                                    @foreach ($refills as $refill)
                                        <option value="{{ $refill->id }}" >{{ $refill->title .' - ' .'[ ' . number_format( $refill->selling_price / 1, 0) . '  ]'}}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>

                        <div class="form-group">
                            <label> <div class="fa fa-money" ></div> UnPaid:</label>
                            <div class="input-group">
                        <span class="input-group-addon">
                          <input id="checkbox" type="checkbox" name="payment_status" onclick="calc()" value="1">
                        </span>
                                <input id="amount_paid" type="text" class="form-control" name="amount_paid" placeholder="amount paid / empty if no amount" disabled="disabled">
                            </div>
                        </div>

                        <div class="form-group">
                            <label> <div class="fa fa-user" ></div> By Person:</label>
                            <input type="text" class="form-control" id="by_person" name="by_person">
                        </div>
                        <div class="form-group">
                            <label> <div class="fa fa-comment-o" ></div> Description:</label>
                            <input type="text" class="form-control" id="description" name="description">
                        </div>

                        <br>
                        <button type="submit" id="submit_refill" class="btn btn-success" ><i class="fa fa-btn fa-money" ></i> Refill</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addModal_customer_debt_repaymentx" role="dialog">
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
                    <div class="form-group">
                        <label><div class="fa fa-gears"></div> Card Name / Type : </label>
                            <select name="refill_card_id" class="form-control">
                                @foreach ($refillCustomer as $unpaid)
                                    <option value="{{ $unpaid->id }}" > <i [ Card Price {{  $unpaid->card_price }} ] ></i>UnPaid Amount {{  $unpaid->card_price - $unpaid->amount_paid }}</option>
                                @endforeach
                            </select>
                    </div>
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
                            <button type="submit" id="refill_repayment" class="btn btn-success"><i class="fa fa-btn fa-ticket"></i> I,m {{ Auth::User()->name }} and I receved the Remaining amount</button>
                        </div>
                    </div>
                    <br>
                </div>
                <input type="hidden" id="edit_id_refill" name="edit_id_refill">
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" id="submit_repayment" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>