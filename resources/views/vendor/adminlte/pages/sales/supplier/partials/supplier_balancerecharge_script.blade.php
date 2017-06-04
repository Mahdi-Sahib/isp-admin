<script type="text/javascript">
    $('#supplier_invoices').DataTable({
        "processing": true,
        "serverSide": true,
        "searching": false,
        "iDisplayLength": 10,
        "lengthChange": false,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "paging": true,
        "ajax": '{{ url('isp-cpanel/financial/supplier_dashboard/'.$supplier->id) }}',


        "columns": [
            { data: 'amount',      name: 'amount' , orderable: false, searchable: true ,class:'text-center'},
            { data: 'user.name',       name: 'description' , orderable: false, searchable: true },
            { data: 'created_at',           name: 'created_at' , orderable: false, searchable: true  },
            { data: 'action',           name: 'action', orderable: false, searchable: false , width:'11%' , class:'text-center'}
        ]
    });
</script>

