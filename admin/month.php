<?php
session_start();
include_once 'layouts/header.php';
include_once 'controller/categories_controller.php';
include_once 'controller/report_controller.php';
include_once 'controller/product_controller.php';
include_once 'controller/order_controller.php';

$report = new ReportController();
$item = $report->getItem();
// var_dump($item);
$categories = new CategoriesController();
$results = $categories->getCategories();

$parents = array_filter($results, function ($value) {
    if ($value["parent"] == 0)
        return $value;
});


$products_controller = new ProductController();
$products = $products_controller->getProducts();

$orders = new OrderController();
$orders = $orders->getOrderinfo();

date_default_timezone_set("Asia/Yangon");
$date_now = date('Y-m-d');

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $page = (int)$_GET['page'];
} else {
    $page = 1;
}
if(!isset($_SESSION['month_excel'])){
    $_SESSION['month_excel'] =[];
}
if (isset($_POST['filter'])) {
    unset($_SESSION['search_filter']);

    $item= array_values(array_filter($item, function ($value) {
        $search_month = $value['month'];
        $search_year =  $value['year'];

        if(!empty($_POST['month']) && empty($_POST['year'])){
            if($search_month == $_POST['month']){
                return $value;
            }
        }

        if((!empty($_POST['month'])) && !empty($_POST['year'])){
            if($search_month == $_POST['month'] && $search_year==$_POST['year']){
                return $value;
            }
        }

        if(!empty($_POST['year']) && empty($_POST['month'])){
            if($search_year == $_POST['year']){
                return $value;
            }
        }  
    }));


    if(!isset($_SESSION['search_filter'])){
        $_SESSION['search_filter'] = $item;
    }
}

if(isset($_SESSION['month_excel'])){
    if(isset($_POST['filter'])) {
        $_SESSION['month_excel'] = $_SESSION['search_filter'];
    }
    else{
        $_SESSION['month_excel'] = $item;
    }
}

if(isset($_POST['reset'])){
    unset($_SESSION['search_filter']);
    unset($_POST['year']);
    unset($_POST['month']);
    header('location:'.$_SERVER['PHP_SELF']);
    }
?>






<div class="container">
    <form action="" method="post">
        <div class="row my-3">
            <div class="col-md-4">
                <select name="month" class="form-select" id="month">
                    <option value="0">Choose Month</option>
                    <?php
                       foreach (range(1, 12) as $month) {
                        // echo date('F',mktime(0,0,0,$month,10))."</br>";
                        $monthname = date('F', mktime(0, 0, 0, $month, 10));
                        $monthval = substr(date('F', mktime(0, 0, 0, $month, 10)), 0, 3); //Jan ,Feb
                        if($_POST['month']==$monthname)
                        echo "<option value='" . $monthname . "' selected >" . $monthname . "</option>";
                        else
                        echo "<option value='" . $monthname . "'>" . $monthname . "</option>";

                      

                    }
                    ?>

                </select>
            </div>
          <div class="col-md-4">
            <select name="year" id="" class="form-select">
                <option value="">Choose Year</option>
                <?php
                for($year=2015;$year<=date(2115);$year++){
                    if($_POST['year']==$year)
                    echo "<option value='".$year."' selected>".$year."</option>";
                    else
                    echo "<option value='".$year."'>".$year."</option>";

                }

                ?>
            </select>
          </div>

         

            <div class="col-md-4">

                <button id="filter" class="btn btn-sm btn-info" name="filter">စီစစ်မည်</button>
                <button id="filter" class="btn btn-sm btn-danger" name="reset">ပြန်စမည်</button>
                <a href="report.php" class="btn btn-sm btn-primary">အမျိုးအစား/ရက်အလိုက်</a>
                <a href="month_excel.php" class="btn btn-success btn-sm mt-2">Excelထုတ်မည်</a>
            </div>
    </form>
</div>

<div class="row mt-3">


    <div class="col-md">

        <table class="table table-striped table-bordered" id="order_table">
            <thead>
                <tr>
                <th>နံပါတ်</th>
                    <th> အော်ဒါရက်စွဲ</th>
                    <th>အမျိုးအစား</th>
                    <th>အရေအတွက်</th>
                    <th>စျေးနှုန်း</th>
                    <th>စုစုပေါင်းစျေးနှုန်း</th>


                </tr>
            </thead>
            <tbody id="item_table">

                <?php
               $item_page=5;
               $offset=($page-1)*$item_page;
               if(isset($_SESSION['search_filter'])){
                $pagi_item=array_slice($_SESSION['search_filter'],$offset,$item_page);
               }
               else{
                $pagi_item=array_slice($item,$offset,$item_page);
               }
               
            //    var_dump($current);
                $total_price = 0;
                $total_qty = 0;

                for ($i = 0; $i < count($pagi_item); $i++) {
                    $total_price += $pagi_item[$i]['price'] * $pagi_item[$i]['total_qty'];
                    $total_qty += $pagi_item[$i]['total_qty'];


                    $id = $i + 1;
                    if (isset($_GET['page'])) {
                        $id = ($_GET['page'] - 1) + $item_page + $i;
                    }

                    echo "<tr><td>" . $id . "</td><td>" . $pagi_item[$i]['created_date'] . "</td>
                           <td>" . $pagi_item[$i]['name'] . "</td>
                           <td>" . $pagi_item[$i]['total_qty'] . "</td>
                           <td>" . $pagi_item[$i]['price'] . "</td>
                           <td>" . $pagi_item[$i]['price'] * $pagi_item[$i]['total_qty'] . "</td>
                           </tr>";
                }

                echo "<tr>";
                echo "<td colspan='2'></td>";
                echo "<td><b>စုစုပေါင်း</b></td>";
                echo "<td colspan='2'>" . $total_qty . "</td>";
                echo "<td>" . $total_price . "</td>";

                echo "</tr>";
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-10">
        <ul class="pagination">

            <?php
             $pages = ceil(count($item) / $item_page);
            //var_dump(count($item));
            // var_dump($pages);
            $previous = $page - 1;
            $next = $page + 1;
            if ($page <= 1) {
                echo ' <li class="page-item disabled">
                                         <a class="page-link">Previous</a>
                                        </li>';
            } else {
                if ($previous == 1) {
                    echo ' <li class="page-item ">
                                         <a class="page-link" href="month.php">Previous</a>
                                        </li>';
                }
            }
            if ($page == 1) {
                echo ' <li class="page-item active"><a class="page-link" href="month.php">1</a></li>';
            } else {
                echo ' <li class="page-item"><a class="page-link" href="month.php">1</a></li>';
            }
            for ($index = 2; $index <= $pages; $index++) {
                if ($page == $index) {
                    echo ' <li class="page-item active"><a class="page-link" href="?page=' . $index . '">' . $index . '</a></li>';
                } else {
                    echo ' <li class="page-item "><a class="page-link" href="?page=' . $index . '">' . $index . '</a></li>';
                }
            }
            if ($page >= $pages) {
                echo '<li class="page-item disabled">
                     <a class="page-link" href="#">Next</a>
                     </li>';
            } else {
                echo '<li class="page-item">
                     <a class="page-link" href="?page=' . $next . '">Next</a>
                    </li>';
            }
        
       ?>



       </ul>
     </div>
</div>

<?php
include_once 'layouts/footer.php';


?>