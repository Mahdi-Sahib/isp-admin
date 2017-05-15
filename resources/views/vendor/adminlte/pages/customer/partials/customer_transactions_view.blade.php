<!-- Add Modal start -->
<div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Refill Cards</h4>
            </div>
            @if ( count($refillcards) < 1 ) <br> <p style="color: red">you didn't add Supplier <br>  go to settings -> Sales -> Supplier </p>  @else

                <div class="modal-body">
                    <form action="{{ url('isp-cpanel/financial/refill_cards') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="form-group">
                                <label> Supplier : </label>
                                <select name="supplier_id" class="form-control">
                                    @foreach ($refillcards as $refillcard)
                                        <option value="{!! $refillcard->id !!}" >{!! $refillcard->name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="brand">Title:</label>
                                <input type="text" class="form-control"  name="title">
                            </div>
                            <div class="form-group">
                                <label for="brand">Description:</label>
                                <input type="text" class="form-control"  name="description">
                            </div>
                            <input  name="customer_id" value="{{ $customer->id }}" hidden>
                        </div>
                        <button type="submit" class="btn btn-info">Add New Card</button>
                    </form>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
        </div>

    </div>
</div>
<!-- add code ends -->