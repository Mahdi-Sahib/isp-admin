<script type="text/javascript">
    $(function() {
        $("#wireless").hide();
        $("#fttx").hide();
        $("#lan").hide();
        var value = $('#v').val();
        if(value == 0) {
            $("#fttx").hide();
            $("#wireless").hide();
            $("#lan").hide();
        }else if (value == 1){
            $("#wireless").show();
            $("#fttx").hide();
            $("#lan").hide();
        }else if (value == 2){
            $("#fiber").hide();
            $("#wireless").hide();
            $("#lan").show();
        }else if (value == 3){
            $("#fttx").show();
            $("#wireless").hide();
            $("#lan").hide();
        }
    });
</script>