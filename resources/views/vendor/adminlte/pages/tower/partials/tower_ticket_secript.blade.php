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
            { data: 'category',       name: 'category' },
            { data: 'title',          name: 'title' },
            { data: 'user.name',      name: 'user.name'},
            { data: 'created_at',     name: 'created_at' },
            { data: 'status',         name: 'status' },
            { data: 'action',         name: 'action', orderable: false, searchable: false , width:'11%' , class:'text-center'}
        ]
    });
</script>

<script type="text/javascript">

    $(window).ajaxComplete(function () {console.log('Ajax Complete'); });
    $(window).ajaxError(function (data, textStatus, jqXHR) {console.log('Ajax Error');
        console.log('data: ' + data);
        console.log('textStatus: ' + textStatus);
        console.log('jqXHR: ' + jqXHR); });
    $(window).ajaxSend(function () {console.log('Ajax Send'); });
    $(window).ajaxStart(function () {console.log('Ajax Start'); });
    $(window).ajaxStop(function () {console.log('Ajax Stop'); });
    $(window).ajaxSuccess(function () {console.log('Ajax Success'); });

    function fun_view_ticket(id)
    {

        var view_url = $("#hidden_view_ticket").val();
        $.ajax({
            url: view_url,
            type:"GET",
            data: {"id":id},
            success: function(result){
                console.log(result);
                $("#view_title").text(result.title);
                $("#view_message").text(result.message);
                $("#view_created_by").text(result.user.name);
                $("#view_closed_by").text(result.user.name);
                $("#view_updated_by").text(result.user.name);
                $("#view_close_message").text(result.close_message);

                if(  (result.category) == 1 )
                {
                    $("#view_category").text('Tower');
                } else if (  (result.category) == 2 ) {
                    $("#view_category").text('Broadcast');
                } else if (  (  (result.category) == 3 ) ) {
                    $("#view_category").text('Link');
                }

                if(  (result.priority) == 1 )
                {
                    $("#view_priority").text('Low');
                } else if (  (result.priority) == 2 ) {
                    $("#view_priority").text('Normal');
                } else if (  (  (result.priority) == 3 ) ) {
                    $("#view_priority").text('High');
                } else if (  (  (result.priority) == 4 ) ) {
                    $("#view_priority").text('Urgent');
                }

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
                //console.log(result);
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
