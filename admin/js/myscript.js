$(document).ready(function(){
    // console.log('hello')
    // $('#cate_table').DataTable();
    // $('#shipping_table').DataTable();
    // $('#product_table').DataTable();
    // $('#cus_table').DataTable();


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
    $('#order_type').on('change',function(){
        var value=$(this).val();
        // alert(value);

        $.ajax({
            url:"order_type_filter.php",
            type:"POST",
            data:{value:value},
            success:function(response){
               let data = JSON.parse(response);

               t_body = $('#order_tbody');

               let show = '';

               for(let i = 0; i < data.length; i++){
                    show += `  
                        <tr>
                            <td>${i+1}</td>
                            <td>od-${data[i].id}</td>
                            <td>${data[i].cus_name}</td>
                            <td>${(data[i].delivery_id == 1)? 'Pick up': 'Delivery Man'}</td>
                            <td>${data[i].created_date.split(" ")[0]}</td>
                            <td>
                                <a class='btn btn-sm btn-warning' href='order_details.php?id=${data[i].id}'>Details</a>
                            </td>
                        </tr>
                        `;
               }

               t_body.html(show);
            }
        })
    })
});

function myprint(){
    var body = document.getElementById('body').innerHTML;
    var bill = document.getElementById('bill').innerHTML;
    document.getElementById('body').innerHTML = bill;
    window.print();
    document.getElementById('body').innerHTML = body;
}















