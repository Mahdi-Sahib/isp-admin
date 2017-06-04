<script type="text/javascript">
    function fun_view(id)
    {
        var view_url = $("#hidden_view").val();
        $.ajax({
            url: view_url,
            type:"GET",
            data: {"id":id},
            success: function(result){
                //console.log(result);
                $("#view_name").text(result.name);
                $("#view_phone").text(result.phone);
                $("#view_email").text(result.email);
                $("#view_address").text(result.address);
                $("#view_contact").text(result.contact);
                $("#view_website").text(result.website);
                $("#view_status").text(result.bank_account);
                $("#view_currency").text(result.currency);
                $("#view_payment_terms").text(result.payment_terms);
                $("#view_tax_included").text(result.tax_included);
                $("#view_created_at").text(result.created_at);
                $("#view_created_by").text(result.created_by);
                $("#view_updated_at").text(result.updated_by);
                $("#view_updated_by").text(result.updated_at);
            }
        });
    }

    function fun_edit(id)
    {
        var view_url = $("#hidden_view").val();
        $.ajax({
            url: view_url,
            type:"GET",
            data: {"id":id},
            success: function(result){
                // console.log(result);
                $("#edit_id").val(result.id);
                $("#edit_name").val(result.name);
                $("#edit_phone").val(result.phone);
                $("#edit_email").val(result.email);
                $("#edit_address").val(result.address);
                $("#edit_contact").val(result.contact);
                $("#edit_website").val(result.website);
                $("#edit_bank_account").val(result.bank_account);
                $("#edit_currency").val(result.currency);
                $("#edit_payment_terms").val(result.payment_terms);
                $("#edit_tax_included").val(result.tax_included);
            }
        });
    }

    function fun_delete(id)
    {
        var conf = confirm("Are you sure want to delete??");
        if(conf){
            var delete_url = $("#hidden_delete").val();
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
