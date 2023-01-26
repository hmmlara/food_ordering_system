<?php
include_once 'layouts/header.php';
include_once 'controller/delivery_controller.php';
include_once 'controller/shipping_controller.php';

$delivery_controller=new DeliveryController();
$delivery=$delivery_controller->getDelivery();

$ship_controller=new ShippingController();
$shipping=$ship_controller->getShipping();

?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Delivery</h1>
                       
                    </div>
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <a href="create_delivery.php" class="btn btn-outline-info">Add New Delivery</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <table class='table table-striped'>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Township</th>
                                        <th>Deli Type</th>
                                        <th>Actions</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    for ($row=0; $row <count($delivery) ; $row++) { 
                                        echo "<tr>";
                                        echo "<td>".($row+1)."</td>";
                                        for ($index=0; $index <count($shipping) ; $index++) { 
                                            if($shipping[$index]['id']==$delivery[$row]['shipping_id']){
                                             echo "<td>". $shipping[$index]['township'];
                                         }
                                         }
                                        echo "<td>".$delivery[$row]['status']."</td>";
                                        echo "<td id='".$delivery[$row]['id']."'><a href='edit_delivery.php?id=".$delivery[$row]['id']."' class=' btn btn-warning mr-3'><i class='far fa-edit'></i></a><a class=' btn btn-danger delete'><i class='fas fa-trash-alt'></i></a></td>";
                                        echo "</tr>";
                                        
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