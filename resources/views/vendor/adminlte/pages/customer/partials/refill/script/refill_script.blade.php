<script type="text/javascript">




    $(function(){
        // HTML Text Input allow only Numeric input
        $('[type=tel]').on('change', function(e) {
            $(e.target).val($(e.target).val().replace(/[^\d\.]/g, ''))
        })
        $('[type=tel]').on('keypress', function(e) {
            keys = ['0','1','2','3','4','5','6','7','8','9','.']
            return keys.indexOf(event.key) > -1
        })


        // check if amount_paid > selling_price
        $("#amount_paid, #selling_price").on("keyup", function () {
            var fst=$("#amount_paid").val();
            var sec=$("#selling_price").val();
            if (Number(sec)<Number(fst)) {
                alert("Second value should less than first value");
                return true;
            }
        })

    })

    function fun_get_id(id)
    {
        document.getElementById("x").value = id;
    }



    function calc()
    {
        if (document.getElementById('checkbox').checked)
        {
            document.getElementById('amount_paid').disabled = this.checked;
            document.getElementById('submit_refill').className = 'btn btn-warning';
        } else {
            document.getElementById('amount_paid').disabled = !this.checked;
            document.getElementById('submit_refill').className = 'btn btn-success';
        }
    }


</script>