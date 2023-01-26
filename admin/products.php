<?php
include_once 'layouts/header.php';
include_once 'controller/product_controller.php';

$products_controller=new ProductController();
$products=$products_controller->getProducts();
var_dump($products)

?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Products</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

               

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        <?php
        include_once 'layouts/footer.php';

        ?>