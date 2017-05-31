<script type="text/javascript">
    $('#refill_table').DataTable({
        "processing": true,
        "serverSide": true,
        "searching": false,
        "iDisplayLength": 5,
        "lengthChange": false,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "paging": true,
        "ajax": '{{ url('isp-cpanel/customers/customer-refill-table/'.$customer->id) }}',
        "columns": [
            { data: 'card.title',     name: 'refill_card_id' },
            { data: 'payment_status',      name: 'payment_status'},
            { data: 'amount_paid',      name: 'amount_paid'},
            { data: 'by_person',      name: 'by_person'},
            { data: 'user.name',     name: 'name', orderable: false, searchable: false },
            { data: 'created_at',         name: 'created_at' },
            { data: 'action',         name: 'action', orderable: false, searchable: false , width:'10%' , class:'text-center'}
        ]
    });
</script>