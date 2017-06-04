<script type="text/javascript">
    $('#suppliers').DataTable({
        "processing": true,
        "serverSide": true,
        "searching": false,
        "iDisplayLength": 5,
        "lengthChange": false,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "paging": true,
        "ajax": '{{ url('isp-cpanel/financial/supplier_table') }}',

        "columns": [
            { data: 'name',          name: 'fullname' , orderable: false, searchable: true ,class:'text-center'},
            { data: 'phone',          name: 'username' , orderable: false, searchable: true  },
            { data: 'email',          name: 'mobile_1' , orderable: false, searchable: true  },
            { data: 'action',         name: 'action', orderable: false, searchable: false , width:'11%' , class:'text-center'}
        ]
    });
</script>
