<?php
ob_start();
include_once 'layouts/header.php';
include_once 'controller/delivery_controller.php';
include_once 'controller/shipping_controller.php';

$delivery_controller=new DeliveryController();
$delivery = $delivery_controller->getDelivery();

$ship_controller=new ShippingController();
 $shipping=$ship_controller->getShipping();

$id=$_GET['id'];
 $result=$delivery_controller->getDeli($id);

 
 if(isset($_POST['update'])){
   $township=$_POST['township'];
    $name=$_POST['status'];
    $update=$delivery_controller->updateDelivery($id,$name);

   
    if($update){
        header('location:delivery.php');
    }
}

?>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href='delivery.php' class='btn btn-outline-info'>Back</a>
            </div>
        </div>     

        <form action="" method="post" class="w-50 mx-auto">
            <div class="form-group">
                <label for="" class="form-label">Township</label>
                <input type="text" name="township" id="" class="form-control" value="<?php echo $result["township"] ?>">
            </div>

            <div class="form-group">
                <label for="" class="form-label">Delivery Type</label>
                <select name="status" id="" class="form-control">
                    <?php 
                        foreach($delivery as $deli){
                    ?>
                    <option value="<?php echo $deli["id"];?>" <?php echo ($deli["shipping_id"] == $result["ship_id"])?'selected': '';?>>
                            <?php echo $deli["status"]; ?>
                    </option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="form-grop">
                <button class='btn btn-primary' name='update'>Update</button>

            </div>
        </form>


    </div>

                  

<?php
include_once 'layouts/footer.php';

?>