<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $('#data').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": '{{ url('isp-cpanel/financial/refill_card_table') }}',

        "columns": [
            { data: 'supplier.name',      name: 'supplier_id' , orderable: false, searchable: true ,class:'text-center'},
            { data: 'title',           name: 'amount' , orderable: false, searchable: true  },
            { data: 'description',       name: 'created_by' , orderable: false, searchable: true  },
            { data: 'selling_price',       name: 'updated_by' , orderable: false, searchable: true },
            { data: 'action',           name: 'action', orderable: false, searchable: false , width:'11%' , class:'text-center'}
        ]
    });
</script>

<script type="text/javascript">
    $(window).ajaxComplete(function () {console.log('Ajax Complete'); });
    $(window).ajaxError(function (data, textStatus, jqXHR) {console.log('Ajax Error');
        console.log('data: ' + data);
        console.log('textStatus: ' + textStatus);
        console.log('jqXHR: ' + jqXHR); });
    $(window).ajaxSend(function () {console.log('Ajax Send'); });
    $(window).ajaxStart(function () {console.log('Ajax Start'); });
    $(window).ajaxStop(function () {console.log('Ajax Stop'); });
    $(window).ajaxSuccess(function () {console.log('Ajax Success'); });
    function fun_view(id)
    {
        var view_url = $("#hidden_view").val();
        $.ajax({
            url: view_url,
            type:"GET",
            data: {"id":id},
            success: function(result){
                // console.log(result);
                $("#view_supplier_id").text(result.supplier_id);
                $("#view_title").text(result.title);
                $("#view_description").text(result.description);
                $("#view_thumb").text(result.thumb);
                $("#view_image").text(result.image);
                $("#view_code").text(result.code);
                $("#view_currency").text(result.currency);
                $("#view_cost_price").text(result.cost_price);
                $("#view_selling_price").text(result.selling_price);
                $("#view_created_at").text(result.created_at);
                $("#view_created_by").text(result.created_by);
                $("#view_updated_at").text(result.updated_at);
                $("#view_updated_by").text(result.updated_by);
            }
        });
    }

    function fun_edit(id)
    {
        var view_url = $("#hidden_view").val();
        $.ajax({
            url: view_url,
            type:"GET",
            data: {"id":id},
            success: function(result){
                // console.log(result);
                $("#edit_id").val(result.id);
                $("#Edit_product_categorie").val(result.product_categorie);
                $("#Edit_supplier_id").val(result.supplier_id);
                $("#Edit_title").val(result.title);
                $("#Edit_price").val(result.price);
                $("#Edit_description").val(result.description);
                $("#Edit_thumb").val(result.thumb);
                $("#Edit_image").val(result.image);
                $("#Edit_code").val(result.code);
                $("#Edit_currency").val(result.currency);
                $("#Edit_cost_price").val(result.cost_price);
                $("#Edit_selling_price").val(result.selling_price);
            }
        });
    }

    function fun_delete(id)
    {
        var conf = confirm("Are you sure want to delete??");
        if(conf){
            var delete_url = $("#hidden_delete").val();
            $.ajax({
                url: delete_url,
                type:"POST",
                data: {"id":id,_token: "{{ csrf_token() }}"},
                success: function(response){
                    alert(response);
                    location.reload();
                }
            });
        }
        else{
            return false;
        }
    }
</script>
