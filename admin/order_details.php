<?php
    ob_start();
    include_once "layouts/header.php";
    include_once "controller/order_controller.php";
    include_once "controller/product_controller.php";
    $id=$_GET['id'];
    $order=new OrderController();

    $order_details=$order->getOrderDetails($id);
    $orderinfo=$order->getSpecificOrder($id);
    $orderStatus=$orderinfo['status'];

    $productController= new ProductController();
    $getproducts=$productController->getProducts();

    if(isset($_POST['updateStatus'])){
        $status=$_POST['orderStatus'];

        $result=$order->updateOrderStatus($status,$id);
        header("Location:orders.php");
    }

?>
        

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 my-4 mx-2" style="font-size: 50px;">အော်ဒါအသေးစိတ်</h1>
                        
                    </div>
                    <a href="orders.php" class="btn btn-primary">ထွက်မည်</a>
                    <div class="container-md" id="bill">
                        <div class="row"  >
                            <div class="col-md-2"></div>
                            <div class="col-md-6 shadow">
                                <h2 class="text-center">Darli Snacks & Drinks</h2>
                                <div class="mt-3 d-sm-flex align-items-center justify-content-between">
                                    <p>အော်ဒါနံပါတ်: <?php echo $order_details[0]['order_id']; ?></p>
                                    <p>ရက်စွဲ: <?php echo explode(" ",$order_details[0]['created_date'])[0]; ?></p>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>နံပါတ်</th>
                                            <th>စားသောက်ကုန်</th>
                                            <th>အရေအတွက်</th>
                                            <th>ကျသင့်ငွေ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            for($i=0;$i<count($order_details);$i++){
                                                echo "<tr>";
                                                echo "<td>".$i+1 ."</td>";
                                                echo "<td>".$order_details[$i]['name']."</td>";
                                                echo "<td>".$order_details[$i]['qty']."</td>";
                                                echo "<td>".$order_details[$i]['product_price']*$order_details[$i]['qty']."</td>";
                                                echo "</tr>";
                                            }
                                            echo "<tr>";
                                            echo "<td colspan='3' class='text-end'>စုစုပေါင်းကုန်ကျငွေ</td>";
                                            echo "<td>".$orderinfo['total_balance']."</td>";
                                            echo "</tr>";
                                        ?>
                                    </tbody>
                                </table>
                                <div class="my-4">
                                    <h5 class="text-center">ဝယ်ယူအားပေးမှုအတွက်ကျေးဇူးအထူးတင်ရှိပါသည်။</h5>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <form method="post">
                                    <div class="text-left">    
                                        <div class="row">
                                            <b><label for="name">Order Status</label></b>
                                        </div>
                                        <div class="row">
                                            <div class="col d-flex">
                                                <input class="form-control" id="status" name="orderStatus" value="<?php echo $orderStatus; ?>" type="number" min="0" max="6" required>    
                                                <button type="button" class="btn btn-secondary ml-1" class="btn btn-primary" title="0=Order Placed. 1=Order Confirmed. 2=Preparing your Order.3=Your order is on the way! 4=Order Delivered. 5=Order Denied. 6=Order Cancelled.">
                                                    <i class="fas fa-info"></i>
                                                </button>
                                            </div>
                                        
                                        
                                        </div>
                                    </div>
                                <!-- <input type="hidden" id="orderId" name="orderId" value="<?php echo $orderid; ?>"> -->
                                    <button type="submit" class="btn btn-success mt-2" name="updateStatus">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                            <button class="btn  btn-info" onclick="myprint()">ပရင့်ထုတ်မည်</button>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- <style>
    .popover {
        top: 77px !important;
    }
