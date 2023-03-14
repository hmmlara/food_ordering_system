<?php
include_once 'layouts/header.php';
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 my-4 mx-2" style="font-size: 40px;">အစားအသောက်များ</h1>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <a href="create_product.php" class="btn btn-success">အသစ်ထည့်မည်</a>
                        </div>
                    </div>
                    
               <div class="row my-2">
                <div class="col-md">
                    <table class='table table-striped table-bordered mt-2' id="dataTable" style="border:1px solid #c4c3c2;">
                        <thead>
                            <tr>
                                <th>နံပါတ်</th>
                                <th>အမျိုးအစား</th>
                                <th>အမည်</th>
                                <th>ရုပ်ပုံ</th>
                                <th>ဈေးနှုန်း</th>
                                <th>ဖော်ပြချက်</th>
                                <th>အရွယ်အစား</th>
                                <th>လုပ်ဆောင်ချက်များ</th>
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
                            echo "<td>".explode("-",$products[$row]['status'])[1]."</td>";
                            echo "<td id='".$products[$row]['id']."'><a href='edit_product.php?id=".$products[$row]['id']."' class=' btn btn-sm btn-info mx-3'>ပြုပြင်မည်</a><a class='btn btn-sm btn-danger' id='delete'>ဖျက်မည်</a></td>";

                                        
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
        require 'layouts/footer.php';

        ?>