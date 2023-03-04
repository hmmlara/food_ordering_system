<?php
include_once "layouts/header.php";
// include_once __DIR__."/../admin/includes/connect.php";
include_once "controller/user_controller.php";
include_once "controller/viewCart_controller.php";


$user_info_id = $_SESSION['user_array']['id'];
$orders = new ViewCartController();
$order_details_result = $orders->getOrderMaxID($user_info_id);
$order_id = $order_details_result['max(id)'];
// echo $order_id;
$orders_details = $orders->get_order($user_info_id);
// var_dump($orders_details);
$orderDetails = $orders->get_orderDetails($order_id);
// var_dump($orderDetails[0]);
$product = $orders->get_products();                                 
// $productID = $orderDetails['product_id'];

// var_dump($product);
// $product = $orders->get_products($productID);
// var_dump($products);

foreach ($orders_details as $key => $value) {

    $orderid = $value['id'];
    // var_dump($orderid);
}


?>
 
    

 <!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Your Order</title>
    <link rel = "icon" href ="img/logo.jpg" type = "image/x-icon">
    <!-- <style>
        .footer {
        position: fixed;
        bottom: 0;
        }
        .table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px auto;
        border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .table-wrapper .btn {
            float: right;
            color: #333;
            background-color: #fff;
            border-radius: 3px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }
        .table-wrapper .btn:hover {
            color: #333;
            background: #f2f2f2;
        }
        .table-wrapper .btn.btn-primary {
            color: #fff;
            background: #03A9F4;
        }
        .table-wrapper .btn.btn-primary:hover {
            background: #03a3e7;
        }
        .table-title .btn {		
            font-size: 13px;
            border: none;
        }
        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }
        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }
        .table-title {
            color: #fff;
            background: #4b5366;		
            padding: 16px 25px;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }
        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }
        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }
        table.table tr th:first-child {
            width: 60px;
        }
        table.table tr th:last-child {
            width: 80px;
        }
        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }
        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }
        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }	
        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
        }
        table.table td a:hover {
            color: #2196F3;
        }
        table.table td a.view {        
            width: 30px;
            height: 30px;
            color: #2196F3;
            border: 2px solid;
            border-radius: 30px;
            text-align: center;
        }
        table.table td a.view i {
            font-size: 22px;
            margin: 2px 0 0 1px;
        }   
        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }
        table {
            counter-reset: section;
        }

        .count:before {
            counter-increment: section;
            content: counter(section);
        }
        

    </style> -->

