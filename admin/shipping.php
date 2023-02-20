<?php
include_once 'layouts/header.php';
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<?php
include_once 'controller/shipping_controller.php';

 $ship_controller=new ShippingController();
 $shipping=$ship_controller->getShipping();
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 my-4 mx-2" style="font-size: 50px;">မြို့နယ်များ</h1>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <a href="create_shipping.php" class="btn btn-success my-2">အသစ်ထည့်မည်</a>
                        </div>
                    </div>
                    <div class="row my-2">
                            
                        <div class="col-md">
                                <table class='table table-striped table-bordered' id="shipping_table">
                                    <thead>
                                        <tr>
                                            <th>နံပါတ်</th>
                                            <th>မြို့နယ်များ</th>
                                            <th>ဈေးနှုန်း</th>
                                            <th>လုပ်ဆောင်ချက်များ</th>
                                        </tr>
                                    </thead>
                                    <tbody id='shipping_table'>
                                        <?php
                                        for ($row=0; $row <count($shipping) ; $row++) { 
                                            echo "<tr>";
                                            echo "<td>".($row+1)."</td>";
                                            echo "<td>".$shipping[$row]['township']."</td>";
                                            echo "<td>".$shipping[$row]['cost']."</td>";
                                            echo "<td><a href='edit_shipping.php?id=".$shipping[$row]['id']."' class='btn btn-sm btn-info mx-2'>ပြုပြင်မည်</a><a href='delete_shipping.php?id=".$shipping[$row]['id']."' class='btn btn-sm btn-danger delete'>ဖျက်မည်</a></td>";                                           echo "</tr>";
                                        }


                                        ?>
                                    </tbody>

                                </table>

                            </div>

                   

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        <?php
        include_once 'layouts/footer.php';

        ?>