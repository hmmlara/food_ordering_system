<?php
	session_start();
	// session_destroy();
	include_once 'layouts/header.php';
    include_once 'controller/report_controller.php';
	include_once 'controller/adminuser_controller.php';
	include_once 'controller/categories_controller.php';
	include_once 'controller/product_controller.php';
	include_once 'controller/adminuser_controller.php';
	include_once 'controller/order_controller.php';
	if(!isset($_SESSION['admin_login'])){
		echo "<script>window.location.href='http://localhost/FOS/admin/admin_login.php'</script>";
	}

	$categories=new CategoriesController();
$results=$categories->getCategories();

$products_controller=new ProductController();
$products=$products_controller->getProducts();

$orders=new OrderController();
$orders=$orders->getOrderinfo();

$cus_controller=new UserController();
    $customers=$cus_controller->getCustomers();

    $report = new ReportController();
$item = $report->getItem();
$chats=$report->getChats();

?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

					<div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Categories<span class='badge bg-info'><?php echo count($results);  ?></span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between bg-white" >
                                        <a class="small text-info stretched-link text-decoration-none" href="categories.php">View Details</a>
                                        <div class="small text-info"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Products<span class='badge bg-info'><?php echo count($products);?></span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between bg-white">
                                        <a class="small text-info stretched-link text-decoration-none" href="products.php">View Details</a>
                                        <div class="small text-info "><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Customer <span class='badge bg-info'><?php echo count($customers);?></span> </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between bg-white" >
                                        <a class="small text-info stretched-link text-decoration-none" href="customers.php">View Details</a>
                                        <div class="small text-info"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

							<div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">Orders <span class='badge bg-info'><?php echo count($orders);  ?></span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between bg-white">
                                        <a class="small text-info stretched-link text-decoration-none" href="orders.php">View Details</a>
                                        <div class="small text-info"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                          
                            </div>

                            <div class="col-xl-4 col-md-6">
                            <canvas id="myChart" width="500" height="400"></canvas>

                    </div>

					

				</div>
   
      
               
			</main>

         
			<?php
				require "layouts/footer.php";
			?>