</head>
<body>

    <?php 
    if($_SESSION['user_array']){
    ?>

    <div class="container d-none d-md-block d-lg-block d-xl-block mt-4 text-dark bg-white">
        <div class="table-wrapper" id="empty">
            <div class="table-title text-dark bg-white">
                <div class="row bg-dark text-center">
                    <div class="col-sm-12">
                        <h2 class="text-warning">Order <b>Details</b></h2>
                    </div>
                </div>
            </div>
            
            <table class="table table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Address</th>
                        <th>Phone No</th>
                        <th>Amount</th>						
                        <th>Payment Mode</th>
                        <th>Order Date</th>
                        <th>Details</th>						
                    </tr>
                </thead>
                <tbody>
                    <?php

                        $counter = 0;
                        foreach ($orders_details as $row) {
                            // $order_id = $row[$order_id'];
                            $orderID = $row['id'];
                            $address = $row['address'];
                            $phoneNo = $row['phone_number'];
                            $amount = $row['total_balance'];
                            $orderDate = $row['created_date'];
                            $paymentMode = $row['paymentMode'];
                            // if($paymentMode == 0) {
                            //     $paymentMode = "Cash on Delivery";
                            // }
                            // else {
                            //     $paymentMode = "Online";
                            // }
                            $orderStatus = $row['status'];
                            
                            $counter++;
                            
                            echo '<tr>
                                    <td>' . $orderID . '</td>
                                    <td>' . substr($address, 0, 20) . '...</td>
                                    <td>' . $phoneNo . '</td>
                                    <td>' . $amount . '</td>
                                    <td>' . $paymentMode . '</td>
                                    <td>' . $orderDate . '</td>
                                    <td><a type="button" class="btn btn-warning" href="orderItemDetails.php?id=' . $orderID . '" class="view" title="View Details">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-square" viewBox="0 0 16 16">
                                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                        </svg>
                                    </a></td>
                                </tr>';
                        }
                        


                        if($counter==0){
                            ?>
                            <script> document.getElementById("empty").innerHTML = 
                                `<div class="col-md-12">
                                <div class="card">
                                <div class="card-body cart">
                                <div class="col-sm-12 empty-cart-cls text-center"> 
                                <h3 class="mt-4"><strong>You have not ordered any items.</strong></h3>
                                <h5 class="mt-4"><strong>Please order to make me happy :)</strong></h5>
                                <a href="index.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a> 
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 220"><path fill="#000000" fill-opacity="1" d="M0,320L1440,96L1440,320L0,320Z"></path></svg>                                
                                </div></div></div></div>`</script>
                            <?php

                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div> 

    <?php 
    }
    ?>

<div class="mobile-view d-block d-md-none d-lg-none d-xl-none">
    <h2 class="text-warning text-center">Order <b>Details</b></h2>

    <?php 
    if($_SESSION['user_array']){

            $counter = 0;
            foreach ($orders_details as $row) {
                // $order_id = $row[$order_id'];
                $orderID = $row['id'];
                $address = $row['address'];
                $phoneNo = $row['phone_number'];
                $amount = $row['total_balance'];
                $orderDate = $row['created_date'];
                $paymentMode = $row['paymentMode'];
                // if($paymentMode == 0) {
                //     $paymentMode = "Cash on Delivery";
                // }
                // else {
                //     $paymentMode = "Online";
                // }
                $orderStatus = $row['status'];
                
                $counter++;
                
                echo '
                        <div class="mobile-item card"">
                            <div class="card-body text-dark">
                                <div class="my-2">
                                    <span class="fw-bold">Order Id -</span>
                                    <span class="mx-2 payStatus">'.$order_id.'</span>
                                </div>
                                <div class="my-2">
                                    <span class="fw-bold">Address -</span>
                                    <span class="mx-2 text-center">'.substr($address, 0, 20).'</span>
                                </div>
                                <div class="my-2">
                                    <span class="fw-bold">Phone No -</span>
                                    <span class="mx-2 text-center">'. $phoneNo .'</span>
                                </div>
                                <div class="my-2">
                                    <span class="fw-bold">Amount -</span>
                                    <span class="mx-2 text-center">'.$amount .'</span>
                                </div>
                                <div class="my-2">
                                    <span class="fw-bold">Payment Mode -</span>
                                    <span class="mx-2 text-center">'. $paymentMode .'</span>
                                </div>
                                <div class="my-2">
                                    <span class="fw-bold">Order Date -</span>
                                    <span class="mx-2 text-center">'. $orderDate .'</span>
                                </div>
                                <div class="my-2">
                                    <span class="fw-bold">Details -</span>
                                    <span class="mx-2 text-center">
                                        <a type="button" class="btn btn-warning" href="orderItemDetails.php?id=' . $orderID . '" class="view" title="View Details">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-square" viewBox="0 0 16 16">
                                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                            </svg>
                                        </a>
                                    </span>
                                </div>                    
                            </div>
                        </div>';
            }
                        


            if($counter==0){
                ?>
                <script> document.getElementById("empty").innerHTML = 
                    `<div class="col-md-12">
                    <div class="card">
                    <div class="card-body cart">
                    <div class="col-sm-12 empty-cart-cls text-center"> 
                    <h3 class="mt-4"><strong>You have not ordered any items.</strong></h3>
                    <h5 class="mt-4"><strong>Please order to make me happy :)</strong></h5>
                    <a href="index.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a> 
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 220"><path fill="#000000" fill-opacity="1" d="M0,320L1440,96L1440,320L0,320Z"></path></svg>                                
                    </div></div></div></div>`</script>
                <?php

            }
        ?>

    <?php 
    }
    ?>

</div>




    <?php 
    include_once "layouts/footer.php";?> 
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>          -->
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
  </body>
</html>
    