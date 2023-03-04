<?php
    include_once "controller/order_controller.php";

$orderController = new OrderController();
$orders = $orderController->getOrderinfo(); 
if(isset($_POST['order_val'])){
    
    if($_POST['order_val']==0 &&  $_POST['value'] == 0 ){
        $data = $orders;
    }
    else if($_POST['order_val']==0 &&  $_POST['value'] == 1 ){
        $data = array_values(array_filter($orders,function($value){
            if($value['delivery_id'] == 1){
                return $value;
            }
        }));
    }
    else if($_POST['order_val']==0  && $_POST['value'] == 2){
        $data = array_values(array_filter($orders,function($value){
            if($value['delivery_id'] == 2){
                return $value;
            }
        }));
    }
    else if($_POST['order_val']==1  && $_POST['value'] == 0){
        $data = array_values(array_filter($orders,function($value){
            if($value['email'] == 'userdefault@gmail.com'){
                return $value;
            }
        }));
    }
    else if($_POST['order_val']==1  && $_POST['value'] == 1){
        $data = array_values(array_filter($orders,function($value){
            if($value['email'] == 'userdefault@gmail.com' && $value['delivery_id'] == 1){
                return $value;
            }
        }));
    }
    else if($_POST['order_val']==1  && $_POST['value'] == 2){
        $data = array_values(array_filter($orders,function($value){
            if($value['email'] == 'userdefault@gmail.com' && $value['delivery_id'] == 2){
                return $value;
            }
        }));
    }
    else if($_POST['order_val']==2  && $_POST['value'] == 0){
        $data = array_values(array_filter($orders,function($value){
            if($value['email'] != 'userdefault@gmail.com'){
                return $value;
            }
        }));
    }
    else if($_POST['order_val']==2  && $_POST['value'] == 1){
        $data = array_values(array_filter($orders,function($value){
            if($value['email'] != 'userdefault@gmail.com' && $value['delivery_id'] == 1){
                return $value;
            }
        }));
    }
    else if($_POST['order_val']==2  && $_POST['value'] == 2){
        $data = array_values(array_filter($orders,function($value){
            if($value['email'] != 'userdefault@gmail.com' && $value['delivery_id'] == 2){
                return $value;
            }
        }));
    }

    echo json_encode($data);
   
}
else{
    echo 'Not Found';
}

?>