<input type="hidden" name="hidden_customer_peek" id="hidden_customer_peek" value="{{url('isp-cpanel/customer/customer_peek')}}">
<!-- View Modal start -->
<div class="modal fade " id="viewModal_customer_peek" role="dialog">e
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"> Customer Information </h4>
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
                            <td> Full Name :</td>
                            <td><span  id="view_fullname"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-question-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> PPPOE User :</td>
                            <td><span id="view_username"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> password :</td>
                            <td><span id="view_password"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Mobile :</td>
                            <td><span id="view_mobile_1"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Other Mobile :</td>
                            <td><span id="view_mobile_2"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> Address :</td>
                            <td><span id="view_title"></span></td>
                        </tr>
                        <tr>
                            <td><label  class="glyphicon glyphicon-info-sign" style="color: green ; font-size: 21px;" href="#" class="tooltip-large" data-toggle="tooltip" data-placement="left" title="any sign for hint the broadcast"></label></td>
                            <td> About :</td>
                            <td><span style="color: red " id="view_about"></span></td>
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