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

<style>
    /* .modal-body {
        background-color: #eeeeee;
        font-family: 'Open Sans', serif
    } */

    .card {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 0.10rem
    }

    .card-header:first-child {
        border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
    }

    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1)
    }

    .track {
        position: relative;
        background-color: #ddd;
        height: 7px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin-bottom: 60px;
        margin-top: 50px
    }

    .track .step {
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        width: 25%;
        margin-top: -18px;
        text-align: center;
        position: relative
    }

    .track .step.active:before {
        background: #be8040
    }

    .track .step::before {
        height: 7px;
        position: absolute;
        content: "";
        width: 100%;
        left: 0;
        top: 18px
    }

    .track .step.active .icon {
        background: #be8040;
        color: #fff
    }

    .track .step.deactive:before {
        background: #030303;
    }

    .track .step.deactive .icon {
        background: #030303;
        color: #fff
    }

    .track .icon {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        position: relative;
        border-radius: 100%;
        background: #ddd
    }

    .track .step.active .text {
        font-weight: 400;
        color: #000
    }

    .track .text {
        display: block;
        margin-top: 7px
    }

    .btn-warning {
        color: #ffffff;
        background-color: #be8040;
        border-color: #be8040;
        border-radius: 1px
    }

    .btn-warning:hover {
        color: #ffffff;
        background-color: #be8050;
        border-color: #be8050;
        border-radius: 1px
    }
    
</style>

<div class="container my-3 py-3" style="background-color:#6c757d">
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
