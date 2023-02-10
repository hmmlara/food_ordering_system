$(document).ready(function(){
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
    $( function() {
        $( "#start_date" ).datepicker({
            "dateFormat":"yy-mm-dd"
        });
        $( "#end_date" ).datepicker({
            "dateFormat":"yy-mm-dd"
        });
    } );
})