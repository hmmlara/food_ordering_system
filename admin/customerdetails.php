<?php
    include_once "layouts/header.php";
    include_once "controller/user_controller.php";

    $cus_controller=new UserController();
    $id=$_GET['id'];
    $customer_details=$cus_controller->getCustomerDetails($id);
    //var_dump($customer_details);
?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Customers</h1>
                    <a href="customers.php" class="btn btn-primary">Back</a>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4 d-flex justify-content-center bg-white">
                            <?php
                                echo "<h4> Customer name:  ".$customer_details[0]['name']."</h4>";
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