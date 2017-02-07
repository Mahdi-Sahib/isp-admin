<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

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
                //console.log(result);
                $("#view_device_id").text(result.device);
                $("#view_number_Sign").text(result.number_sign);
                $("#view_name").text(result.name);
                $("#view_ssid").text(result.ssid);
                $("#view_ip").text(result.ip);
                $("#view_mac").text(result.mac);
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
                //console.log(result);
                $("#edit_id").val(result.id);
                $("#edit_device_id").val(result.device_id);
                $("#edit_number_Sign").val(result.number_sign);
                $("#edit_name").val(result.name);
                $("#edit_ssid").val(result.ssid);
                $("#edit_ip").val(result.ip);
                $("#edit_mac").val(result.mac);
                $("#edit_channal_width").val(result.channal_width);
                $("#edit_direction").val(result.direction);
                $("#edit_broadcasts_info").val(result.broadcasts_info);
            }
        });
    }

    function fun_delete_broadcast(id)
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



