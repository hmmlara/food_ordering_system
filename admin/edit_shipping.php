<?php
ob_start();
include_once 'layouts/header.php';
include_once "controller/shipping_controller.php";

$shippingController=new ShippingController();
$shipping=$shippingController->getShipping();

$id=$_GET['id'];
$result=$shippingController->editShipping($id);

if(isset($_POST['update'])){
    if(!empty($_POST['township'])){
        $township=$_POST['township'];
    }
    if(!empty($_POST['cost'])){
        $cost=$_POST['cost'];
    }
    $update=$shippingController->updateShipping($id,$township,$cost);
    if($update){
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
                    <div class="col-md-6">
                        
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <a href="shipping.php" class="btn btn-primary my-2">ထွက်မည်</a>
                        <form action="" method="post">
                            <div class="my-3">
                                <label for="" class="form-label" >မြို့နယ်များ</label>
                                <input type="text" name="township" id="" class="form-control" value="<?php echo $result['township'];?>">
                            </div>
                            <div class="my-3">
                                <label for="" class="form-label" >ဈေးနှုန်း</label>
                                <input type="text" name="cost" id="" class="form-control" value="<?php echo $result['cost'];?>">
                            </div>
                          
                            <div class="my-3">
                                <button class="btn btn-success" name="update">ထည့်မည်</button>
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

