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
        "ajax": '{{ url('isp-cpanel/customers/customer-ticket-table/'.$customer->id) }}',
        "columns": [
            { data: 'message',        name: 'message', class:'text-center' },
            { data: 'status',         name: 'status', width:'8%' , class:'text-center'},
            { data: 'user.name',      name: 'user.name', width:'10%', class:'text-center'},
            { data: 'created_at',     name: 'created_at', width:'20%', orderable: false, searchable: false , class:'text-center'},
            { data: 'action',         name: 'action', orderable: false, searchable: false , width:'10%' , class:'text-center'}
        ]
    });
</script>