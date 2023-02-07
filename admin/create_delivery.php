<?php
ob_start();
include_once 'layouts/header.php';
include_once 'controller/delivery_controller.php';
include_once 'controller/shipping_controller.php';

$delivery_controller=new DeliveryController();
$delivery=$delivery_controller->getDelivery();

$ship_controller=new ShippingController();
 $shipping=$ship_controller->getShipping();

?>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href='delivery.php' class='btn btn-outline-info'>Back</a>
            </div>
        </div>

        <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <form action="" method="post">
                            <div class="my-3">
                                <label for="" class="form-label" >Township</label>
                                <input type="text" name="township" id="" class="form-control" >
                            </div>

                            <div>
                                <select name="name" id="" class="form-control">
                                    
                                    <?php
                                    echo "<option> Deli Type </option>";
                                    for ($index=0; $index <count($delivery) ; $index++) { 
                                        if($delivery[$index]['shipping_id']==$shipping[$index]['id']){
                                            echo "<option>".$delivery[$index]['status']."</option>";
                                        }
                                    }


                                  ?>

                                </select>
                            </div>
                           
                            <div class="my-3">
                                <button class="btn btn-primary" name="add">Add</button>
                            </div>
                        </form>

                    </div>
                    <div class="col-md-3"></div>
                </div>      

                </div>

                  

<?php
include_once 'layouts/footer.php';

?>