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
?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Orders</h1>
                    <!-- <div class="row">
                        <div class="col-md-4">
                            <select name="pickup_deli_filter" id="" class="form-control">
                                <option value="">Select order type</option>
                                <option value="Pick_up">Pick Up</option>
                                <option value="Delivery_men">Delivery Men</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            
                        </div>
                    </div> -->
                    <div class="row">
                            
                        <div class="col-md">
                            
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Order No</th>
                                        <th>Customer name</th>
                                        <th>Pick up</th>
                                        <th>Delivery</th>
                                        <th>Order date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                            echo "<td>".$results[$i]['created_date']."</td>";
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