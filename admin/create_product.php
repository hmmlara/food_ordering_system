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
        $result=$products_controller->addProducts($type,$size,$name,$filename,$price,$description);
        if($result){
            header('location:products.php');
        }
}

?>
        <div class="container">
         <div class="row">           
             <div class="col-md-4">
             <a href="products.php" class="btn btn-primary my-4">ထွက်မည်</a>
            </div>
         </div>
        <div class="row">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                        <select name="type" id="" class="form-select">
                        <?php
                            echo "<option hidden> အမျိုးအစားများ </option>";
                            for ($index=0; $index <count($results) ; $index++) { 
                                if($results[$index]['parent']==0){
                                echo "<option value='".$results[$index]['id']."'>".$results[$index]['name']."</option>";
                                }
                            }
                            ?>
                            </select>
                        </div>
                        <div class="mb-3" >
                            <label for="" class="form-label">စားသောက်ကုန်အမည်</label>
                            <input type="text" name="name" id="" class="form-control">
                        </div>
                        <div class="mb-3" >
                            <label for="" class="form-label">ဈေးနှုန်း</label>
                            <input type="text" name="price" id="" class="form-control">
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <select name="size" id="" class="form-select">
                                <option value="1-large">ပွဲကြီး</option>
                                <option value="0-small">ပွဲသေး</option>
                            </select>
                        </div>
                        <div class="mb-3" >
                            <label for="" class="form-label">ရုပ်ပုံ</label>
                            <input type="file" name="image" id="" class="form-control">
                        </div>
                        <div class="mb-3" >
                            <label for="" class="form-label">ဖော်ပြချက်</label>
                            <input type="text" name="description" id="" class="form-control">
                        </div>
                    </div>
                    <div class="my-2">
                        <button class="btn btn-success" name="add">ထည့်မည်</button>
                    </div> 
                </div>
            </div>
            </form>
        </div>

        <?php
        require "layouts/footer.php";
        ?>