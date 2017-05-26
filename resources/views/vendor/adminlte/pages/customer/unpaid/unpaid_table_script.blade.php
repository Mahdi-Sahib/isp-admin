<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $('#unpaid_table').DataTable({
        "processing": true,
        "serverSide": true,
        "searching": true,
        "iDisplayLength": 50,
        "lengthMenu": [ 5,10, 25, 50, 75, 100 ],
        "lengthChange": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "paging": true,
        "ajax": '{{ url('isp-cpanel/customer/unpaid-table') }}',

        "columns": [
            { data: 'customer.fullname',          name: 'customer.fullname' , orderable: false, searchable: true ,class:'text-center'},
            { data: 'card.title',          name: 'card.title' , orderable: false, searchable: false ,class:'text-center'},
            { data: 'payment_status',          name: 'payment_status' , orderable: false, searchable: false ,class:'text-center'},
            { data: 'amount_paid',          name: 'amount_paid' , orderable: false, searchable: true ,class:'text-center'},
            { data: 'user.name',          name: 'payment_status' , orderable: false, searchable: true ,class:'text-center'},
            { data: 'by_person',          name: 'by_person' , orderable: false, searchable: false ,class:'text-center'},
            { data: 'created_at',          name: 'created_at' , orderable: false, searchable: false  },
            { data: 'navigation',          name: 'navigation' , orderable: false, searchable: false  },
            { data: 'action',     name: 'action', orderable: false, searchable: false , width:'11%' , class:'text-center'},
        ]
    });
</script>