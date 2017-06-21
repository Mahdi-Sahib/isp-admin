
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
                $("#view_created_at").text(result.created_at);
                $("#view_closed_by").text(result.user.name);
                $("#view_closed_at").text(result.updated_at);
                $("#view_close_message").text(result.close_message);

                if(  (result.status) === 1 )
                {
                    $("#view_status").html(" <dev class='label bg-red' style='font-size: 21px;'> Open </dev> ");
                } else if (  (result.status) === 0 ) {
                    $("#view_status").html(" <dev class='label bg-green' style='font-size: 21px;'> Closed </dev> ");
                }

            },
            error:function(exception){alert('Exeption:'+exception);}
        });
    }
</script>
