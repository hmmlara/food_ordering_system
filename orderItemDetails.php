<?php
include_once "layouts/header.php";

include_once 'admin/controller/product_controller.php';

include_once "controller/viewCart_controller.php";


$order_id= $_GET['id'];
// var_dump($order_id);
$orders = new ViewCartController();
$orderDetails = $orders->get_orderDetails($order_id);
$product = $orders->get_products();            

$orderStatus = $orders->get_OrderStatus($order_id);
// var_dump($orderStatus['status']);
$status = $orderStatus['status'];
if ($status == 0) 
$tstatus = "Order Placed.";
elseif ($status == 1) 
$tstatus = "Order Confirmed.";
elseif ($status == 2)
$tstatus = "Preparing your Order.";
elseif ($status == 3)
$tstatus = "Your order is on the way!";
elseif ($status == 4) 
$tstatus = "Order Delivered.";
elseif ($status == 5) 
$tstatus = "Order Denied.";
else
$tstatus = "Order Cancelled.";



// var_dump($orderDetails[0]['order_id']);
// var_dump($orderDetails[1]['product_id']);
// var_dump($product);

?>


<div class="container my-3 py-3" style="background-color:#6c757d">
    <div class="row">
        <div class="col-md-10"></div>
        <div class="col-md-2 mb-3">
            <a href="#" onclick="window.print()" class="btn btn-warning">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                </svg>
            <span>Print</span></a>
        </div>
    </div>
    <div class="row">
        <!-- Shopping cart table -->
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table text">
                <thead>
                    <tr>
                    <th scope="col" class="border-0 bg-light">
                        <div class="px-3 text-center">No</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                        <div class="px-3 text-center">Item</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                        <div class="text-center">Quantity</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                        <div class="text-center">Price</div>
                    </th>
                    <th scope="col" class="border-0 bg-light">
                        <div class="text-center">Sub Total</div>
                    </th>
                    </tr>
                </thead>
                <tbody class="text-white text-center">
                    <?php
                    $count=1;

                    foreach ($orderDetails as $key => $value) {
                        echo "<tr>";
                        foreach ($product as $item) {
                            if($value['product_id'] == $item['id']) {
                                echo "<td>".$count."</td>";
                                echo "<td>".$item['name']."</td>";
                                echo "<td>".$value['qty']."</td>";
                                echo "<td>".$item['price']."</td>";
                                echo "<td>".$item['price']*$value['qty']."</td>";
                                $count++;

                            }

                        }
                        echo "</tr>";
                    }


                    echo "<tr>";
                    echo "<td colspan='4'>Total Balance</td>";
                    echo "<td>".$orderStatus['total_balance']."</td>";
                    echo "</tr>";

                    ?>

                </tbody>
                </table>
            </div>
        </div>
        <!-- End -->
    </div>

    <div class="row text-dark">
        <div class="col-md-12">
        <div class="container" style="padding-right: 0px;padding-left: 0px;">
                    <article class="card">
                        <div class="card-body">
                            <h6><strong>Order ID:</strong> #<?php echo $order_id; ?></h6>
                            <article class="card">
                                <div class="card-body row">
                                    <div class="col"> <strong>Status:</strong> <br> <?php echo $tstatus; ?> </div>
                                </div>
                            </article>
                            <div class="track">
                            <?php
                                if($status == 0){
                                      echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Placed</span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text">Order Confirmed</span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text"> Preparing your Order</span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Order Delivered</span> </div>';
                                }
                                elseif($status == 1){
                                    echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Placed</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Confirmed</span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text"> Preparing your Order</span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Order Delivered</span> </div>';
                                }
                                elseif($status == 2){
                                    echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Placed</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Confirmed</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Preparing your Order</span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Order Delivered</span> </div>';
                                }
                                elseif($status == 3){
                                    echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Placed</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Confirmed</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Preparing your Order</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Order Delivered</span> </div>';
                                }
                                elseif($status == 4){
                                    echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Placed</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Confirmed</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Preparing your Order</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Order Delivered</span> </div>';
                                } 
                                elseif($status == 5){
                                    echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Placed</span> </div>
                                          <div class="step deactive"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text">Order Denied.</span> </div>';
                                }
                                else {
                                    echo '<div class="step deactive"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text">Order Cancelled.</span> </div>';
                                }
                            ?>
                            </div>
                            <a href="contact.php" class="btn btn-warning" data-abc="true">Help <i class="fa fa-chevron-right"></i></a>
                        </div>
                    </article>
                </div>
        </div>
    </div>
</div>




<?php
include_once "layouts/footer.php";


?>
