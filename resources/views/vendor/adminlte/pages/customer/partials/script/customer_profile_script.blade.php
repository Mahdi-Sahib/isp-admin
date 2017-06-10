<script type="text/javascript">
    connection_method = document.getElementById('connection_method');

    if (connection_method.value === '1') {
        $("#wireless").show();
        $("#fttx").hide();
        $("#lan").hide();
    }
    else if (connection_method.value === '3') {
        $("#fttx").show();
        $("#wireless").hide();
        $("#lan").hide();
    }
    else if (connection_method.value === '2') {
        $("#fttx").hide();
        $("#wireless").hide();
        $("#lan").show();
    }
    else if (connection_method.value === '0') {
        $("#fttx").hide();
        $("#wireless").hide();
        $("#lan").hide();
    }
</script>