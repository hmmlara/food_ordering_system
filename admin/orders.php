<?php
    
    include_once "layouts/header.php";
    include_once "controller/order_controller.php";

    $orders=new OrderController();
    $results=$orders->getOrderinfo();
    // var_dump($results);
    if(isset($_POST["filter"])){
            $results = array_values(array_filter($results,function($value){
                $date =  explode(' ',$value["created_date"])[0];
                if($_POST['order_method_filter']==0 && $_POST['pickup_deli_filter'] == 0){
                    if($_POST["start_date"] < $date && $date < $_POST["end_date"]){
                        return $value;
                    }
                }
                else if($_POST['order_method_filter']==0 && $_POST['pickup_deli_filter'] == 1){
                    if($value['delivery_id'] == 1 && $_POST["start_date"] < $date && $date < $_POST["end_date"]){
                        return $value;
                    }
                }
                else if($_POST['order_method_filter']==0 && $_POST['pickup_deli_filter'] == 2){
                    if($value['delivery_id'] == 2 && $_POST["start_date"] < $date && $date < $_POST["end_date"]){
                        return $value;
                    }
                }
                else if($_POST['order_method_filter']==1 && $_POST['pickup_deli_filter'] == 0){
                    if($value['email'] == "userdefault@gmail.com" && $_POST["start_date"] < $date && $date < $_POST["end_date"]){
                        return $value;
                    }
                }
                else if($_POST['order_method_filter']==1 && $_POST['pickup_deli_filter'] == 1){
                    if($value['email'] == "userdefault@gmail.com" && $value['delivery_id'] == 1  && $_POST["start_date"] < $date && $date < $_POST["end_date"]){
                        return $value;
                    }
                }
                else if($_POST['order_method_filter']==1 && $_POST['pickup_deli_filter'] == 2){
                    if($value['email'] == "userdefault@gmail.com" && $value['delivery_id'] == 2  && $_POST["start_date"] < $date && $date < $_POST["end_date"]){
                        return $value;
                    }
                }
                else if($_POST['order_method_filter']==2 && $_POST['pickup_deli_filter'] == 0){
                    if($value['email'] != "userdefault@gmail.com" && $_POST["start_date"] < $date && $date < $_POST["end_date"]){
                        return $value;
                    }
                }
                else if($_POST['order_method_filter']==2 && $_POST['pickup_deli_filter'] == 1){
                    if($value['email'] != "userdefault@gmail.com" && $value['delivery_id'] == 1  && $_POST["start_date"] < $date && $date < $_POST["end_date"]){
                        return $value;
                    }
                }
                else if($_POST['order_method_filter']==2 && $_POST['pickup_deli_filter'] == 2){
                    if($value['email'] != "userdefault@gmail.com" && $value['delivery_id'] == 2  && $_POST["start_date"] < $date && $date < $_POST["end_date"]){
                        return $value;
                    }
                }
            }));
            var_dump($results);
    }

    
    
    
    
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <div class="d-sm-flex align-items-center justify-content-between mb-4 ">
                        <h1 class="h3 mb-0 text-gray-800 my-4 mx-2" style="font-size: 50px;">အော်ဒါများ</h1>
                        <div class="col-md-6 me-4">
                            <p id="order_type_name"></p>
                            <?php
                                if(isset($_POST['filter'])){
                                    if($_POST['order_method_filter']==0 && $_POST['pickup_deli_filter'] == 0){
                                        echo "<p>Filter date Range : from ".$_POST['start_date']." to ".$_POST['end_date']."</p>";
                                    }
                                    else if($_POST['order_method_filter']==0 && $_POST['pickup_deli_filter'] == 1){
                                        echo "<p>Filter : Pick up</p>";
                                        echo "<p>Filter date Range : from ".$_POST['start_date']." to ".$_POST['end_date']."</p>";
                                    }
                                    else if($_POST['order_method_filter']==0 && $_POST['pickup_deli_filter'] == 2){
                                        echo "<p>Filter : Dleivery</p>";
                                        echo "<p>Filter date Range : from ".$_POST['start_date']." to ".$_POST['end_date']."</p>";
                                    }
                                    else if($_POST['order_method_filter']==1 && $_POST['pickup_deli_filter'] == 0){
                                        echo "<p>Filter : Order by Phone</p>";
                                        echo "<p>Filter date Range : from ".$_POST['start_date']." to ".$_POST['end_date']."</p>";
                                    }
                                    else if($_POST['order_method_filter']==1 && $_POST['pickup_deli_filter'] == 1){
                                        echo "<p>Filter : Order by Phone && Pick up</p>";
                                        echo "<p>Filter date Range : from ".$_POST['start_date']." to ".$_POST['end_date']."</p>";
                                    }
                                    else if($_POST['order_method_filter']==1 && $_POST['pickup_deli_filter'] == 2){
                                        echo "<p>Filter : Order by Phone && Delivery</p>";
                                        echo "<p>Filter date Range : from ".$_POST['start_date']." to ".$_POST['end_date']."</p>";
                                    }
                                    else if($_POST['order_method_filter']==2 && $_POST['pickup_deli_filter'] == 0){
                                        echo "<p>Filter : Order by Account</p>";
                                        echo "<p>Filter date Range : from ".$_POST['start_date']." to ".$_POST['end_date']."</p>";
                                    }
                                    else if($_POST['order_method_filter']==2 && $_POST['pickup_deli_filter'] == 1){
                                        echo "<p>Filter : Order by Account && Pick up</p>";
                                        echo "<p>Filter date Range : from ".$_POST['start_date']." to ".$_POST['end_date']."</p>";
                                    }
                                    else if($_POST['order_method_filter']==2 && $_POST['pickup_deli_filter'] == 2){
                                        echo "<p>Filter : Order by Account && Delivery</p>";
                                        echo "<p>Filter date Range : from ".$_POST['start_date']." to ".$_POST['end_date']."</p>";
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    
                    <form action="" method="post" id="myForm">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="form-label">ဖုန်းအော်ဒါ(သို့မဟုတ်)အကောင့်အော်ဒါ</label>
                                <select name="order_method_filter" id="order_method" class="form-select">
                                    <!-- <option hidden>ဖုန်းအော်ဒါ(သို့မဟုတ်)အကောင့်အော်ဒါ</option> -->
                                    <option value="0" <?php echo (isset($_POST["order_method_filter"])&& $_POST["order_method_filter"] == 0)? 'selected': '';?>>All</option>
                                    <option value="1" <?php echo (isset($_POST["order_method_filter"])&& $_POST["order_method_filter"] == 1)? 'selected': '';?>>Order by Phone</option>
                                    <option value="2" <?php echo (isset($_POST["order_method_filter"])&& $_POST["order_method_filter"] == 2)? 'selected': '' ;?>>Order by Account</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">အော်ဒါအမျိုးအစား</label>
                                <select name="pickup_deli_filter" id="order_type" class="form-select">
                                <!-- <option hidden>အော်ဒါအမျိုးအစား</option> -->
                                    <option value="0" <?php echo (isset($_POST["pickup_deli_filter"])&& $_POST["pickup_deli_filter"] == 0)? 'selected' : '';?>>All</option>
                                    <option value="1" <?php echo (isset($_POST["pickup_deli_filter"])&& $_POST["pickup_deli_filter"] == 1)? 'selected': '';?>>Pick Up</option>
                                    <option value="2" <?php echo (isset($_POST["pickup_deli_filter"])&& $_POST["pickup_deli_filter"] == 2)? 'selected': '' ;?>>Delivery Men</option>
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
                            <table class="table table-striped table-bordered" id="order_table">
                                <thead>
                                    <tr>
                                        <th>နံပါတ်</th>
                                        <th>အော်ဒါနံပါတ်</th>
                                        <th>စားသုံးသူအမည်</th>
                                        <th>အော်ဒါအမျိုးအစား</th>
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
                                            if($results[$i]['status']==0){
                                                echo "<td>Order placed</td>";
                                            }
                                            else if($results[$i]['status']==1){
                                                echo "<td>Order confirmed</td>";
                                            }
                                            else if($results[$i]['status']==2){
                                                echo "<td>Preparing order</td>";
                                            }
                                            else if($results[$i]['status']==3){
                                                echo "<td>Order on the way</td>";
                                            }
                                            else if($results[$i]['status']==4){
                                                echo "<td>Order delivered</td>";
                                            }
                                            else if($results[$i]['status']==5){
                                                echo "<td>Order cancelled</td>";
                                            }
                                            else if($results[$i]['status']==5){
                                                echo "<td>Order denied</td>";
                                            }
                                            echo "<td>".explode(" ",$results[$i]['created_date'])[0]."</td>";
                                            echo "<td><a class='btn btn-sm btn-warning' href='order_details.php?id=".$results[$i]['id']."'>အသေးစိတ်</a></td>";
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