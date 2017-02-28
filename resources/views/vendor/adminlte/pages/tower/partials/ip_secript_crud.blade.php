<script type="text/javascript">
    function fun_view_ip(id)
    {
        var view_url = $("#hidden_view_ip").val();
        $.ajax({
            url: view_url,
            type:"GET",
            data: {"id":id},
            success: function(result){
                //console.log(result);
                $("#view_tower_ip").text(result.tower_ip);
            }
        });
    }

    function fun_edit_ip(id)
    {
        var view_url = $("#hidden_view_ip").val();
        $.ajax({
            url: view_url,
            type:"GET",
            data: {"id":id},
            success: function(result){
                //console.log(result);
                $("#edit_id_ip").val(result.id);
                $("#edit_tower_ip").val(result.tower_ip);
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
