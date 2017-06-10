<!-- refill -->
<div class="modal fade" id="addModal_refill" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" > <label class="fa fa-money"></label> Refill</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('isp-cpanel/customers/customer_refill') }}" method="post">
                    {{ csrf_field() }}
                    <input id="x" name="customer_id" hidden>
                    <div class="form-group">
                        <div class="form-group">
                            <label><div class="fa fa-gears"></div> Card Name / Type : </label>
                            @if ( count($refills) < 1 ) <br> <p style="color: red">you didn't add devices go to settings -> BASIC INPUT -> devices </p>  @else
                                <select name="refill_card_id" class="form-control">
                                    @foreach ($refills as $refill)
                                        <option value="{{ $refill->id }}" ><div>{{ $refill->title }}</div>   -    <span id="selling_price">{{ number_format( $refill->selling_price / 1, 0) }}</span></option>
                                    @endforeach
                                </select>
                            @endif
                        </div>

                        <div class="form-group">
                            <label> <div class="fa fa-gears" ></div> UnPaid:</label>
                            <div class="input-group">
                        <span class="input-group-addon">
                          <input id="checkbox" type="checkbox" name="payment_status" onclick="calc()" value="1">
                        </span>
                                <input type="tel" id="amount_paid" class="form-control"  name="amount_paid" placeholder="amount paid / empty if no amount" disabled="disabled">
                            </div>
                        </div>

                        <div class="form-group">
                            <label> <div class="fa fa-gears" ></div> By Person:</label>
                            <input type="text" class="form-control" id="by_person" name="by_person" maxlength="20">
                        </div>
                        <div class="form-group">
                            <label> <div class="fa fa-gears" ></div> Description:</label>
                            <input type="text" class="form-control" id="description" name="description" maxlength="60">
                        </div>

                        <br>
                        <button type="submit" id="submit_refill" class="btn btn-success"><i class="fa fa-btn fa-money"></i> Refill</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>