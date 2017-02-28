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
        "ajax": '{!! route('isp-cpanel.tower.tower_ticket') !!}',

        "columns": [
            { data: 'id',             name: 'id' , width:'10%' , class:'text-center'},
            { data: 'title',          name: 'title' },
            { data: 'title',          name: 'title' },
            { data: 'title',          name: 'title' },
            { data: 'title',          name: 'title' },
            { data: 'action',         name: 'action', orderable: false, searchable: false , width:'11%' , class:'text-center'}
        ]
    });
</script>
