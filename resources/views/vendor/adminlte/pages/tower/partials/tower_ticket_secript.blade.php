<script type="text/javascript">
    $('#ticket_table').DataTable({
        "processing": true,
        "serverSide": true,
        "searching": false,
        "iDisplayLength": 10,
        "lengthChange": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "paging": true,
        "ajax": '{{ url('isp-cpanel/tower/tower_ticket/'.$tower->id) }}',
        "columns": [
            {data: 'category', name: 'category', orderable: false, searchable: false, width: '8%', class: 'text-center'},
            {data: 'title', name: 'title', orderable: false, searchable: false},
            {
                data: 'user.name',
                name: 'user.name',
                orderable: true,
                searchable: false,
                width: '12%',
                class: 'text-center'
            },
            {
                data: 'created_at',
                name: 'created_at',
                orderable: true,
                searchable: false,
                width: '18%',
                class: 'text-center'
            },
            {data: 'status', name: 'status', searchable: false, width: '8%', class: 'text-center'},
            {data: 'action', name: 'action', orderable: false, searchable: false, width: '11%', class: 'text-center'}
        ]
    });
</script>

<script type="text/javascript">

    function fun_view_ticket(id) {

        var view_url = $("#hidden_view_ticket").val();
        $.ajax({
            url: view_url,
            type: "GET",
            data: {"id": id},
            success: function (result) {
                // console.log(result);
                $("#view_title").text(result.title);
                $("#view_message").text(result.message);
                $("#view_created_by").text(result.user.name);
                $("#view_closed_by").text(result.user.name);
                $("#view_close_message").text(result.close_message);

                if ((result.category) === 1) {
                    $("#view_category").text('Tower');
                } else if ((result.category) === 2) {
                    $("#view_category").text('Broadcast');
                } else if ((  (result.category) === 3 )) {
                    $("#view_category").text('Link');
                }

                if ((result.priority) === 1) {
                    $("#view_priority").text('Low');
                } else if ((result.priority) === 2) {
                    $("#view_priority").text('Normal');
                } else if ((  (result.priority) === 3 )) {
                    $("#view_priority").text('High');
                } else if ((  (result.priority) === 4 )) {
                    $("#view_priority").text('Urgent');
                }

                if ((result.status) === 1) {
                    $("#view_status").text('Open');
                } else if ((result.status) === 0) {
                    $("#view_status").text('Closed');
                }


            },
            error: function (exception) {
                alert('Exeption:' + exception);
            }
        });
    }


    function fun_close_ticket(id) {
        var view_url = $("#hidden_view_ticket").val();
        $.ajax({
            url: view_url,
            type: "GET",
            data: {"id": id},
            success: function (result) {
                //console.log(result);
                $("#edit_id_ticket").val(result.id);
                $("#edit_close_message").val(result.close_message);
            }
        });
    }

</script>
