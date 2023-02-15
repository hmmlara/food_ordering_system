<?php
session_start();
include_once "controller/user_controller.php";
include_once __DIR__."/../admin/includes/connect.php";




?>

<?php

include_once "layouts/header.php";


?>    
    
    <body>
        <div class="container-fluid mt-2 text-dark text-center">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Active Orders</h4>
                                    <p>You have no active orders.</p>

                                </div>
                                <div class="col-md-12">
                                    <h4>Past Orders</h4>

   
                                </div>
                                    
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    
<?php

include_once "layouts/footer.php";


?>