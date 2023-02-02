$(document).ready(function(){
    $('#cate_table').DataTable();
    $('#shipping_table').DataTable();
    $('#product_table').DataTable();
    $('#cus_table').DataTable();

    console.log($('#product_table')); 

    $('#cate_table .delete').click(function(){
        let message=confirm('Are you sure to delete');
        if(message){
            let tr=$(this).closest('tr');
            let id = $(this).closest('td').attr("id");

            $.ajax({
                url:'delete_category.php',
                type:'post',
                data:{id: id},
                success:function(response){
                    if(response=='fail'){
                        alert('You can not delete that row.')
                    }
                    else{
                        tr.remove();
                    }

                },
                error:function(){

                }
            })
        }
    })
});


$(document).ready(function(){
    $('#shipping_table .delete').click(function(){
        let message=confirm('Are you sure to delete');
        if(message){
            let tr=$(this).closest('tr');
            let id = $(this).closest('td').attr("id");

            $.ajax({
                url:'delete_product.php',
                type:'post',
                data:{id: id},
                success:function(response){
                    if(response=='fail'){
                        alert('You can not delete that row.')
                    }
                    else{
                        tr.remove();
                    }

                },
                error:function(){

                }
            })
        }
    })
})
















