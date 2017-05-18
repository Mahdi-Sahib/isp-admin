<script type="text/javascript">
    $('#ticket_table').DataTable({
        "processing": true,
        "serverSide": true,
        "searching": false,
        "iDisplayLength": 10,
        "lengthChange": false,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "paging": true,
        "ajax": '{{ url('isp-cpanel/customers/customer-ticket-ajax/'.$customer->id) }}',
        "columns": [
            { data: 'message',        name: 'message' },
            { data: 'status',         name: 'status', width:'8%' },
            { data: 'user.name',      name: 'user.name', width:'10%'},
            { data: 'created_at',     name: 'created_at', width:'20%', orderable: false, searchable: false },
            { data: 'action',         name: 'action', orderable: false, searchable: false , width:'10%' , class:'text-center'}
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
                // console.log(result);
                $("#view_title").text(result.title);
                $("#view_message").text(result.message);
                $("#view_created_by").text(result.user.name);
                $("#view_closed_by").text(result.user.name);
                $("#view_updated_by").text(result.user.name);
                $("#view_close_message").text(result.close_message);

                if(  (result.status) == 1 )
                {
                    $("#view_status").text('Open');
                } else if (  (result.status) == 0 ) {
                    $("#view_status").text('Closed');
                }

            },
            error:function(exception){alert('Exeption:'+exception);}
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
                $("#view_message").text(result.message);
                $("#view_created_by").text(result.user.name);
                $("#view_closed_by").text(result.user.name);
                $("#view_updated_by").text(result.user.name);
                $("#view_close_message").text(result.close_message);
                //console.log(result);
            }
        });
    }

    function fun_close_ticket(id)
    {
        var view_url = $("#hidden_view_ticket").val();
        $.ajax({
            url: view_url,
            type:"GET",
            data: {"id":id},
            success: function(result){
                console.log(result);
                $("#edit_id_ticket").val(result.id);
                $("#edit_close_message").val(result.close_message);
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
