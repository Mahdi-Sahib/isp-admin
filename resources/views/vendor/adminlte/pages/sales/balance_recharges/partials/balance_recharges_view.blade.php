
    <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addModal">Recharge Balance</button>
<br>
<br>
    <table id="data" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Supplier</th>
            <th>Amount</th>
            <th>Created by</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
        <tfoot>
        <tr>
            <th>Supplier</th>
            <th>Amount</th>
            <th>Created by</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        </tfoot>
    </table>


<input type="hidden" name="hidden_view" id="hidden_view" value="{{url('isp-cpanel/settings/devices/view')}}">
<input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('isp-cpanel/settings/devices/delete')}}">
<!-- Add Modal start -->
<div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Recharge Balance</h4>
            </div>

            <div class="modal-body">
                <form action="{{ url('isp-cpanel/financial/balance_recharges') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="form-group">
                            <label> Supplier : </label>
                            @if ( count($suppliers) < 1 ) <br> <p style="color: red">you didn't add devices go to settings -> BASIC INPUT -> devices </p>  @else
                                <select name="supplier_id" class="form-control" value="{{ old('device_id') }}">
                                    @foreach ($suppliers as $supplier)
                                        <option value="{!! $supplier->id !!}" >{!! $supplier->name !!}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="brand">Amount:</label>
                            <input type="text" class="form-control" id="amount" name="amount">
                        </div>
                        <div class="form-group">
                            <label for="brand">Supplier Invoice No.:</label>
                            <input type="text" class="form-control" id="supplier_invoice_no" name="supplier_invoice_no">
                        </div>
                        <div class="form-group">
                            <label for="brand">Description:</label>
                            <input type="text" class="form-control" id="amount" name="description">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info">Recharge Now</button>
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
                            </tr>                        <tr>
                                <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                                <td> product_categorie :</td>
                                <td><span id="view_product_categorie"  ></span></td>
                            </tr>
                            </tr>                        <tr>
                                <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                                <td> supplier_id :</td>
                                <td><span id="view_supplier_id"  ></span></td>
                            </tr>
                            <tr>
                                <td> <label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                                <td> title :</td>
                                <td><span  id="view_title"></span></td>
                            </tr>
                            <tr>
                                <td><label  class="glyphicon glyphicon-question-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                                <td> price :</td>
                                <td><span id="view_price"></span></td>
                            </tr>
                            <tr>
                                <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                                <td> description :</td>
                                <td><span id="view_description"  ></span></td>
                            </tr>
                            <tr>
                                <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                                <td> thumb :</td>
                                <td><span id="view_thumb"  ></span></td>
                            </tr>                        <tr>
                                <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                                <td> image :</td>
                                <td><span id="view_image"  ></span></td>
                            </tr>                        <tr>
                                <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                                <td> code :</td>
                                <td><span id="view_code"  ></span></td>
                            </tr>                        <tr>
                                <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                                <td> currency :</td>
                                <td><span id="view_currency"  ></span></td>
                            </tr>                        <tr>
                                <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                                <td> cost_price :</td>
                                <td><span id="view_cost_price"  ></span></td>
                            </tr>                        <tr>
                                <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                                <td> selling_price :</td>
                                <td><span id="view_selling_price"  ></span></td>
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
                    <h4 class="modal-title">Edit this product</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ url('isp-cpanel/financial/product/update') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="form-group">
                                <label for="edit_brand_model">title :</label>
                                <input type="text" class="form-control" id="Edit_title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="brand_model">price:</label>
                                <input type="text" class="form-control" id="Edit_price" name="price">
                            </div>
                            <div class="form-group">
                                <label for="brand_model">description:</label>
                                <input type="text" class="form-control" id="Edit_description" name="description">
                            </div>
                            <div class="form-group">
                                <label for="brand_model">thumb:</label>
                                <input type="text" class="form-control" id="Edit_thumb" name="thumb">
                            </div>
                            <div class="form-group">
                                <label for="brand_model">image:</label>
                                <input type="text" class="form-control" id="Edit_image" name="image">
                            </div>
                            <div class="form-group">
                                <label for="brand_model">code:</label>
                                <input type="text" class="form-control" id="Edit_code" name="code">
                            </div>
                            <div class="form-group">
                                <label for="brand_model">currency:</label>
                                <input type="text" class="form-control" id="Edit_currency" name="currency">
                            </div>
                            <div class="form-group">
                                <label for="Edit_cost_price">cost_price:</label>
                                <input type="text" class="form-control" id="Edit_cost_price" name="cost_price">
                            </div>
                            <div class="form-group">
                                <label for="Edit_selling_price">selling_price:</label>
                                <input type="text" class="form-control" id="Edit_selling_price" name="selling_price">
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
