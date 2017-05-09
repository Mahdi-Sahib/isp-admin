@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif
<button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addModal">Add new product</button>
<br>
<br>
<div class="box-bod" >
    <table id="data" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>title</th>
            <th>cost_price</th>
            <th>selling_price</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $x)
            <tr>
                <td>{{$x -> title}}</td>
                <td>{{$x -> cost_price}}</td>
                <td>{{$x -> selling_price}}</td>
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
            <th>title</th>
            <th>cost_price</th>
            <th>selling_price</th>
            <th>Actions</th>
        </tr>
        </tfoot>
    </table>
</div>
<input type="hidden" name="hidden_view" id="hidden_view" value="{{url('isp-cpanel/financial/product/view')}}">
<input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('isp-cpanel/financial/product/delete')}}">

<!-- Add Modal start -->
<div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add product</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('isp-cpanel/financial/product') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <br>
                        <div class="form-group">
                            <label for="brand_model">title:</label>
                            <input type="text" class="form-control" id="name" name="title">
                        </div>
                        <div class="form-group">
                            <label for="brand_model">price:</label>
                            <input type="text" class="form-control" id="phone" name="price">
                        </div>
                        <div class="form-group">
                            <label for="brand_model">description:</label>
                            <input type="text" class="form-control" id="email" name="description">
                        </div>
                        <div class="form-group">
                            <label for="brand_model">thumb:</label>
                            <input type="text" class="form-control" id="address" name="thumb">
                        </div>                        <div class="form-group">
                            <label for="brand_model">image:</label>
                            <input type="text" class="form-control" id="contact" name="image">
                        </div>
                        <div class="form-group">
                            <label for="brand_model">code:</label>
                            <input type="text" class="form-control" id="website" name="code">
                        </div>
                        <div class="form-group">
                            <label for="brand_model">currency:</label>
                            <input type="text" class="form-control" id="bank_account" name="currency">
                        </div>
                        <div class="form-group">
                            <label for="brand">cost_price:</label>
                            <input type="text" class="form-control" id="currency" name="cost_price">
                        </div>
                        <div class="form-group">
                            <label for="brand">selling_price:</label>
                            <input type="text" class="form-control" id="payment_terms" name="selling_price">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info">This new product</button>
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

