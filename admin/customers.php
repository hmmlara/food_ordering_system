<?php
    include_once "layouts/header.php";
    include_once "controller/user_controller.php";

    $cus_controller=new UserController();
    $results=$cus_controller->getCustomers();
?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Customers</h1>

                    <div class="row">
                        <div class="col-md">
                            <table class="table table-striped" id="cus_table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Created Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        for($i=0;$i<count($results);$i++){
                                            echo "<tr>";
                                            echo "<td>".$i+1 ."</td>";
                                            echo "<td>".$results[$i]['name']."</td>";
                                            echo "<td>".$results[$i]['email']."</td>";
                                            echo "<td>".$results[$i]['created_date']."</td>";
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