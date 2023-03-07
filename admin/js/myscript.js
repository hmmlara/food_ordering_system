$(document).ready(function(){

    //category table delete
    $('#category_table .delete').click(function(){
        // console.log('hello');
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

    //product item delete
    $('#product_table #delete').click(function(){
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

    
    $('#reset').on('click',function(){
        var order_type = $('#order_type')[0];
        var order_status = $('#order_status')[0];
        order_type.selectedIndex=0;
        order_status.selectedIndex=0;
    })
});

//print bill
function myprint(){
    var body = document.getElementById('body').innerHTML;
    var bill = document.getElementById('bill').innerHTML;
    document.getElementById('body').innerHTML = bill;
    window.print();
    document.getElementById('body').innerHTML = body;
}














