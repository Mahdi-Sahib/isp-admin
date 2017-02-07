<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    function fun_view_link(id)
    {
        var view_url = $("#hidden_view_link").val();
        $.ajax({
            url: view_url,
            type:"GET",
            data: {"id":id},
            success: function(result){
                //console.log(result);
                $("#view_link_tower_id").text(result.tower_id);
          //      $("#view_link_repeater_id").text(result.repeater_id);
                $("#view_link_connection_types_id").text(result.connection_types_id);
        //        $("#view_link_channal_width").text(result.channal_width);
        //        $("#view_link_ssid").text(result.ssid);
         //       $("#view_link_authentication").text(result.authentication);
          //      $("#view_link_slave_ip").text(result.slave_ip);
          //      $("#view_link_slave_antenna").text(result.slave_antenna);
                $("#view_link_master_ip").text(result.master_ip);
           //     $("#view_link_master_antenna").text(result.master_antenna);
         //       $("#view_link_master_brand").text(result.master_brand);
            }
        });
    }

    function fun_edit_link(id)
    {
        var view_url = $("#hidden_view_link").val();
        $.ajax({
            url: view_url,
            type:"GET",
            data: {"id":id},
            success: function(result){
                //console.log(result);
                $("#edit_id").val(result.id);
                $("#edit_link_tower_id").val(result.tower_id);
                $("#edit_link_repeater_id").val(result.repeater_id);
                $("#edit_link_connection_types_id").val(result.connection_types_id);
                $("#edit_link_channal_width").val(result.channal_width);
                $("#edit_link_ssid").val(result.ssid);
                $("#edit_link_authentication").val(result.authentication);
                $("#edit_link_slave_ip").val(result.slave_ip);
                $("#edit_link_slave_antenna").val(result.slave_antenna);
                $("#edit_link_master_ip").val(result.master_ip);
                $("#edit_link_master_antenna").val(result.master_antenna);
                $("#edit_link_master_brand").val(result.master_brand);
            }
        });
    }

    function fun_edit_method(id)
    {
        var view_url = $("#hidden_view_link").val();
        $.ajax({
            url: view_url,
            type:"GET",
            data: {"id":id},
            success: function(result){
                //console.log(result);
                $("#edit_id").val(result.id);
                $("#edit_link_tower_id").val(result.tower_id);
                $("#edit_link_connection_types_id").val(result.connection_types_id);

            }
        });
    }

    function fun_delete_link(id)
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
