<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
<!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <!-- 
    	The codes are free, but we require linking to our web site.
    	Why to Link?
    	A true story: one girl didn't set a link and had no decent date for two years, and another guy set a link and got a top ranking in Google! 
    	Where to Put the Link?
    	home, about, credits... or in a good page that you want
    	THANK YOU MY FRIEND!
    -->
    <title>Nice modal - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        .modal-content {
            -webkit-border-radius: 0;
            -webkit-background-clip: padding-box;
            -moz-border-radius: 0;
            -moz-background-clip: padding;
            border-radius: 6px;
            background-clip: padding-box;
            -webkit-box-shadow: 0 0 40px rgba(0,0,0,.5);
            -moz-box-shadow: 0 0 40px rgba(0,0,0,.5);
            box-shadow: 0 0 40px rgba(0,0,0,.5);
            color: #000;
            background-color: #fff;
            border: rgba(0,0,0,0);
        }
        .modal-message .modal-dialog {
            width: 300px;
        }
        .modal-message .modal-body, .modal-message .modal-footer, .modal-message .modal-header, .modal-message .modal-title {
            background: 0 0;
            border: none;
            margin: 0;
            padding: 0 20px;
            text-align: center!important;
        }

        .modal-message .modal-title {
            font-size: 17px;
            color: #737373;
            margin-bottom: 3px;
        }

        .modal-message .modal-body {
            color: #737373;
        }

        .modal-message .modal-header {
            color: #fff;
            margin-bottom: 10px;
            padding: 15px 0 8px;
        }
        .modal-message .modal-header .fa,
        .modal-message .modal-header
        .glyphicon, .modal-message
        .modal-header .typcn, .modal-message .modal-header .wi {
            font-size: 30px;
        }

        .modal-message .modal-footer {
            margin: 25px 0 20px;
            padding-bottom: 10px;
        }

        .modal-backdrop.in {
            zoom: 1;
            filter: alpha(opacity=75);
            -webkit-opacity: .75;
            -moz-opacity: .75;
            opacity: .75;
        }
        .modal-backdrop {
            background-color: #fff;
        }
        .modal-message.modal-success .modal-header {
            color: #53a93f;
            border-bottom: 3px solid #a0d468;
        }

        .modal-message.modal-info .modal-header {
            color: #57b5e3;
            border-bottom: 3px solid #57b5e3;
        }

        .modal-message.modal-danger .modal-header {
            color: #d73d32;
            border-bottom: 3px solid #e46f61;
        }

        .modal-message.modal-warning .modal-header {
            color: #f4b400;
            border-bottom: 3px solid #ffce55;
        }


    </style>
</head>
<body>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<div class="buttons-preview">
    <button class="btn btn-success" data-toggle="modal" data-target="#modal-success">Success</button>
    <button class="btn btn-info" data-toggle="modal" data-target="#modal-info">Info</button>
    <button class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">Danger</button>
    <button class="btn btn-warning" data-toggle="modal" data-target="#modal-warning">Warning</button>
</div>

<!--Success Modal Templates-->
<div id="modal-success" class="modal modal-message modal-success fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="glyphicon glyphicon-check"></i>
            </div>
            <div class="modal-title">Success</div>
            <div class="modal-body">You have done great!</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
            </div>
        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div>
<!--End Success Modal Templates-->
<!--Info Modal Templates-->
<div id="modal-info" class="modal modal-message modal-info fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fa fa-envelope"></i>
            </div>
            <div class="modal-title">Alert</div>

            <div class="modal-body">You'vd got mail!</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">OK</button>
            </div>
        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div>
<!--End Info Modal Templates-->
<!--Danger Modal Templates-->
<div id="modal-danger" class="modal modal-message modal-danger fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="glyphicon glyphicon-fire"></i>
            </div>
            <div class="modal-title">Alert</div>

            <div class="modal-body">You'vd done bad!</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
            </div>
        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div>
<!--End Danger Modal Templates-->
<!--Danger Modal Templates-->
<div id="modal-warning" class="modal modal-message modal-warning fade" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fa fa-warning"></i>
            </div>
            <div class="modal-title">Warning</div>

            <div class="modal-body">Is something wrong?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">OK</button>
            </div>
        </div> <!-- / .modal-content -->
    </div> <!-- / .modal-dialog -->
</div>
<!--End Danger Modal Templates-->

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript">

</script>
</body>
</html>