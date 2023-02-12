<?php
ob_start();
include_once 'layouts/header.php';
include_once 'controller/categories_controller.php';

$categories=new CategoriesController();
$parents=$categories->getParent();

if(isset($_POST['add'])){
    $error=false;
    if(!empty($_POST['name'])){
        $name=$_POST['name'];
    }
    else{
        $error=true;
    }
    $parent=$_POST['parent'];
    $result=$categories->addCategory($name,$parent);
    if($result){
        header("location:categories.php");
    }
}



?>


<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Categories</h1>

    </div>
    <div class="row">

        <div class="col-md-4">
            <a href="categories.php" class="btn btn-outline-info">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form action="" method="post">
                <div class="my-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="name" id="" class="form-control">
                </div>
                <div>
                    <select name="parent" id="" class="form-control">

                        <?php
                                    echo "<option> No Parent </option>";
                                    for ($index=0; $index <count($parents) ; $index++) { 
                                        echo "<option value='".$parents[$index]['id']."'>".$parents[$index]['name']."</option>";
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


<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
        include_once 'layouts/footer.php';

        ?>