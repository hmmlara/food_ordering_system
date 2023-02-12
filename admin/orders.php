<?php
    include_once "layouts/header.php";
    include_once "controller/order_controller.php";

    $orders=new OrderController();
    $results=$orders->getOrderinfo();
    // echo "<pre>";
    // var_dump($results);
    // echo "</pre>";
    // for($index=0;$index<count($results);$index++){
    //     var_dump(end( explode('-',$results[$index]['status'])));
    // }
   
    //

    if(isset($_POST["filter"])){
        
        $results = array_values(array_filter($results,function($value){
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
                        <h1 class="h3 mb-4 text-gray-800">Orders</h1>
                        <a href="create_order.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Add Order</a>
                    </div>
                    
                    <form action="" method="post">
                    <div class="row">
                        <div class="col-md-3">

                            <select name="pickup_deli_filter" id="order_type" class="form-control">
                                <option value="0" <?php echo (isset($_POST["pickup_deli_filter"])&& $_POST["pickup_deli_filter"] == 0)? 'selected' : '';?>>All</option>
                                <option value="1" <?php echo (isset($_POST["pickup_deli_filter"])&& $_POST["pickup_deli_filter"] == 1)? 'selected': '';?>>Pick Up</option>
                                <option value="2" <?php echo (isset($_POST["pickup_deli_filter"])&& $_POST["pickup_deli_filter"] == 2)? 'selected': '' ;?>>Delivery Men</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" name="start_date" id="start_date" class="form-control" placeholder="Start Date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" name="end_date" id="end_date" class="form-control" placeholder="End Date">
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button id="filter" class="btn btn-sm btn-info" name="filter">Filter</button>
                            <button id="reset" class="btn btn-sm btn-warning">Reset</button>
                        </div>

                    </div>
                    </form>
                    <div class="row mt-3">

                            
                        <div class="col-md">
                            
                            <table class="table table-striped" id="order_table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Order No</th>
                                        <th>Customer name</th>

                                        <th>Pick up</th>
                                        <th>Delivery</th>

                                        <th>Order type</th>

                                        <th>Order date</th>
                                        <th>Action</th>
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

                                                echo "<td><i class='fa fa-check'></i></td>";
                                                echo "<td>-</td>";
                                            }
                                            if($results[$i]['delivery_id']==2){
                                                echo "<td>-</td>";
                                                echo "<td><i class='fa fa-check'></i></td>";

                                            }
                                            // echo "<td>".$results[$i][end( explode('-',$results[$i]['status']))]."</td>";
                                            echo "<td>".explode(" ",$results[$i]['created_date'])[0]."</td>";
                                            echo "<td><a class='btn btn-sm btn-warning' href='order_details.php?id=".$results[$i]['id']."'>Details</a></td>";
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