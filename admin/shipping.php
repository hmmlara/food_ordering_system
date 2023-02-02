<?php
include_once 'layouts/header.php';
include_once 'controller/shipping_controller.php';

 $ship_controller=new ShippingController();
 $shipping=$ship_controller->getShipping();
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                        
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <a href="create_shipping.php" class="btn btn-success">Add New Shipping</a>
                        </div>
                        </div>

                            <div class="col-md-8">
                                <table class='table table-striped' id="shipping_table">
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
                                            echo "<td><a href='edit_shipping.php?id=".$shipping[$row]['id']."' class=' btn-sm btn-info mr-3'>Edit</a><a href='delete_shipping.php?id=".$shipping[$row]['id']."' class=' btn-sm btn-danger delete'>Delete</a></td>";                                           echo "</tr>";
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