<script type="text/javascript">
    $('#users_Income_table').DataTable({
        "processing": true,
        "serverSide": true,
        "searching": true,
        "iDisplayLength": 10,
        "lengthChange": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "paging": true,
        "ajax": '{{ url('users_Income_table') }}',
        "columns": [
            { data: 'name',                 name: 'name'},
            { data: 'total_refill_income',         name: 'total_income'},
            { data: 'total_repayment',         name: 'total_income'},
            { data: 'total_unpaid_refill',         name: 'total_income'},
            { data: 'total_income',         name: 'total_income'},
        ]
    });
</script>