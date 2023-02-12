<?php
    include_once "controller/order_controller.php";

$orderController = new OrderController();
$orders = $orderController->getOrderinfo(); 
if(isset($_POST['value'])){
    
   if($_POST['value'] == 0){
        $data = $orders;
   }
   else{
    $data = array_values(array_filter($orders,function($value){
        if($value["delivery_id"] == $_POST["value"]){
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