</style> -->

            <!-- <script>
                $(function () {
                    $('[data-toggle="popover"]').popover();
                });
            </script> -->
    <?php
        include_once "layouts/footer.php";
    ?>
    <?php
                                        
                                        // echo "<div class='row mt-3'>
                                        //         <div class='col-md-6'>
                                        //             <p>Order number:</p>
                                        //         </div>
                                        //         <div class='col-md-6'><span>".
                                        //             $order_details[0]['order_id']."</span>
                                        //         </div>
                                        //     </div>";
                                        // echo "<div class='row'>
                                        //         <div class='col-md-6'>
                                        //             <p>Order date:</p>
                                        //         </div>
                                        //         <div class='col-md-6'>".
                                        //             explode(" ",$order_details[0]['created_date'])[0]."
                                        //         </div>
                                        //     </div>";
                                        // echo "<div class='row'>
                                        //         <div class='col-md-6'>
                                        //             <p>Customer name:</p>
                                        //         </div>
                                        //         <div class='col-md-6'>".
                                        //             $order_details[0]['cus_name']."
                                        //         </div>
                                        //     </div>";
                                        // if($orderinfo['delivery_id']==1){
                                        //     echo "<div class='row'>
                                        //             <div class='col-md-6'>
                                        //                 <p>Order type</p>
                                        //             </div>
                                        //             <div class='col-md-6'>
                                        //                 <p>Pick up</p>
                                        //             </div>
                                        //         </div>";
                                        //         echo "<hr>";
                                        //     $array=[];
                                        //     for($index=0;$index<count($order_details);$index++){
                                        //         $itemtotal=$order_details[$index]['qty']*$order_details[$index]['price'];
                                        //         array_push($array,$itemtotal);
                                        //         echo "<div class='row'>
                                        //                         <div class='col-md-6'>
                                        //                             <p>".$order_details[$index]['name'].":".$order_details[$index]['qty']."</p>
                                        //                         </div>
                                        //                         <div class='col-md-6'>
                                        //                             <p>".$itemtotal."</p>
                                        //                         </div>
                                        //                     </div>";
                                        //     }
                                        // echo "<hr>";
                                        
                                        
                                        //     echo "<div class='row'>
                                        //             <div class='col-md-6'>
                                        //                 <p>Total:</p>
                                        //             </div>
                                        //             <div class='col-md-6'>".
                                        //                 array_sum($array)."
                                        //             </div>
                                        //         </div>";
                                        // }
                                        // if($orderinfo['delivery_id']==2){
                                        //     echo "<div class='row'>
                                        //             <div class='col-md-6'>
                                        //                 <p>Order type</p>
                                        //             </div>
                                        //             <div class='col-md-6'>
                                        //                 <p>Delivery</p>
                                        //             </div>
                                        //         </div>";
                                        //         echo "<hr>";
                                        //     $array=[];
                                        //     for($index=0;$index<count($order_details);$index++){
                                        //         $itemtotal=$order_details[$index]['qty']*$order_details[$index]['price'];
                                        //         array_push($array,$itemtotal);
                                        //         echo "<div class='row'>
                                        //                         <div class='col-md-6'>
                                        //                             <p>".$order_details[$index]['name'].":".$order_details[$index]['qty']."</p>
                                        //                         </div>
                                        //                         <div class='col-md-6'>
                                        //                             <p>".$itemtotal."</p>
                                        //                         </div>
                                        //                     </div>";
                                        //     }
                                        // echo "<hr>";
                                        
                                        
                                        //     echo "<div class='row'>
                                        //             <div class='col-md-6'>
                                        //                 <p>Subtotal:</p>
                                        //             </div>
                                        //             <div class='col-md-6'>".
                                        //                 array_sum($array)."
                                        //             </div>
                                        //         </div>";
                                        //     echo "<div class='row'>
                                        //             <div class='col-md-6'>
                                        //                 <p>Total:</p>
                                        //             </div>
                                        //             <div class='col-md-6'>".
                                        //                 $orderinfo['total_balance']."
                                        //             </div>
                                        //         </div>";
                                        // }
                                        
                                            
                                           
                                        
                                    ?>