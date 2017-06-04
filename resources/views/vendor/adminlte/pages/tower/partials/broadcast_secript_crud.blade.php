<script type="text/javascript">
    $('#broadcast').DataTable({
        "searching":false,
  //    "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering" : true,
        "info": true,
        "autoWidth": true,
    })
    function fun_view_broadcast(id)
    {
        var view_url = $("#hidden_view").val();
        $.ajax({
            url: view_url,
            type:"GET",
            data: {"id":id},
            success: function(result){
                console.log(result);
                $("#view_device_id").text(result.device_id);
                $("#view_number_Sign").text(result.number_sign);
                $("#view_name").text(result.name);
                $("#view_ssid").text(result.ssid);
                $("#view_ip").text(result.ip);
                $("#view_mac").text(result.mac);
                $("#view_antenna").text(result.antenna);
                $("#view_degree").text(result.degree);
                $("#view_gin").text(result.gin);
                $("#view_channal").text(result.channal);
                $("#view_channal_width").text(result.channal_width);
                $("#view_direction").text(result.direction);
                $("#view_broadcasts_info").text(result.broadcasts_info);
            }
        });
    }

    function fun_edit_broadcast(id)
    {
        var view_url = $("#hidden_view").val();
        $.ajax({
            url: view_url,
            type:"GET",
            data: {"id":id},
            success: function(result){
                console.log(result);
                $("#edit_id").val(result.id);
                $("#edit_number_Sign").val(result.number_sign);
                $("#edit_name").val(result.name);
                $("#edit_ssid").val(result.ssid);
                $("#edit_ip").val(result.ip);
                $("#edit_mac").val(result.mac);
                $("#edit_antenna").val(result.antenna);
                $("#edit_degree").val(result.degree);
                $("#edit_gin").val(result.gin);
                $("#edit_channal").val(result.channal);
                $("#edit_channal_width").val(result.channal_width);
                $("#edit_direction").val(result.direction);
                $("#edit_broadcasts_info").val(result.broadcasts_info);
            }
        });
    }

    function fun_delete_broadcast(id)
    {
        var conf = confirm("When you delete Broadcast all ticket's for this broadcast will deleted.");
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



