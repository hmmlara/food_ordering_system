$(document).ready(function(){
    // console.log('hello')
    // $('#cate_table').DataTable();
    // $('#shipping_table').DataTable();
    // $('#product_table').DataTable();
    // $('#cus_table').DataTable();

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

    //order type filter
    $('#order_type').on('change',function(){
        var value=$(this).val();
        var order_val=$('#order_method').val();
        let order_type_name = $('#order_type_name')

                let title ='';
                    if(value == 0 && order_val==0){
                        title ='';
                        order_type_name.html(title)
                    }
                    else if(value == 1 && order_val==0){
                        title +=`Filter : Pick up`
                        order_type_name.html(title)
                        
                    }
                    else  if(value == 2 && order_val==0){
                        title +=`Filter : Delivery`
                        order_type_name.html(title)
                    }
                    else if(value == 0 && order_val==1){
                        title +=`Filter : Order by phone`;
                        order_type_name.html(title)
                    }
                    else if(value == 1 && order_val==1){
                        title +=`Filter : Order by phone && Pick up`
                        order_type_name.html(title)
                        
                    }
                    else  if(value == 2 && order_val==1){
                        title +=`Filter : Order by phone && Delivery`
                        order_type_name.html(title)
                    }
                    else if(value == 0 && order_val==2){
                        title +=`Filter : Order by Account`;
                        order_type_name.html(title)
                    }
                    else if(value == 1 && order_val==2){
                        title +=`Filter : Order by Account && Pick up`
                        order_type_name.html(title)
                        
                    }
                    else  if(value == 2 && order_val==2){
                        title +=`Filter : Order by Account && Delivery`
                        order_type_name.html(title)
                    }
        $.ajax({
            url:"order_type_filter.php",
            type:"POST",
            data:{value:value,order_val:order_val} ,
            success:function(response){
                let data = JSON.parse(response);
                // console.log(data.delivery_id)
                let t_body = $('#order_tbody');

                
                
                
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
                                <a class='btn btn-sm btn-warning' href='order_details.php?id=${data[i].id}'>အသေးစိတ်</a>
                            </td>
                        </tr>
                        `;
                }

                t_body.html(show);
            }
        })
    })

    //order_method_filter
    $('#order_method').on('change',function(){
        var order_val = $(this).val();
        var value = $('#order_type').val();
        // alert(cate_filter);
        let order_type_name = $('#order_type_name')

                let title ='';
                    if(order_val == 0 && value==0){
                        title ='';
                        order_type_name.html(title)
                    }
                    else if(order_val == 1 && value==0){
                        title +=`Filter : Order by Phone`
                        order_type_name.html(title)
                        
                    }
                    else  if(order_val == 2 && value==0){
                        title +=`Filter : Order by Account`
                        order_type_name.html(title)
                    }
                    else if(order_val == 0 && value==1){
                        title +=`Filter : Pick Up`;
                        order_type_name.html(title)
                    }
                    else if(order_val == 1 && value==1){
                        title +=`Filter : Order by Phone && Pick up`
                        order_type_name.html(title)
                        
                    }
                    else  if(order_val == 2 && value==1){
                        title +=`Filter : Order by Acocunt && Pick up`
                        order_type_name.html(title)
                    }
                    else if(order_val == 0 && value==2){
                        title +=`Filter : Delivery`;
                        order_type_name.html(title)
                    }
                    else if(order_val == 1 && value==2){
                        title +=`Filter : Order by Phone && Delivery`
                        order_type_name.html(title)
                        
                    }
                    else  if(order_val == 2 && value==2){
                        title +=`Filter : Order by Account && Delivery`
                        order_type_name.html(title)
                    }
        $.ajax({
            url:"order_method_filter.php",
            type:"POST",
            data:{value:value,order_val:order_val},
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
                                <a class='btn btn-sm btn-warning' href='order_details.php?id=${data[i].id}'>အသေးစိတ်</a>
                            </td>
                        </tr>
                        `;
               }

               t_body.html(show);
            }
        })
    })

    //reset 
    $('#reset').on('click',function(){
        // alert('hello')
        // location.reload(true);
        var order_method = $('#order_method')[0];
        var order_type = $('#order_type')[0];

        order_method.selectedIndex=0;
        order_type.selectedIndex=0;
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














