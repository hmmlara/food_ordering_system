<?php
	session_start();
	// session_destroy();
	include_once 'layouts/header.php';
	include_once 'controller/adminuser_controller.php';
	include_once 'controller/categories_controller.php';
	include_once 'controller/product_controller.php';
	include_once 'controller/adminuser_controller.php';
	include_once 'controller/order_controller.php';
    include_once "controller/sales_controller.php";
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



$sales = new SalesController();
$item = $sales->getItem();


// var_dump($chats);
// Prepare data for the chart
$labels = []; // Array of labels for each bar
$totalBalances = []; // Array of total balances for each bar
$bestSellingProducts = []; // Array of best-selling products for each bar

if(isset($_POST['year_filter'])){
    $charts=$sales->getChatsYearFilter($_POST['year']);
    $lineCharts=$sales->getBestsellingProducts($_POST['year']);
}
else{
    $charts=$sales->getChats();
    $lineCharts=$sales->getSellingProducts();
}

foreach ($charts as $row) {
    $labels[] = $row['month'] . '/' . $row['year'];
    $totalBalances[] = $row['total'];
    
}

foreach ($lineCharts as $value){
    $bestSellingProducts[] = $value['total_quantity'];
    $product_name[]=$value['name']. '/'.$value['month'];
}
//  var_dump($product_name);


?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

					<div class="row">
                            <div class="col-xl-3 col-md-6" title="Categories">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">အမျိုးအစားများ <span class='badge bg-info'><?php echo count($results);  ?></span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between bg-white" >
                                        <a class="small text-info stretched-link text-decoration-none" href="categories.php">အသေးစိတ်ကြည့်ရန်</a>
                                        <div class="small text-info"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6" title="Products">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">စားသောက်ကုန်များ <span class='badge bg-info'><?php echo count($products);?></span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between bg-white">
                                        <a class="small text-info stretched-link text-decoration-none" href="products.php">အသေးစိတ်ကြည့်ရန်</a>
                                        <div class="small text-info "><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6" title="Customers">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">စားသုံးသူများ <span class='badge bg-info'><?php echo count($customers);?></span> </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between bg-white" >
                                        <a class="small text-info stretched-link text-decoration-none" href="customers.php">အသေးစိတ်ကြည့်ရန်</a>
                                        <div class="small text-info"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

							<div class="col-xl-3 col-md-6" title="Orders">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">အော်ဒါများ <span class='badge bg-info'><?php echo count($orders);  ?></span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between bg-white">
                                        <a class="small text-info stretched-link text-decoration-none" href="order_by_phone.php">အသေးစိတ်ကြည့်ရန်</a>
                                        <div class="small text-info"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-xl-4 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Daily Sales <span class='badge bg-info'></span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-info stretched-link" href="sales.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div> -->
                           
                            
                    </div>
                    <div class="row">
                    <form action="" method="post">
                        <div class="col-md-4">
                            <select name="year" id="year" class="form-select">
                                <option value="">Choose Year</option>
                                <?php
                                    for($year=2022;$year<=date(2040);$year++){
                                        if($_POST['year']==$year)
                                        echo "<option value='".$year."' selected>".$year."</option>";
                                        else
                                        echo "<option value='".$year."'>".$year."</option>";

                                    }

                                ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                        <button type="submit" class="btn btn-sm btn-primary mt-2" name='year_filter'>စီစစ်မည်</button>
                        </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <canvas id="myChart1" width="500" height="400"></canvas>
                        </div>
                        <div class="col-md-6">
                            <canvas id="myChart2"   width="500" height="400" ></canvas>
                        </div>
                    </div>
					

				</div>
			</main>
            <script>
        let total = <?php echo json_encode($totalBalances); ?>;
        let bestSell = <?php echo json_encode($bestSellingProducts); ?>;

        let month = <?php echo json_encode($labels); ?>;
        let product = <?php echo json_encode($product_name); ?>;
        console.log(bestSell);
        console.log(total);
        var ctx1 = document.getElementById('myChart1').getContext('2d');
        var ctx2 = document.getElementById('myChart2').getContext('2d');
        var chart2 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: month,
                datasets: [{
                    label: 'Total Balance',
                    data: total,
                    backgroundColor: 'rgba(245, 2, 2, 0.3)',
                    borderColor: 'rgba(245, 2, 2, 1)',
                    borderWidth: 1
                 }// {
                //     label: 'Best-Selling Products',
                //     data: bestSell,
                //     backgroundColor: 'rgba(54, 162, 235, 0.2)',
                //     borderColor: 'rgba(54, 162, 235, 1)',
                //     borderWidth: 1,}
                ]
            },
            options: {
                responsive:false,
                maintainAspectRatio:false,
                scales: {
                    y: {
                        
                        suggestedMin: 50,
                    }
                }
            }
        });
        var chart2 = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: product,
                datasets: [{
                    label: 'Best-Selling Products',
                    data: bestSell ,
                    backgroundColor: 'rgba(2, 128, 245, 0.2)',
                    borderColor: 'rgba(2, 128, 245, 1)',
                    borderWidth: 1
                 }// {
                //     label: 'Best-Selling Products',
                //     data: bestSell,
                //     backgroundColor: 'rgba(54, 162, 235, 0.2)',
                //     borderColor: 'rgba(54, 162, 235, 1)',
                //     borderWidth: 1,}
                ]
            },
            options: {
                responsive:false,
                maintainAspectRatio:false,
                scales: {
                    y: {
                        // beginAtZero: true,
                        suggestedMin: 50,
                    }
                }
            }
        });
        // chart.update();
    </script>
			<?php
				require "layouts/footer.php";
			?>