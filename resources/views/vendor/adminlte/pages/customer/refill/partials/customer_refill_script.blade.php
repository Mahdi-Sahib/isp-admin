<script type="text/javascript">
    function fun_get_id(id)
    {
        document.getElementById("x").value = id;
    }

    document.getElementById('checkbox').onchange = function() {
        document.getElementById('amount_paid').disabled = !this.checked;
    };

</script>