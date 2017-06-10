<script type="text/javascript">
    $(document).ready(function () {
        $("#wireless").hide();
        $("#fttx").hide();
        $("#lan").hide();
        $('#connection_method_id').on('change', function () {
            if (this.value === '1') {
                $("#wireless").show();
                $("#fttx").hide();
                $("#lan").hide();
            }
            else if (this.value === '3') {
                $("#fttx").show();
                $("#wireless").hide();
                $("#lan").hide();
            }
            else if (this.value === '2') {
                $("#fttx").hide();
                $("#wireless").hide();
                $("#lan").show();
            }
            else if (this.value === '0') {
                $("#fttx").hide();
                $("#wireless").hide();
                $("#lan").hide();
            }
        });
    });
</script>