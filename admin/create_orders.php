<?php
ob_start();
include_once 'layouts/header.php';
include_once 'controller/product_controller.php';
include_once 'controller/categories_controller.php';
include_once 'controller/order_controller.php';

$products_controller=new ProductController();
$products=$products_controller->getProducts();

$orders=new OrderController();
$deli=$orders->getDeliType();
// var_dump($deli);
// $categories=new CategoriesController();
// $results=$categories->getcategories();

// if(isset($_POST['add'])){
//     $type=$_POST['type'];
//     $size=$_POST['size'];
//     if(!empty($_POST['name'])){
//         $name=$_POST['name'];
//     }

//     $filename=$_FILES['image']['name'];
//     $filesize=$_FILES['image']['size'];
//     $temfile=$_FILES['image']['tmp_name'];
//     if($_FILES['image']['error']!=0)
//     {
//         echo "File is empty";
//     }
//     else
//     {
//         $fileinfo=explode('.',$filename);
//         var_dump($fileinfo);
//         $actual_extension=end($fileinfo);
//         $allowed_extensions=['jpg','jpeg','png','svg','pdf'];
//         if(in_array($actual_extension,$allowed_extensions))
//         {
//             if($filesize<=2000000)
//             {
//                 $filename= uniqid().'_fom'.$filename;
//                 move_uploaded_file($temfile,'uploads/'. $filename);
//             }
//             else
//             {
//                 echo "Max file size is 2 M and your file excceeds max file size";
//             }
//         }
//         else{
//             echo "File type is not allowed";
//         }
// }

//         if(!empty($_POST['price'])){
//             $price=$_POST['price'];
//         }

//         if(!empty($_POST['description'])){
//             $description=$_POST['description'];
//         }
//         $result=$products_controller->addProducts($type,$size,$name,$filename,$price,$description);
//         if($result){
//             header('location:products.php');
//         }
// }

?>
        <div class="container">
         <div class="row">           
             <div class="col-md-4">
             <a href="orders.php" class="btn btn-primary my-4">ထွက်မည်</a>
            </div>
         </div>

        <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <?php
                        for($i=0;$i<count($deli);$i++){
                            echo "<input class='form-check-input mx-2' type='radio' name='deli_type'>".explode('-',$deli[$i]['status'])[1];
                        }
                    ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="" class="form-label">လိပ်စာ</label>
                    <input type="text" name="address" id="" class="form-control">
                </div>
                <div class="col-md-3">
                    
                </div>
            </div>
        </div>
        </form>

        </div>
        <?php
        require "layouts/footer.php";
        ?>


<!-- <div class="mb-3">
                        <select name="type" id="" class="form-select">
                        <?php
                            // echo "<option hidden> အော်ဒါအမျိုးအစားများ </option>";
                            // for ($index=0; $index <count($deli) ; $index++) { 
                            //     echo "<option value='".$deli[$index]['id']."'>".explode("-",$deli[$index]['status'])[1]."</option>";
                            // }
                            ?>
                            </select>
        </div> -->