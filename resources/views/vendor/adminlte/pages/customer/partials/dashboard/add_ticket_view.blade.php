<div class="modal fade" id="addModal_tower_ticket" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" > <label class="fa fa-ticket"></label> Open new ticket</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('isp-cpanel/customers/customer_ticket/add') }}" method="post">
                    {{ csrf_field() }}
                    <input id="z" name="customer_id" hidden>
                    <div class="form-group">
                        <label><div class="fa fa-commenting"></div> Message :</label>
                        <textarea type="text" rows="5"  class="form-control"  name="message"> </textarea>
                    </div>
                    <input id="category"  name="category"  value="1" hidden>

                    <br>
                    <button type="submit" class="btn btn-warning">
                        <i class="fa fa-btn fa-ticket"></i> Open Ticket
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>