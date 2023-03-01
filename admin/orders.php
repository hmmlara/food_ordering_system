<?php
    include_once "layouts/header.php";
    include_once "controller/order_controller.php";

    $orders=new OrderController();
    $orders=$orders->getOrderinfo();

    if(isset($_POST["filter"])){
        
        $orders = array_values(array_filter($orders,function($value){
                $date =  explode(' ',$value["created_date"])[0];
                if(($value['delivery_id'] == $_POST["pickup_deli_filter"] || $_POST["pickup_deli_filter"] == 0)
                    && $_POST["start_date"] < $date && $date < $_POST["end_date"]){
                        return $value;
                }
        }));
    }
    
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 my-4 mx-2" style="font-size: 50px;">အော်ဒါများ</h1>
                        
                    </div>
                    <a href="create_orders.php" class="btn btn-success my-2">အသစ်ထည့်မည်</a>
                    
                    <form action="" method="post">
                    <div class="row">
                        <div class="col-md-3">

                            <select name="pickup_deli_filter" id="order_type" class="form-select">
                                <option value="0" <?php echo (isset($_POST["pickup_deli_filter"])&& $_POST["pickup_deli_filter"] == 0)? 'selected' : '';?>>All</option>
                                <option value="1" <?php echo (isset($_POST["pickup_deli_filter"])&& $_POST["pickup_deli_filter"] == 1)? 'selected': '';?>>Pick Up</option>
                                <option value="2" <?php echo (isset($_POST["pickup_deli_filter"])&& $_POST["pickup_deli_filter"] == 2)? 'selected': '' ;?>>Delivery Men</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-6">
                                <input type="date" name="start_date" id="start_date" class="form-control" placeholder="Start Date">
                            </div>
                            <div class="col-md-6">
                                <input type="date" name="end_date" id="end_date" class="form-control" placeholder="End Date">
                            </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button id="filter" class="btn btn-sm btn-info" name="filter">စီစစ်မည်</button>
                            <button id="reset" class="btn btn-sm btn-danger">ပြန်စမည်</button>
                        </div>

                    </div>
                    </form>
                    <div class="row mt-3">

                            
                        <div class="col-md">
                            
                            <table class="table table-striped table-bordered" id="order_table">
                                <thead>
                                    <tr>
                                        <th>နံပါတ်</th>
                                        <th>အော်ဒါနံပါတ်</th>
                                        <th>စားသုံးသူအမည်</th>
                                        <th>အော်ဒါအမျိုးအစား</th>
                                        <th>အော်ဒါရက်စွဲ</th>
                                        <th>လုပ်ဆောင်ချက်များ</th>
                                    </tr>
                                </thead>
                                <tbody id="order_tbody">
                                    <?php
                                        for($i=0;$i<count($orders);$i++){
                                            echo "<tr>";
                                            echo "<td>".$i+1 ."</td>";
                                            echo "<td>od-".$orders[$i]['id']."</td>";
                                            echo "<td>".$orders[$i]['cus_name']."</td>";
                                            if($orders[$i]['delivery_id']==1){

                                                echo "<td>Pick Up</td>";
                                            }
                                            if($orders[$i]['delivery_id']==2){
                                                echo "<td>Delivery men</td>";

                                            }
                                            // echo "<td>".$orders[$i][end( explode('-',$orders[$i]['status']))]."</td>";
                                            echo "<td>".explode(" ",$orders[$i]['created_date'])[0]."</td>";
                                            echo "<td><a class='btn btn-sm btn-warning' href='order_details.php?id=".$orders[$i]['id']."'>အသေးစိတ်</a></td>";
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
        include_once "layouts/footer.php";
    ?>