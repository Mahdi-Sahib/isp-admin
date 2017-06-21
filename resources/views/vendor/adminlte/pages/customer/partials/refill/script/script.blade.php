

<script type="text/javascript">

    function fun_view_refill(id)
    {
        var view_url = $("#hidden_view_refill").val();
        $.ajax({
            url: view_url,
            type:"GET",
            data: {"id":id},
            success: function(result){
                //console.log(result);

                $("#view_refill_card_id").text(result.card.title);
                $("#view_card_price").text(result.card_price);
                $("#view_amount_paid").text(result.amount_paid);
                $("#view_description").text(result.description);
                $("#view_by_person").text(result.by_person);

                $("#view_created_by").text(result.created_by);
                $("#view_updated_by").text(result.updated_by);


                if ((result.payment_status) === 1){
                    $("#view_payment_status").text('Unpaid');
                }else {
                    $("#view_payment_status").text('paid');
                }
            }
        });
    }

    function fun_repayment(id)
    {
        var view_url = $("#hidden_view_refill").val();
        $.ajax({
            url: view_url,
            type:"GET",
            data: {"id":id},
            success: function(result){
                //console.log(result);
                $("#edit_id_refill").val(result.id);
                $("#edit_refill_card_id").val(result.card.title);
                $("#edit_card_price").val(result.card_price);
                $("#edit_amount_paid").val(result.amount_paid);
                $("#edit_description").val(result.description);
                $("#edit_by_person").val(result.by_person);
                $("#edit_by_remaining").val(result.card_price - result.amount_paid);
                $("#edit_second_paid").val(result.card_price - result.amount_paid);

                $("#edit_created_by").val(result.user.name);
                $("#edit_updated_by").val(result.updated_by);

                $("#edit_created_at").val(result.created_at);
                $("#edit_updated_by").val(result.updated_at);
            }
        });
    }

    function fun_delete_ip(id)
    {
        var conf = confirm("Are you sure want to delete??");
        if(conf){
            var delete_url = $("#hidden_delete_ip").val();
            $.ajax({
                url: delete_url,
                type:"POST",
                data: {"id":id,_token: "{{ csrf_token() }}"},
                success: function(response){
                    alert(response);
                    location.reload();
                }
            });
        }
        else{
            return false;
        }
    }
</script>