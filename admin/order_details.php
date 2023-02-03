<?php
    include_once "layouts/header.php";
    include_once "controller/order_controller.php";
    $id=$_GET['id'];
    $order=new OrderController();
    $order_details=$order->getOrderDetails($id);
?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Orders</h1>
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
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">

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