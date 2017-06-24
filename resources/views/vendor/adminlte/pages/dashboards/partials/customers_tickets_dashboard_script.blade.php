<script type="text/javascript">
    $('#all_customers_tickets').DataTable({
        "processing": true,
        "serverSide": true,
        "searching": true,
        "iDisplayLength": 10,
        "lengthChange": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "paging": true,
        "ajax": '{{ url('customers_tickets_table') }}',
        "columns": [
            { data: 'message',        name: 'message', searchable: false , orderable: false, class:'text-center'},
            { data: 'customer.fullname',         name: 'customer.fullname', width:'18%' , class:'text-center', orderable: false},
            { data: 'status',         name: 'status', width:'18%' , class:'text-center', width:'8%'},
            { data: 'user.name',      name: 'user.name' , width:'10%' , class:'text-center', class:'text-center'},
            { data: 'created_at',     name: 'created_at', searchable: false , class:'text-center', width:'10%'},
            { data: 'action',         name: 'action', orderable: false, searchable: false , width:'10%' , class:'text-center'}
        ]
    });
</script>