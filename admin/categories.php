<?php
include_once 'layouts/header.php';
include_once 'controller/categories_controller.php';

$categories=new CategoriesController();
$results=$categories->getcategories();


?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Categories</h1>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <a href="create_categories.php" class="btn btn-outline-info">Add New Categories</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                 <th>Parent</th>
                                 <th>Actions</th>
                                   
                                </tr>
                            </thead>
                            <tbody id="category_table">
                                <form action="" method="post">
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
                                        echo "<td id='".$results[$row]['id']."'><a href='edit_categories.php?id=".$results[$row]['id']."' class=' btn btn-warning mr-3'><i class='far fa-edit'></i></a><a class=' btn btn-danger delete'><i class='fas fa-trash-alt'></i></a></td>";

                                        echo "</tr>";
                                    }


                                    ?>
                                </form>
                            </tbody>

               

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        <?php
        include_once 'layouts/footer.php';

        ?>