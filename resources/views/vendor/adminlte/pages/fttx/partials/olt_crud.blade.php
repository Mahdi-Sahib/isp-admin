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
                                    <label>Level (1) Ratio :</label>
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
                            <td> Title :</td>
                            <td><span  id="view_title"></span></td>
                        </tr>
                        <tr>
                            <td> <label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Device :</td>
                            <td><span  id="view_device_id"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-question-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Type :</td>
                            <td><span id="view_type"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Hint :</td>
                            <td><span id="view_number_sign"  ></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Adaptor Type :</td>
                            <td><span id="view_adaptor_type"  ></span></td>
                        </tr>                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Accommodate :</td>
                            <td><span id="view_accommodate"  ></span></td>
                        </tr>                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Brand :</td>
                            <td><span id="view_brand"  ></span></td>
                        </tr>                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Model :</td>
                            <td><span id="view_model"  ></span></td>
                        </tr>                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Splitting Level :</td>
                            <td><span id="view_splitting_level"  ></span></td>
                        </tr>                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Splitting Method:</td>
                            <td><span id="view_splitting_method"  ></span></td>
                        </tr>
                        </tr>                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Level (1) Ratio : :</td>
                            <td><span id="view_splitting_ratio_level_1"  ></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Level (2) Ratio :</td>
                            <td><span id="view_splitting_ratio_level_2"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Pon Number</td>
                            <td><span id="view_pon_count"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Location</td>
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
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit this Supplier</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('olt/edit') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <br>
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <label for="brand">Title:</label>
                                    <input type="text" class="form-control" id="edit_title" name="title">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="brand_model">Number / Hint:</label>
                                    <input type="text" class="form-control" id="edit_number_sign" name="number_sign">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 form-group">
                                <label for="edit_type">
                                    <div class="fa fa-gears"></div>
                                    Olt Type :</label>
                                {!! Form::select("type", olt_type(), null ,['class'=>'form-control','id'=>'edit_type','name'=>'type']) !!}
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="brand_model"> Brand:</label>
                                    <input type="text" class="form-control" id="edit_brand" name="brand">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="brand_model"> Model:</label>
                                    <input type="text" class="form-control" id="edit_model" name="model">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 form-group">
                                <label for="edit_type">
                                    <div class="fa fa-gears"></div>
                                    Adaptor Type:</label>
                                {!! Form::select("adaptor_type", adaptor_type(), null ,['class'=>'form-control','id'=>'edit_adaptor_type','name'=>'adaptor_type']) !!}
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="brand">PON Count:</label>
                                    <input type="text" class="form-control" id="edit_pon_count" name="pon_count">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-3 form-group">
                                <label for="edit_type"><span class="fa fa-gears"></span> Splitting Method :</label>
                                {!! Form::select("splitting_method", splitting_method(), null ,['class'=>'form-control','id'=>'edit_splitting_method','name'=>'splitting_method']) !!}
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="edit_type"><span class="fa fa-gears"></span> Splitting Level :</label>
                                {!! Form::select("splitting_level", splitting_level(), null ,['class'=>'form-control','id'=>'edit_splitting_level','name'=>'splitting_level']) !!}
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="edit_type"><span class="fa fa-gears"></span> Level (1) Ratio :</label>
                                {!! Form::select("splitting_ratio_level", splitting_ratio_level(), null ,['class'=>'form-control','id'=>'edit_splitting_ratio_level_1','name'=>'splitting_ratio_level']) !!}
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="edit_type"><span class="fa fa-gears"></span> Level (2) Ratio :</label>
                                {!! Form::select("splitting_ratio_level", splitting_ratio_level(), null ,['class'=>'form-control','id'=>'edit_splitting_ratio_level_2','name'=>'splitting_ratio_level']) !!}
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="brand">location:</label>
                            <input type="text" class="form-control" id="edit_location" name="location">
                        </div>
                    </div>
                    <input type="hidden" id="edit_id" name="edit_id">
                    <button type="submit" class="btn btn-default">Update</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
