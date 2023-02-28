<?php
    include_once "layouts/header.php";
    include_once "controller/order_controller.php";
    include_once "controller/product_controller.php";
    $id=$_GET['id'];
    $order=new OrderController();

    $order_details=$order->getOrderDetails($id);
    $orderinfo=$order->getSpecificOrder($id);

    // $shipping=$order->getShipping();
    // var_dump($shipping);
    // var_dump($orderinfo['delivery_id']);

    $productController= new ProductController();
    $getproducts=$productController->getProducts();
    // echo '<pre>';
    // var_dump($order_details);
    // echo '</pre>';

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
                                <h4 class="text-center">Darli Snacks & Drinks</h4>
                                <div class="d-sm-flex align-items-center justify-content-between">
                                    <p>Order no: <?php echo $order_details[0]['order_id']; ?></p>
                                    <p>Date: <?php echo explode(" ",$order_details[0]['created_date'])[0]; ?></p>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                            <button class="btn  btn-primary" onclick="myprint()">ပရင့်ထုတ်မည်</button>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->




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