<script type="text/javascript">
        $('#open_ticket').DataTable({
        "processing": true,
        "serverSide": true,
        "searching": false,
        "iDisplayLength": 10,
        "lengthChange": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "paging": true,
        "ajax": '{{ url('isp-cpanel/customers/customer_ticket/open_ticket') }}',
        "columns": [
            { data: 'message',        name: 'message' },
            { data: 'customer.fullname',         name: 'customer.fullname', width:'18%' },
            { data: 'user.name',      name: 'user.name', width:'10%'},
            { data: 'created_at',     name: 'created_at', width:'15%', orderable: false, searchable: false },
            { data: 'action',         name: 'action', orderable: false, searchable: false , width:'10%' , class:'text-center'}
        ]
    });
</script>