<?php
    include_once "layouts/header.php";
    include_once "controller/order_controller.php";
    include_once "controller/product_controller.php";
    $id=$_GET['id'];
    $order=new OrderController();

    $order_details=$order->getOrderDetails($id);

    $productController= new ProductController();
    $getproducts=$productController->getProducts();
    // echo '<pre>';
    // var_dump($order_details);
    // echo '</pre>';

?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Order details</h1>
                    <!-- <div class="row">
                        <div class="col-md-4">
                            <select name="pickup_deli_filter" id="" class="form-control">
                                <option value="">Select order type</option>
                                <option value="Pick_up">Pick Up</option>
                                <option value="Delivery_men">Delivery Men</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            
                        </div>
                    </div> -->
                    <a href="orders.php" class="btn btn-outline-primary">Back</a>
                    <div class="row">

                        <div class="col-md-4"></div>

                        <div class="col-md-4 shadow">
                            <?php
                                echo "<div class='row mt-3'>
                                        <div class='col-md-6'>
                                            <p>Order number:</p>
                                        </div>
                                        <div class='col-md-6'>".
                                            $order_details[0]['order_id']."
                                        </div>
                                    </div>";
                                echo "<div class='row'>
                                        <div class='col-md-6'>
                                            <p>Order date:</p>
                                        </div>
                                        <div class='col-md-6'>".
                                            $order_details[0]['created_date']."
                                        </div>
                                    </div>";
                                echo "<hr>";
                                    $array=[];
                                for($index=0;$index<count($order_details);$index++){
                                    $itemtotal=$order_details[$index]['qty']*$order_details[$index]['price'];
                                    array_push($array,$itemtotal);
                                    for($i=0;$i<count($getproducts);$i++){
                                        if($getproducts[$i]['id']==$order_details[$index]['product_id']){
                                            echo "<div class='row'>
                                                    <div class='col-md-6'>
                                                        <p>".$getproducts[$i]['name'].":".$order_details[$index]['qty']."</p>
                                                    </div>
                                                    <div class='col-md-6'>
                                                        <p>".$itemtotal."</p>
                                                    </div>
                                                </div>";
                                        }
                                    }
                                }
                                echo "<hr>";
                                echo "<div class='row'>
                                        <div class='col-md-6'>
                                            <p>Subtotal:</p>
                                        </div>
                                        <div class='col-md-6'>".
                                            array_sum($array)."
                                        </div>
                                    </div>";
                            ?>

                        </div>
                        <div class="col-md-4"></div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            


    <?php
        include_once "layouts/footer.php";
    ?>