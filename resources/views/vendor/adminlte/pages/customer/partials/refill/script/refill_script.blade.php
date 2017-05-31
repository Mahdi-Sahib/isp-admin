<script type="text/javascript">
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