<?php
include_once "layouts/header.php";
// include_once __DIR__."/../admin/includes/connect.php";
include_once "controller/user_controller.php";
include_once "controller/viewCart_controller.php";


$user_info_id = $_SESSION['user_array']['id'];
$orders = new ViewCartController();
$order_details_result = $orders->getOrderMaxID($user_info_id);
$order_id = $order_details_result['max(id)'];
$orders_details = $orders->get_order($user_info_id);
// var_dump($orders_details);
$orderDetails = $orders->get_orderDetails($order_id);
var_dump($orderDetails);
                                           
    $productID = $orderDetails['product_id'];

    var_dump($productID);
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
                        <th>Status</th>						
                        <th>Items</th>
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
                                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#orderStatus' . $orderID . '" class="view"><i class="material-icons">&#xE5C8;</i></button></td>
                                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#orderItem' . $orderID . '" class="view" title="View Details"><i class="material-icons">&#xE5C8;</i></button></td>
                                </tr>';
                        }
                        
                        if($counter==0) {
                            ?><script> document.getElementById("empty").innerHTML = '<div class="col-md-12 my-5"><div class="card"><div class="card-body cart"><div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3"><h3><strong>You have not ordered any items.</strong></h3><h4>Please order to make me happy :)</h4> <a href="index.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a> </div></div></div></div>';</script> <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div> 

    <?php 
    }
    else {
        echo '<div class="container" style="min-height : 610px;">
        <div class="alert alert-info my-3">
            <font style="font-size:22px"><center>Check your Order. You need to <strong><a class="alert-link" data-toggle="modal" data-target="#loginModal">Login</a></strong></center></font>
        </div></div>';
    }
    ?>

    <?php 
    // include_once "controller/viewCart_controller.php";
    // $orders = new ViewCartController();
    $orders_details = $orders->get_order($user_info_id);
    foreach ($orders_details as $key => $value) {

        $orderid = $value['id'];


    ?>

    <!-- Modal -->
    <div class="modal fade" id="orderItem<?php echo $orderid; ?>" data-bs-backdrop="static" role="dialog" data-bs-keyboard="false" tabindex="-1" aria-labelledby="orderItem<?php echo $orderid; ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-white bg-dark">
                    <h1 class="modal-title fs-5" id="orderItem<?php echo $orderid; ?>">Order Items</h1>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="container text-black bg-white">
                            <div class="row">
                                <!-- Shopping cart table -->
                                <div class="table-responsive">
                                    <table class="table text">
                                    <thead>
                                        <tr>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="px-3">Item</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="text-center">Quantity</div>
                                        </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php
                                            $orderDetails = $orders->get_orderDetails($order_id);
                                            // foreach ($orderDetails as $key => $myrow) {
                                                
                                                $productID = $orderDetails['product_id'];
                                                $productQty = $orderDetails['qty'];
                                                // $productID = $myrow['product_id'];
                                                // $productQty = $myrow['qty'];
                                                $product = $orders->get_products($productID);
                                                // var_dump($product);
                                                                                           
    
                                                    $productName = $product['name'];
                                                    $productPrice = $product['price'];
                                                    $productDesc = $product['description'];
                                                    $productCategorieId = $product['category_id'];
    
                                                    echo '<tr>
                                                            <th scope="row">
                                                                <div class="p-2">
                                                                <img src="img/pizza-'.$productID. '.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                                <div class="ml-3 d-inline-block align-middle">
                                                                    <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">'.$productName. '</a></h5><span class="text-muted font-weight-normal font-italic d-block">' .$productPrice. ' MMK</span>
                                                                </div>
                                                                </div>
                                                            </th>
                                                            <td class="align-middle text-center"><strong>' .$productQty. '</strong></td>
                                                        </tr>';

                                                

                                

                                            
                                        ?>

                                    </tbody>
                                    </table>
                                </div>
                                <!-- End -->
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    }
    ?>



    <?php 
    include 'orderItemModal.php';
    include 'orderStatusModal.php';
    include_once "layouts/footer.php";?> 
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>          -->
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
  </body>
</html>
    