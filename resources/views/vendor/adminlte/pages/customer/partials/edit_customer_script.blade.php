<script type="text/javascript">

    $(document).ready(function () {
        $("#wireless").hide();
        $("#fttx").hide();
        $("#lan").hide();
        $('#connection_method').on('change', function () {
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

    $(function(){
        // HTML Text Input allow only Numeric input (mahdi.sahib)
        $('[type=tel]').on('change', function(e) {
            $(e.target).val($(e.target).val().replace(/[^\d\.]/g, ''))
        })
        $('[type=tel]').on('keypress', function(e) {
            keys = ['0','1','2','3','4','5','6','7','8','9','.']
            return keys.indexOf(event.key) > -1
        });
    })

</script>