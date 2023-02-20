<?php
ob_start();
include_once 'layouts/header.php';
include_once "controller/shipping_controller.php";

$shippingController=new ShippingController();
$shipping=$shippingController->getShipping();



if(isset($_POST['add'])){
    if(!empty($_POST['township'])){
        $township=$_POST['township'];
    }
    if(!empty($_POST['cost'])){
        $cost=$_POST['cost'];
    }
    $add=$shippingController->addShipping($township,$cost);
    if($add){
        header('location:shipping.php');
    }
}




?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    
                       
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                    
                </div>


                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                    <a href="shipping.php" class="btn btn-primary my-2">ထွက်မည်</a>
                        <form action="" method="post">
                            <div class="my-3">
                                <label for="" class="form-label" >မြို့နယ်များ</label>
                                <input type="text" name="township" id="" class="form-control">
                            </div>
                            <div class="my-3">
                                <label for="" class="form-label" >ဈေးနှုန်း</label>
                                <input type="text" name="cost" id="" class="form-control">
                            </div>
                          
                            <div class="my-3">
                                <button class="btn btn-success" name="add">ထည့်မည်</button>
                            </div>
                        </form>

                    </div>
                    <div class="col-md-3"></div>
                </div> 
                  

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

          <?php
include_once 'layouts/footer.php';

?>

