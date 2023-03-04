<?php
ob_start();

    if(isset($_POST['logout'])){
        // unset($_SESSION['admin_login']);
        session_destroy();
        echo "<script>
            window.location.href = 'http://localhost/FOS/admin/admin_login.php';
            </script>";
    }

	$active_page =  $_SERVER["PHP_SELF"];
	// echo $active_page;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/" />
	<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css"> -->

	<title>AdminKit Demo - Bootstrap 5 Admin Template</title>
	
	<link href="css/app.css" rel="stylesheet">
	<!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<link rel="stylesheet" href="fonts/fontawesome-free-6.1.2-web/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="js/jquery-3.6.1.min.js"></script>
	<!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script> -->
</head>

<body  id="body">
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <img src="img/logo.jpg" alt="" class='w-100' height="50px">
                </div>
                <div class="sidebar-brand-text mx-3">FOS admin</div>
            </a>
				<!-- <a class="sidebar-brand" href="index.php">
          <span class="align-middle">Darli Snacks & Drinks</span>
        </a> -->

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>

					<li class="sidebar-item <?php echo ($active_page == '/FOS/admin/index.php')? 'active' : '' ;?>">
						<a class="sidebar-link" href="index.php">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>

					<li class="sidebar-item <?php if($active_page == '/FOS/admin/categories.php' ||  $active_page == '/FOS/admin/create_categories.php' || $active_page == '/FOS/admin/edit_categories.php' ){echo "active";}?>">
						<a class="sidebar-link" href="categories.php">
						<i class="align-middle" data-feather="grid"></i> <span class="align-middle">အမျိုးအစားများ</span>
            </a>
					</li>

					<li class="sidebar-item <?php if($active_page == '/FOS/admin/products.php' ||  $active_page == '/FOS/admin/create_products.php' || $active_page == '/FOS/admin/edit_products.php' ){echo "active";}?>">
						<a class="sidebar-link" href="products.php">
						<i class="align-middle" data-feather="coffee"></i> <span class="align-middle">အစားအသောက်များ</span>
            </a>
					</li>

					<li class="sidebar-item <?php if($active_page == '/FOS/admin/shipping.php' ||  $active_page == '/FOS/admin/create_shipping.php' || $active_page == '/FOS/admin/edit_shipping.php'){echo "active";}?>">
						<a class="sidebar-link" href="shipping.php">
						<i class="align-middle" data-feather="truck"></i> <span class="align-middle">မြို့နယ်များ</span>
            </a>
					</li>

					<li class="sidebar-item <?php echo ($active_page == '/FOS/admin/customers.php')? 'active' : '' ;?>">
						<a class="sidebar-link" href="customers.php">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">စားသုံးသူများ</span>
            </a>
					</li>

					<li class="sidebar-item <?php if($active_page == '/FOS/admin/orders.php' ||  $active_page == '/FOS/admin/order_details.php'){echo "active";}?>">
						<a class="sidebar-link" href="orders.php">
              <i class="align-middle" data-feather="align-left"></i> <span class="align-middle">အော်ဒါများ</span>
            </a>
					</li>

					 <li class="sidebar-item <?php if($active_page == '/FOS/admin/report.php' ||  $active_page == '/FOS/admin/sales.php'){echo "active";}?>">
						<a class="sidebar-link" href="report.php">
              <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Report</span>
						</a>
					</li>

					<li class="sidebar-item <?php if($active_page == '/FOS/admin/month.php' ||  $active_page == '/FOS/admin/sales.php'){echo "active";}?>">
						<a class="sidebar-link" href="month.php">
              <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Monthly Report</span>
						</a>
					</li>

					<!--<li class="sidebar-item">
						<a class="sidebar-link" href="ui-cards.html">
              <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Cards</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="ui-typography.html">
              <i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Typography</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="icons-feather.html">
              <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Icons</span>
            </a>
					</li>

					<li class="sidebar-header">
						Plugins & Addons
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="charts-chartjs.html">
              <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Charts</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="maps-google.html">
              <i class="align-middle" data-feather="map"></i> <span class="align-middle">Maps</span>
            </a>
					</li> -->
				</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                            <img src="img/avatars/avatar-6.png" class="avatar rounded" alt="Charles Hall" style="width:90px; height:60px;" /> <span class="text-dark">Admin</span>
                            </a>
							<form action="" method="post">
								<div class="dropdown-menu dropdown-menu-end">
									<button class="dropdown-item" name="logout">Log out</button>
								</div>
							</form>
						</li>
					</ul>
				</div>
			</nav>
            