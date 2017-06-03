<script type="text/javascript">
    $(document).ready(function () {
        $("#wireless").hide();
        $("#fiber").hide();
        $("#lan").hide();
        $('#connection_method').on('change', function () {
            if (this.value == '1') {
                $("#wireless").show();
                $("#fiber").hide();
                $("#lan").hide();
            }
            else if (this.value == '3') {
                $("#fiber").show();
                $("#wireless").hide();
                $("#lan").hide();
            }
            else if (this.value == '2') {
                $("#fiber").hide();
                $("#wireless").hide();
                $("#lan").show();
            }
            else if (this.value == '0') {
                $("#fiber").hide();
                $("#wireless").hide();
                $("#lan").hide();
            }
        });
    });
</script>