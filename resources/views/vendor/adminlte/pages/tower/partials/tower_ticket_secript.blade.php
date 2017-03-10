<script type="text/javascript">
    $('#ticket_table').DataTable({
        "processing": true,
        "serverSide": true,
        "searching": false,
        "iDisplayLength": 5,
        "lengthChange": false,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "paging": true,
        "ajax": '{{ url('isp-cpanel/tower/tower_ticket/'.$tower->id) }}',


        "columns": [
            { data: 'id',             name: 'id' , width:'10%' , class:'text-center'},
            { data: 'category',          name: 'category' },
            { data: 'title',          name: 'title' },
            { data: 'created_by',     name: 'created_by' },
            { data: 'created_at',     name: 'created_at' },
            { data: 'status',          name: 'status' },
            { data: 'action',         name: 'action', orderable: false, searchable: false , width:'11%' , class:'text-center'}
        ]
    });
</script>

<script type="text/javascript">
    function fun_view_ticket(id)
    {
        var view_url = $("#hidden_view_ticket").val();
        $.ajax({
            url: view_url,
            type:"GET",
            data: {"id":id},
            success: function(result){
                console.log(result);
                $("#view_tower_ticket_title").text(result.title);
            }
        });
    }

    function fun_edit_ticket(id)
    {
        var view_url = $("#hidden_view_ticket").val();
        $.ajax({
            url: view_url,
            type:"GET",
            data: {"id":id},
            success: function(result){
                //console.log(result);

            }
        });
    }

    function fun_delete_ticket(id)
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
