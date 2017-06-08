<script type="text/javascript">
    $('#broadcast_table').DataTable({
        "processing": true,
        "serverSide": true,
        "searching": true,
        "iDisplayLength": 10,
        "lengthChange": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "paging": true,
        "ajax": '{{ url('isp-cpanel/tower/tower_broadcast/ajax_table/'.$tower->id) }}',
        "columns": [
            {data: 'number_sign', name: 'number_sign', orderable: false, searchable: false, width: '5%', class: 'text-center'},
            {data: 'ssid', name: 'ssid', orderable: false, searchable: false},
            {data: 'direction', name: 'direction', orderable: false, searchable: true},
            {
                data: 'ip',
                name: 'ip',
                orderable: true,
                searchable: false,
                width: '10%',
                class: 'text-center'
            },
            {
                data: 'mac',
                name: 'mac',
                orderable: true,
                searchable: false,
                width: '10%',
                class: 'text-center'
            },
            {data: 'channal_width', name: 'channal_width', searchable: false, width: '5%', class: 'text-center'},
            {data: 'device.brand_model', name: 'device.brand_model', searchable: false, width: '10%', class: 'text-center'},
            {data: 'action', name: 'action', orderable: false, searchable: false, width: '11%', class: 'text-center'}
        ]
    });
</script>

<script type="text/javascript">

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
                $("#view_created").text(result.broadcast_created_by.name);
                $("#view_updated").text(result.broadcast_updated_by.name);
                $("#view_broadcast_created_at").text(broadcast_updated_by.name);
                $("#view_broadcast_updated_at").text(result.updated_at);
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



