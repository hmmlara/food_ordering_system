$(document).ready(function(){
    $('.delete').click(function(){
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
})