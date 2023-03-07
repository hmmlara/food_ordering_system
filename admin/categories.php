<?php
include_once 'layouts/header.php';
include_once 'controller/categories_controller.php';

$categories=new CategoriesController();
$results=$categories->getCategories();

?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h2 class="h3 mb-0 text-gray-800 my-4 mx-2" style="font-size: 40px;">အမျိုးအစားများ</h2>
                        
                    </div>
                    

                    <div class="row">
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-md-12">
                        <a href="create_categories.php" class="btn btn-success my-2">အသစ်ထည့်မည်</a>
                        <table class="table table-striped table-bordered" id="dataTable" style="border:1px solid #c4c3c2;">
                            <thead>
                                <tr>
                                    <th>နံပါတ်</th>
                                    <th>အမည်</th>
                                    <th>မူရင်းအမျိုးအစား</th>
                                    <th>လုပ်ဆောင်ချက်များ</th>
                                </tr>
                            </thead>
                            <tbody id="category_table">
                                    <?php
                                     
                                    for ($row=0; $row < count($results); $row++) { 
                                        echo "<tr>";
                                        echo "<td>".($row+1)."</td>";
                                        echo "<td>".$results[$row]['name']."</td>";
                                        if($results[$row]['parent']==0){
                                            echo "<td>-</td>";
                                        }
                                        else{
                                            for ($index=0; $index <count($results) ; $index++) { 
                                                if($results[$row]['parent']==$results[$index]['id']){
                                                    echo "<td>".$results[$index]['name']."</td>";
                                                }
                                            }
                                        }
                                        // echo "<td>".$results[$row]['created_date']."</td>";
                                        // echo "<td>".$results[$row]['updated_date']."</td>";
                                        echo "<td id='".$results[$row]['id']."'><a href='edit_categories.php?id=".$results[$row]['id']."' class='btn btn-sm btn-info mx-3'>ပြုပြင်မည်</a><a class='btn btn-sm btn-danger delete'>ဖျက်မည်</a></td>";

                                        echo "</tr>";
                                    }


                                    ?>
                            </tbody>
                            

               

                </div>
                <!-- <div class="col-md-1"></div> -->
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
        <?php
        require 'layouts/footer.php';

        ?>