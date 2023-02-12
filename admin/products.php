<?php
include_once 'layouts/header.php';
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<?php
include_once 'controller/product_controller.php';
include_once 'controller/categories_controller.php';

$products_controller=new ProductController();
$products=$products_controller->getProducts();

$categories=new CategoriesController();
$results=$categories->getcategories();




?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Products</h1>
                        
                    </div> -->
                    <div class="row">
                        <div class="col-md-4">
                            <a href="create_product.php" class="btn btn-success">Add New Products</a>
                        </div>
                    </div>
                    
               <div class="row my-2">
                <div class="col-md">
                    <table class='table table-striped' id="product_table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Category Type</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="product_table">
                            <?php
                           

                            for ($row=0; $row <count($products) ; $row++) { 
                            echo "<tr>";
                            echo "<td>".($row+1)."</td>";
                          for ($index=0; $index <count($results) ; $index++) { 
                            if($products[$row]['category_id']==$results[$index]['id']){
                                echo "<td>".$results[$index]['name']."</td>";
                            }
                          }
                            echo "<td>".$products[$row]['name']."</td>";
                            echo "<td>
                                    <img src='uploads/".$products[$row]["image"]."' alt='".$products[$row]["name"]."' style='width: 50px; height: 50px;'>
                                    </td>";
                            echo "<td>".$products[$row]['price']."</td>";
                            echo "<td>".$products[$row]['description']."</td>";
                            echo "<td>".$products[$row]['status']."</td>";
                            echo "<td id='".$products[$row]['id']."'><a href='edit_product.php?id=".$products[$row]['id']."' class=' btn btn-sm btn-info mr-3'>Edit</a><a class='btn btn-sm btn-danger' id='delete'>Delete</a></td>";

                                        
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