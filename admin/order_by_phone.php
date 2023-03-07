<?php
    
    include_once "layouts/header.php";
    include_once "controller/order_controller.php";

    $orders=new OrderController();
    $results=$orders->getPhoneOrderinfo();
    if(isset($_POST['filter'])){
        if($_POST['pickup_deli_filter']==0 && $_POST['order_status_filter']==0 && empty($_POST['start_date']) && empty($_POST['end_date'])){
            $results=$orders->getPhoneOrderinfo();
        }
        else{
            $results=$orders->phoneOrderFilter($_POST['pickup_deli_filter'],$_POST['order_status_filter'],$_POST['start_date'],$_POST['end_date']);
        }
    }
    if(isset($_POST['reset'])){
        header('location:'.$_SERVER['PHP_SELF']);
    }
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <div class="d-sm-flex align-items-center justify-content-between mb-4 ">
                        <h1 class="h3 mb-0 text-gray-800 my-4 mx-2" style="font-size: 40px;">ဖုန်းအော်ဒါများ</h1>
                    </div>
                    
                    <form action="" method="post" id="myForm">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="form-label">အော်ဒါအမျိုးအစား</label>
                                <select name="pickup_deli_filter" id="order_type" class="form-select">
                                <!-- <option hidden>အော်ဒါအမျိုးအစား</option> -->
                                    <option value="0" <?php echo (isset($_POST["pickup_deli_filter"])&& $_POST["pickup_deli_filter"] == 0)? 'selected' : '';?>>All</option>
                                    <option value="1" <?php echo (isset($_POST["pickup_deli_filter"])&& $_POST["pickup_deli_filter"] == 1)? 'selected': '';?>>Pick Up</option>
                                    <option value="2" <?php echo (isset($_POST["pickup_deli_filter"])&& $_POST["pickup_deli_filter"] == 2)? 'selected': '' ;?>>Delivery Men</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <lable class="form-label">အော်ဒါအဆင့်</lable>
                                <select name="order_status_filter" id="order_status" class="form-select mt-2">
                                    <option value="0" <?php echo (isset($_POST["order_status_filter"])&& $_POST["order_status_filter"] == 0)? 'selected' : '';?>>All</option>
                                    <option value="1" <?php echo (isset($_POST["order_status_filter"])&& $_POST["order_status_filter"] == 1)? 'selected' : '';?>>Order placed</option>
                                    <option value="2" <?php echo (isset($_POST["order_status_filter"])&& $_POST["order_status_filter"] == 2)? 'selected' : '';?>>Order confirmed</option>
                                    <option value="3" <?php echo (isset($_POST["order_status_filter"])&& $_POST["order_status_filter"] == 3)? 'selected' : '';?>>Preparing order</option>
                                    <option value="4" <?php echo (isset($_POST["order_status_filter"])&& $_POST["order_status_filter"] == 4)? 'selected' : '';?>>Order is on the way</option>
                                    <option value="5" <?php echo (isset($_POST["order_status_filter"])&& $_POST["order_status_filter"] == 5)? 'selected' : '';?>>Order delivered</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <input type="date" name="start_date" id="start_date" class="form-control" placeholder="Start Date" value="<?php if(isset($_POST['filter'])){echo $_POST['start_date'];}?>">
                            </div>
                            <div class="col-md-4">
                                <input type="date" name="end_date" id="end_date" class="form-control" placeholder="End Date" value="<?php if(isset($_POST['filter'])){echo $_POST['end_date'];}  ?>">
                            </div>
                            <div class="col-md-4">
                                <button id="filter" class="btn btn-sm btn-info" name="filter">စီစစ်မည်</button>
                                <button id="reset" class="btn btn-sm btn-danger" name="reset">ပြန်စမည်</button>
                            </div>
                        </div>
                    </form>
                    <div class="row mt-3" id="order_by_account">
                        <div class="col-md">
                            <table class="table table-striped table-bordered" id="dataTable"  style="border:1px solid #c4c3c2;">
                                <thead>
                                    <tr>
                                        <th>နံပါတ်</th>
                                        <th>အော်ဒါနံပါတ်</th>
                                        <th>စားသုံးသူအမည်</th>
                                        <th>အော်ဒါအမျိုးအစား</th>
                                        <th>ငွေပေးချေမှု</th>
                                        <th>အော်ဒါအဆင့်</th>
                                        <th>အော်ဒါရက်စွဲ</th>
                                        <th>လုပ်ဆောင်ချက်များ</th>
                                    </tr>
                                </thead>
                                <tbody id="order_tbody">
                                    <?php
                                        for($i=0;$i<count($results);$i++){
                                            echo "<tr>";
                                            echo "<td>".$i+1 ."</td>";
                                            echo "<td>od-".$results[$i]['id']."</td>";
                                            echo "<td>".$results[$i]['cus_name']."</td>";
                                            if($results[$i]['delivery_id']==1){

                                                echo "<td>Pick Up</td>";
                                            }
                                            if($results[$i]['delivery_id']==2){
                                                echo "<td>Delivery men</td>";

                                            }
                                            echo "<td>".explode("=",$results[$i]['paymentMode'])[1]."</td>";
                                            if($results[$i]['status']==1){
                                                echo "<td>Order placed</td>";
                                            }
                                            else if($results[$i]['status']==2){
                                                echo "<td>Order confirmed</td>";
                                            }
                                            else if($results[$i]['status']==3){
                                                echo "<td>Preparing order</td>";
                                            }
                                            else if($results[$i]['status']==4){
                                                echo "<td>Order on the way</td>";
                                            }
                                            else if($results[$i]['status']==5){
                                                echo "<td>Order delivered</td>";
                                            }
                                            echo "<td>".explode(" ",$results[$i]['created_date'])[0]."</td>";
                                            echo "<td><a class='btn btn-sm btn-warning' href='order_phone_details.php?id=".$results[$i]['id']."'>အသေးစိတ်</a></td>";
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