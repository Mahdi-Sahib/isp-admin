<script type="text/javascript">
    function fun_peek_customer(id)
    {
        var view_url = $("#hidden_customer_peek").val();
        $.ajax({
            url: view_url,
            type:"GET",
            data: {"id":id},
            success: function(result){
                console.log(result);
                $("#view_fullname").text(result.fullname);
                $("#view_username").text(result.username);
                $("#view_password").text(result.password);
                $("#view_mobile_1").text(result.mobile_1);
                $("#view_mobile_2").text(result.mobile_2);
                $("#view_address_2").text(result.address_2);
                $("#view_about").text(result.about);
            },
            error:function(exception){alert('Exeption:'+exception);}
        });
    }
</script>