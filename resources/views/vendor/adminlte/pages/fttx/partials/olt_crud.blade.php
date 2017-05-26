<button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addModal">Add New OLT</button>
<br>
<br>
<input type="hidden" name="hidden_view" id="hidden_view" value="{{url('isp-cpanel/fttx/olt/view')}}">
<input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('isp-cpanel/fttx/olt/delete')}}">
<!-- Add Modal start -->
<div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New OLT</h4>
            </div>

            <div class="modal-body">
                <form action="{{ url('isp-cpanel/fttx/olt') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <br>
                        <div class="row">
                                    <div class="col-lg-9">
                                <div class="form-group">
                                    <label for="brand">Title:</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                                    </div>
                                    <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="brand_model">Number / Sign:</label>
                                    <input type="text" class="form-control" id="number_sign" name="number_sign">
                                </div>
                                    </div>
                        </div>

                        <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label><div class="fa fa-gears"></div> OLT Type:</label>
                                        <select id="type" name="type" class="form-control">
                                            @foreach (olt_type() as $key => $value) {
                                            <option value="{!! $key !!}">{!! $value !!}</option>
                                            }
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="brand_model"> Brand:</label>
                                        <input type="text" class="form-control" id="brand" name="brand">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="brand_model"> Model:</label>
                                        <input type="text" class="form-control" id="model" name="model">
                                    </div>
                                </div>
                        </div>

                        <div class="row">
                           <div class="col-lg-4">
                            <div class="form-group">
                                <label>Adaptor Type:</label>
                                <select id="type" name="adaptor_type" class="form-control">
                                    @foreach (adaptor_type() as $key => $value) {
                                    <option value="{!! $key !!}">{!! $value !!}</option>
                                    }
                                    @endforeach
                                </select>
                            </div>
                           </div>
                            <div class="col-lg-4">
                            <div class="form-group">
                                <label for="brand">PON Count:</label>
                                <input type="text" class="form-control" id="pon_count" name="pon_count">
                            </div>
                            </div>
                        </div>
                            <hr>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Splitting Method:</label>
                                    <select id="splitting_method" name="splitting_method" class="form-control">
                                        @foreach (splitting_method() as $key => $value) {
                                        <option value="{!! $key !!}">{!! $value !!}</option>
                                        }
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Splitting Level:</label>
                                    <select id="splitting_level" name="splitting_level" class="form-control">
                                        @foreach (splitting_level() as $key => $value) {
                                        <option value="{!! $key !!}">{!! $value !!}</option>
                                        }
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Level (1) Ratio:</label>
                                    <select id="splitting_ratio_level_1" name="splitting_ratio_level_1" class="form-control">
                                        @foreach (splitting_ratio_level() as $key => $value) {
                                        <option value="{!! $key !!}">{!! $value !!}</option>
                                        }
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Level (2) Ratio:</label>
                                    <select id="splitting_ratio_level_2" name="splitting_ratio_level_2" class="form-control">
                                        @foreach (splitting_ratio_level() as $key => $value) {
                                        <option value="{!! $key !!}">{!! $value !!}</option>
                                        }
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                            <hr>
                        <div class="form-group">
                            <label for="brand">location:</label>
                            <input type="text" class="form-control" id="location" name="location">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info">This new OLT</button>
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
                <h4 class="modal-title"> OLT : </h4>
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
                            <td><span  id="view_title"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-question-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Phone :</td>
                            <td><span id="view_type"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Email :</td>
                            <td><span id="view_number_sign"  ></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Address :</td>
                            <td><span id="view_adaptor_typ"  ></span></td>
                        </tr>                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Contact :</td>
                            <td><span id="view_accommodate"  ></span></td>
                        </tr>                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Website :</td>
                            <td><span id="view_brand"  ></span></td>
                        </tr>                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Bank Account :</td>
                            <td><span id="view_model"  ></span></td>
                        </tr>                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Currency :</td>
                            <td><span id="view_splitting_level"  ></span></td>
                        </tr>                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Payment Terms :</td>
                            <td><span id="view_splitting_ratio"  ></span></td>
                        </tr>
                        </tr>                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Tax Included :</td>
                            <td><span id="view_max_splitting_ratio"  ></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Created at :</td>
                            <td><span id="view_pon_count"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Last Update at :</td>
                            <td><span id="view_location"></span></td>
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
                <form action="{{ url('isp-cpanel/fttx/olt/edit') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="form-group">
                            <label>title :</label>
                            <input type="text" class="form-control" id="edit_title" name="name">
                        </div>
                        <div class="form-group">
                            <label>type :</label>
                            <input type="text" class="form-control" id="edit_type" name="phone">
                        </div>
                        <div class="form-group">
                            <label>number_sign :</label>
                            <input type="text" class="form-control" id="edit_number_sign" name="email">
                        </div>
                        <div class="form-group">
                            <label>adaptor_type :</label>
                            <input type="text" class="form-control" id="edit_adaptor_type" name="address">
                        </div>
                        <div class="form-group">
                            <label>Contact :</label>
                            <input type="text" class="form-control" id="edit_accommodate" name="contact">
                        </div>
                        <div class="form-group">
                            <label>accommodate :</label>
                            <input type="text" class="form-control" id="edit_brand" name="website">
                        </div>
                        <div class="form-group">
                            <label>model :</label>
                            <input type="text" class="form-control" id="edit_model" name="bank_account">
                        </div>
                        <div class="form-group">
                            <label>splitting_level :</label>
                            <input type="text" class="form-control" id="edit_splitting_level" name="currency">
                        </div>
                        <div class="form-group">
                            <label>splitting_ratio :</label>
                            <input type="text" class="form-control" id="edit_splitting_ratio" name="payment_terms">
                        </div>
                        <div class="form-group">
                            <label>Tax Included :</label>
                            <input type="text" class="form-control" id="edit_max_splitting_ratio" name="tax_included">
                        </div>
                        <div class="form-group">
                            <label>max_splitting_ratio :</label>
                            <input type="text" class="form-control" id="edit_max_splitting_ratio" name="tax_included">
                        </div>
                        <div class="form-group">
                            <label>pon_count :</label>
                            <input type="text" class="form-control" id="edit_pon_count" name="tax_included">
                        </div>
                        <div class="form-group">
                            <label>location :</label>
                            <input type="text" class="form-control" id="edit_location" name="tax_included">
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
