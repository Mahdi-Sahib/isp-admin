
<script type="text/javascript">
    function fun_view_ticket(id)
    {
        var view_url = $("#hidden_view_ticket").val();
        $.ajax({
            url: view_url,
            type:"GET",
            data: {"id":id},
            success: function(result){
                // console.log(result);
                $("#view_title").text(result.title);
                $("#view_message").text(result.message);
                $("#view_created_by").text(result.user.name);
                $("#view_closed_by").text(result.user.name);
                $("#view_updated_by").text(result.user.name);
                $("#view_close_message").text(result.close_message);

                if(  (result.status) == 1 )
                {
                    $("#view_status").text('Open');
                } else if (  (result.status) == 0 ) {
                    $("#view_status").text('Closed');
                }

            },
            error:function(exception){alert('Exeption:'+exception);}
        });
    }
</script>
