<?php
    include_once "layouts/header.php";
    include_once "controller/adminuser_controller.php";

    $cus_controller=new UserController();
    $results=$cus_controller->getCustomers();
?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-0 text-gray-800 my-4 mx-2" style="font-size: 50px;">စားသုံးသူများ</h1>

                    <div class="row my-3 ">
                        <div class="col-md">
                            <table class="table table-striped table-bordered my-4" id="cus_table">
                                <thead>
                                    <tr>
                                        <th>နံပါတ်</th>
                                        <th>အမည်</th>
                                        <th>အီးမေးလ်</th>
                                        <th>ဖုန်းနံပါတ်</th>
                                        <th>အကောင့်ဖွင့်သည့်ရက်</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        for($i=0;$i<count($results);$i++){
                                            echo "<tr>";
                                            echo "<td>".$i+1 ."</td>";
                                            echo "<td>".$results[$i]['name']."</td>";
                                            echo "<td>".$results[$i]['email']."</td>";
                                            echo "<td>".$results[$i]['phone_number']."</td>";
                                            echo "<td>".explode(" ",$results[$i]['created_date'])[0]."</td>";
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