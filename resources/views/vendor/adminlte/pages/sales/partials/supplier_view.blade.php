@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif
<button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addModal">Add new Supplier</button>
<br>
<br>
<div class="box-bod" >
    <table id="data" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $x)
            <tr>
                <td>{{$x -> name}}</td>
                <td>{{$x -> phone}}</td>
                <td>{{$x -> email}}</td>
                <td>
                    <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="fun_view('{{$x -> id}}')">View</button>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="fun_edit('{{$x -> id}}')">Edit</button>
                  <!--  <button class="btn btn-danger" onclick="fun_delete('{{$x -> id}}')">Delete</button> -->
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        </tfoot>
    </table>
</div>
<input type="hidden" name="hidden_view" id="hidden_view" value="{{url('isp-cpanel/financial/supplier/view')}}">
<input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('isp-cpanel/financial/supplier/delete')}}">
<!-- Add Modal start -->
<div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Supplier</h4>
            </div>

            <div class="modal-body">
                <form action="{{ url('isp-cpanel/financial/supplier') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <br>
                        <div class="form-group">
                            <label for="brand_model">Name:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="brand_model">Phone:</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="brand_model">Email:</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="brand_model">Address:</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>                        <div class="form-group">
                            <label for="brand_model">Contact:</label>
                            <input type="text" class="form-control" id="contact" name="contact">
                        </div>
                        <div class="form-group">
                            <label for="brand_model">Website:</label>
                            <input type="text" class="form-control" id="website" name="website">
                        </div>
                        <div class="form-group">
                            <label for="brand_model">Bank Account:</label>
                            <input type="text" class="form-control" id="bank_account" name="bank_account">
                        </div>
                        <div class="form-group">
                            <label for="brand">Currency:</label>
                            <input type="text" class="form-control" id="currency" name="currency">
                        </div>
                        <div class="form-group">
                            <label for="brand">Payment Terms:</label>
                            <input type="text" class="form-control" id="payment_terms" name="payment_terms">
                        </div>
                        <div class="form-group">
                            <label for="brand">Tax Included:</label>
                            <input type="text" class="form-control" id="tax_included" name="tax_included">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info">This new Supplier</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!-- add code ends -->

<!-- View Modal start -->
<div class="modal fade " id="viewModal" role="dialog">e
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
                            <td> <label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Name :</td>
                            <td><span  id="view_name"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-question-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Phone :</td>
                            <td><span id="view_phone"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Email :</td>
                            <td><span id="view_email"  ></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Address :</td>
                            <td><span id="view_address"  ></span></td>
                        </tr>                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Contact :</td>
                            <td><span id="view_contact"  ></span></td>
                        </tr>                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Website :</td>
                            <td><span id="view_website"  ></span></td>
                        </tr>                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Bank Account :</td>
                            <td><span id="view_status"  ></span></td>
                        </tr>                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Currency :</td>
                            <td><span id="view_currency"  ></span></td>
                        </tr>                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Payment Terms :</td>
                            <td><span id="view_payment_terms"  ></span></td>
                        </tr>
                        </tr>                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Tax Included :</td>
                            <td><span id="view_tax_included"  ></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Created at :</td>
                            <td><span id="view_created_at"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Created by :</td>
                            <td><span id="view_created_by"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Last Update at :</td>
                            <td><span id="view_updated_at"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Last Update by :</td>
                            <td><span id="view_updated_by"></span></td>
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
<!-- view modal ends -->

<!-- Edit Modal start -->
<div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit this Supplier</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('isp-cpanel/financial/supplier/update') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="form-group">
                            <label for="edit_brand_model">Name :</label>
                            <input type="text" class="form-control" id="edit_name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="edit_brand_model">Phone :</label>
                            <input type="text" class="form-control" id="edit_phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="edit_brand_model">Email :</label>
                            <input type="text" class="form-control" id="edit_email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="edit_brand_model">Address :</label>
                            <input type="text" class="form-control" id="edit_address" name="address">
                        </div>
                        <div class="form-group">
                            <label for="edit_brand_model">Contact :</label>
                            <input type="text" class="form-control" id="edit_contact" name="contact">
                        </div>
                        <div class="form-group">
                            <label for="edit_brand_model">Website :</label>
                            <input type="text" class="form-control" id="edit_website" name="website">
                        </div>
                        <div class="form-group">
                            <label for="edit_brand_model">Bank Account :</label>
                            <input type="text" class="form-control" id="edit_bank_account" name="bank_account">
                        </div>
                        <div class="form-group">
                            <label for="edit_brand_model">Currency :</label>
                            <input type="text" class="form-control" id="edit_currency" name="currency">
                        </div>
                        <div class="form-group">
                            <label for="edit_brand_model">Payment Terms :</label>
                            <input type="text" class="form-control" id="edit_payment_terms" name="payment_terms">
                        </div>
                        <div class="form-group">
                            <label for="edit_brand_model">Tax Included :</label>
                            <input type="text" class="form-control" id="edit_tax_included" name="tax_included">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default">Update</button>
                    <input type="hidden" id="edit_id" name="edit_id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



