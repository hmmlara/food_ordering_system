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
    <style>
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
        

    </style>

</head>
<body>

    <?php 
    if($_SESSION['user_array']){
    ?>

    <div class="container mt-0 text-dark">
        <div class="table-wrapper" id="empty">
            <div class="table-title text-dark bg-white">
                <div class="row">
                    <div class="col-sm-4">
                        <h2>Order <b>Details</b></h2>
                    </div>
                    <div class="col-sm-8">						
                        <a href="" class="btn btn-primary"><i class="material-icons">&#xE863;</i> <span>Refresh List</span></a>
                        <a href="#" onclick="window.print()" class="btn btn-info"><i class="material-icons">&#xE24D;</i> <span>Print</span></a>
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
                                    <td><a type="button" class="btn btn-primary" href="orderItemDetails.php?id=' . $orderID . '" class="view" title="View Details"><i class="material-icons">&#xE5C8;</i></a></td>
                                </tr>';
                        }
                        


                        if($counter==0){
                            ?>
                            <script> document.getElementById("empty").innerHTML = 
                            `<div class="col-md-12">
                            <div class="card">
                            <div class="card-body cart">
                            <div class="col-sm-12 empty-cart-cls text-center"> 
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#000000" fill-opacity="1" d="M0,320L1440,96L1440,0L0,0Z"></path></svg>                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>                                
                            <h3 class="mt-4"><strong>Your Cart is Empty</strong></h3>
                            <a href="index.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a> 
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 220"><path fill="#000000" fill-opacity="1" d="M0,320L1440,96L1440,320L0,320Z"></path></svg>                                
                            </div></div></div></div>`</script>; 
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
    