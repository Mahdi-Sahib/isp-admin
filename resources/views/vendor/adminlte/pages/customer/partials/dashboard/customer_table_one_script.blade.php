<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $('#data').DataTable({
        "processing": true,
        "serverSide": true,
        "searching": true,
        "iDisplayLength": 5,
        "lengthMenu": [ 5,10, 25, 50, 75, 100 ],
        "lengthChange": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "paging": true,
        "ajax": '{{ url('isp-cpanel/customers/customer-table') }}',


        "columns": [
            { data: 'fullname',          name: 'fullname' , orderable: false, searchable: true ,class:'text-center'},
            { data: 'username',          name: 'username' , orderable: false, searchable: true  },
            { data: 'mobile_1',          name: 'mobile_1' , orderable: false, searchable: true  },
            { data: 'connection_method', name: 'connection_method' , orderable: false, searchable: true },
            { data: 'navigation',     name: 'navigation', orderable: false, searchable: false , width:'11%' , class:'text-center'},
            { data: 'action',         name: 'action', orderable: false, searchable: false , width:'11%' , class:'text-center'}
        ]
    });
</script>