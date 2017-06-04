<script type="text/javascript">
    function fun_close_ticket(id)
    {
        var view_url = $("#hidden_view_ticket").val();
        $.ajax({
            url: view_url,
            type:"GET",
            data: {"id":id},
            success: function(result){
                console.log(result);
                $("#edit_id_ticket").val(result.id);
                $("#edit_close_message").val(result.close_message);
            }
        });
    }
</script>
