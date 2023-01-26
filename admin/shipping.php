<?php
include_once 'layouts/header.php';
include_once 'controller/shipping_controller.php';

 $ship_controller=new ShippingController();
 $shipping=$ship_controller->getShipping();
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <a href="create_shipping.php" class="btn btn-outline-info">Add New Shipping</a>
                        </div>
                        </div>

                        <div class="row">
                            <div class="col-md-10">
                                <table class='table table-striped'>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Township</th>
                                            <th>Cost</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id='shipping_table'>
                                        <?php
                                        for ($row=0; $row <count($shipping) ; $row++) { 
                                            echo "<tr>";
                                            echo "<td>".($row+1)."</td>";
                                            echo "<td>".$shipping[$row]['township']."</td>";
                                            echo "<td>".$shipping[$row]['cost']."</td>";
                                            echo "<td id='".$shipping[$row]['id']."'><a href='edit_shipping.php?id=".$shipping[$row]['id']."' class=' btn btn-warning mr-3'><i class='far fa-edit'></i></a><a class=' btn btn-danger delete'><i class='fas fa-trash-alt'></i></a></td>";                                           echo "</tr>";
                                        }


                                        ?>
                                    </tbody>

                                </table>

                            </div>
                        </div>

                   

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        <?php
        include_once 'layouts/footer.php';

        ?>