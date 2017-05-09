
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
                $("#view_product_categorie").text(result.product_categorie);
                $("#view_supplier_id").text(result.supplier_id);
                $("#view_title").text(result.title);
                $("#view_price").text(result.price);
                $("#view_description").text(result.description);
                $("#view_thumb").text(result.thumb);
                $("#view_image").text(result.image);
                $("#view_code").text(result.code);
                $("#view_currency").text(result.currency);
                $("#view_cost_price").text(result.cost_price);
                $("#view_selling_price").text(result.selling_price);
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
                $("#Edit_product_categorie").val(result.product_categorie);
                $("#Edit_supplier_id").val(result.supplier_id);
                $("#Edit_title").val(result.title);
                $("#Edit_price").val(result.price);
                $("#Edit_description").val(result.description);
                $("#Edit_thumb").val(result.thumb);
                $("#Edit_image").val(result.image);
                $("#Edit_code").val(result.code);
                $("#Edit_currency").val(result.currency);
                $("#Edit_cost_price").val(result.cost_price);
                $("#Edit_selling_price").val(result.selling_price);
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
