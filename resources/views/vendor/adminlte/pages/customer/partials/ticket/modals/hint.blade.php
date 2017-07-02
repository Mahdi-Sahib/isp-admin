<div class="modal fade" id="addModal_hint" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" > <label class="fa fa-ticket"></label> Add Hint</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('isp-cpanel/customers/customer_ticket/hint') }}" method="post" onsubmit="document.getElementById('submit_hint').disabled=true;
document.getElementById('submit_hint').value='Submitting, please wait...';">
                    {{ csrf_field() }}
                    <input id="f" name="customer_id" hidden>
                    @if (isset($customer))
                        <input id="customer_id"  name="customer_id"  value="{{ $customer->id }}" hidden>
                    @endif
                    <div class="form-group">
                        <label><div class="fa fa-commenting"></div> Message :</label>
                        <textarea type="text" rows="5"  class="form-control"  name="message"> </textarea>
                    </div>
                    <input id="category"  name="category"  value="1" hidden>

                    <br>
                    <button type="submit" id="submit" class="btn btn-warning">
                        <i class="fa fa-btn fa-ticket"></i> Add Hint
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="submit_hint" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>