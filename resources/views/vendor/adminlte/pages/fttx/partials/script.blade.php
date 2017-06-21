<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $('#olt_table').DataTable({
        "processing": true,
        "serverSide": true,
        "searching": true,
        "iDisplayLength": 10,
        "lengthChange": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "paging": true,
        "ajax": '{{ url('olt/table') }}',
        "columns": [
            { data: 'number_sign',        name: 'number_sign' , searchable: false , width:'5%' , class:'text-center'},
            { data: 'title',        name: 'title' },
            { data: 'type',         name: 'type', width:'8%' },
            { data: 'pon_count',         name: 'pon_count', width:'8%' },
            { data: 'splitting_level',      name: 'splitting_level', width:'10%'},
            { data: 'model',     name: 'model', width:'20%', orderable: false, searchable: false },
            { data: 'navigation',     name: 'navigation', width:'20%', orderable: false, searchable: false },
            { data: 'action',         name: 'action', orderable: false, searchable: false , width:'10%' , class:'text-center'}
        ]
    });

    function fun_olt_show(id)
    {
        var view_url = $("#hidden_view").val();
        $.ajax({
            url: view_url,
            type:"GET",
            data: {"id":id},
            success: function(result){
                //console.log(result);
                $("#view_title").text(result.title);
                $("#view_type").text(result.type);
                $("#view_device_id").text(result.device_id);
                $("#view_number_sign").text(result.number_sign);
                $("#view_adaptor_type").text(result.adaptor_type);
                $("#view_accommodate").text(result.accommodate);
                $("#view_brand").text(result.brand);
                $("#view_model").text(result.model);
                $("#view_splitting_level").text(result.splitting_level);
                $("#view_splitting_method").text(result.splitting_method);
                $("#view_splitting_ratio_level_1").text(result.splitting_ratio_level_1);
                $("#view_splitting_ratio_level_2").text(result.splitting_ratio_level_2);
                $("#view_pon_count").text(result.pon_count);
                $("#view_location").text(result.location);
                $("#view_created_by").text(result.created_by);
                $("#view_updated_at").text(result.updated_by);
                $("#view_updated_by").text(result.updated_at);
            }
        });
    }

    function fun_olt_edit(id)
    {
        var view_url = $("#hidden_view").val();
        $.ajax({
            url: view_url,
            type:"GET",
            data: {"id":id},
            success: function(result){
                // console.log(result);
                $("#edit_id").val(result.id);
                $("#edit_title").val(result.title);
                $("#edit_type").val(result.type);
                $("#edit_device_id").val(result.device_id);
                $("#edit_number_sign").val(result.number_sign);
                $("#edit_adaptor_type").val(result.adaptor_type);
                $("#edit_accommodate").val(result.accommodate);
                $("#edit_brand").val(result.brand);
                $("#edit_model").val(result.model);
                $("#edit_splitting_level").val(result.splitting_level);
                $("#edit_splitting_method").val(result.splitting_method);
                $("#edit_splitting_ratio_level_1").val(result.splitting_ratio_level_1);
                $("#edit_splitting_ratio_level_2").val(result.splitting_ratio_level_2);
                $("#edit_pon_count").val(result.pon_count);
                $("#edit_location").val(result.location);
                $("#edit_created_by").val(result.created_by);
                $("#edit_updated_at").val(result.updated_by);
                $("#edit_updated_by").val(result.updated_at);
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