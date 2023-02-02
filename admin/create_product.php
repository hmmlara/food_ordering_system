<?php
ob_start();
include_once 'layouts/header.php';
include_once 'controller/product_controller.php';
include_once 'controller/categories_controller.php';

$products_controller=new ProductController();
$products=$products_controller->getProducts();
$parent=$products_controller->getParent();

$categories=new CategoriesController();
$results=$categories->getcategories();

if(isset($_POST['add'])){
    $type=$_POST['type'];
    $size=$_POST['size'];
    if(!empty($_POST['name'])){
        $name=$_POST['name'];
    }

    $filename=$_FILES['image']['name'];
    $filesize=$_FILES['image']['size'];
    $temfile=$_FILES['image']['tmp_name'];
    if($_FILES['image']['error']!=0)
    {
        echo "File is empty";
    }
    else
    {
        $fileinfo=explode('.',$filename);
        var_dump($fileinfo);
        $actual_extension=end($fileinfo);
        $allowed_extensions=['jpg','jpeg','png','svg','pdf'];
        if(in_array($actual_extension,$allowed_extensions))
        {
            if($filesize<=2000000)
            {
                $filename= uniqid().'_fom'.$filename;
                move_uploaded_file($temfile,'uploads/'. $filename);
            }
            else
            {
                echo "Max file size is 2 M and your file excceeds max file size";
            }
        }
        else{
            echo "File type is not allowed";
        }
}

        if(!empty($_POST['price'])){
            $price=$_POST['price'];
        }

        if(!empty($_POST['description'])){
            $description=$_POST['description'];
        }
        $result=$products_controller->addProducts($type,$name,$price,$description,$size,$filename);
        if($result){
            header('location:products.php');
        }
}

?>
        <div class="container">
        <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
             <h1 class="h3 mb-0 text-gray-800">Products</h1>
                        
         </div> -->
         <div class="row">           
             <div class="col-md-4">
             <a href="products.php" class="btn btn-outline-info">Back</a>
            </div>
         </div>
        <div class="row">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="col-md-8">
                <div class="row">
                   
                    <div class="col-md-6 my-2">
                    <select name="type" id="" class="form-control">
                      <?php
                         echo "<option hidden> Category Type </option>";
                         for ($index=0; $index <count($products) ; $index++) { 
                            echo "<option value='".$products[$index]['id']."'>".$parent[$index]['name']."</option>";
                        }
                                  ?>

                                </select>

                        </select>
                    </div>

                    <div class="col-md-6 my-2 ">
                    <select name="size" id="" class="form-control">
                        <option value="1-large">Large</option>
                        <option value="0-small">Small</option>
                    </select>
                        
                    </div>

                    <div class="col-md-6" >
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" id="" class="form-control">
                      </div>

                      <div class="col-md-6" >
                        <label for="" class="form-label">Image</label>
                        <input type="file" name="image" id="" class="form-control">
                      </div>

                      <div class="col-md-6 " >
                        <label for="" class="form-label">Price</label>
                        <input type="text" name="price" id="" class="form-control">
                      </div> 
                      
                      <div class="col-md-6" >
                        <label for="" class="form-label">Description</label>
                        <input type="text" name="description" id="" class="form-control">
                      </div>

                     

                     
                    
                    <div class="col-md-4 my-2">
                    <button class="btn btn-outline-info" name="add">Add</button>
                    </div> 
                    
                    </form>
                  

                </div>
            </div>
        </div>


        


        </div>