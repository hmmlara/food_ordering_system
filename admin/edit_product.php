<?php
ob_start();
include_once 'layouts/header.php';
include_once 'controller/product_controller.php';
include_once 'controller/categories_controller.php';

$products_controller=new ProductController();
$products=$products_controller->getProducts();

$categories=new CategoriesController();
$results=$categories->getcategories();
$id=$_GET['id'];
$result=$products_controller->editProduct($id);
if(isset($_POST['update'])){
    $type=$_POST['type'];
    if(!empty($_POST['name'])){
        $name=$_POST['name'];
    }
    $filename=$_FILES['image']['name'];
    $filesize=$_FILES['image']['size'];
    $temfile=$_FILES['image']['tmp_name'];
    if($_FILES['image']['error']!=0)
    {
        $filename['image']=$products['image'];
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
    if(!empty($_POST['status'])){
        $status=$_POST['status'];
    }
    $update=$products_controller->updateProducts($id,$type,$name,$filename,$price,$description,$status);
    
    if($update){
        header('location:products.php');
    }
}

?>

    <div class="container">
    <div class="row">
                    <div class="col-md-6">
                        <a href="products.php" class="btn btn-outline-info">Back</a>
                    </div>
                </div>
    </div>

    <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <form action="" method="post" enctype="multipart/form-data">
                           <div class="my-2">
                            <select name="type" id="" class="form-control">
                                <?php
                                for ($row=0; $row <count($products) ; $row++) { 
                                    if($products[$row]['category_id']=$results[$row]['id']){
                                        echo "<option vlaue='".$results[$row]['id']."' selected>".$results[$row]['name']."</option>";
                                    }
                                    else{
                                        echo "<option vlaue='".$results[$row]['id']."'>".$results[$row]['name']."</option>";
                                    

                                    }
                                    
                                }
                                ?>

                            </select>
                           </div>
                           <div class="my-2">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" id="" class="form-control" value="<?php echo $result['name']; ?>">

                           </div>
                           <div class="my-2">
                            <label for="" class="form-label">Image</label>
                            <input type="file" name="image" id="" class="form-control" value="<?php echo $result['image']; ?>">
                           </div>
                          
                           <div class="my-2">
                            <label for="" class="form-label">Price</label>
                            <input type="text" name="price" id="" class="form-control" value="<?php echo $result['price']; ?>">
                           </div>
                           <div class="my-2">
                            <label for="" class="form-label">Description</label>
                            <input type="text" name="description" id="" class="form-control" value="<?php echo $result['description']; ?>">
                           </div>
                          
                           <div class="my-2">
                            <label for="" class="form-label">Size</label>
                            <input type="text" name="status" id="" class="form-control" value="<?php echo $result['status']; ?>">
                           </div>
                          
                          
                            <div class="my-2">
                                <button class="btn btn-primary" name="update" type="submit">Update</button>
                            </div>
                        </form>

                    </div>
                    <div class="col-md-3"></div>
                </div> 