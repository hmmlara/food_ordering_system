<?php
include_once "layouts/header.php";
include_once "controller/user_controller.php";
// include_once "admin/includes/connect.php";

include_once 'admin/controller/product_controller.php';
// include_once 'controller/categories_controller.php';

$products_controller=new ProductController();
$products=$products_controller->getProducts();
// var_dump($products);
// $categories=new CategoriesController();
// $results=$categories->getcategories();

$id = $_SESSION['user_array']['id'];
// echo '<pre>';
// var_dump($_SESSION['cart']);
// echo '</pre>';


$val = isset($_POST['item']) ? $_POST['item'] : 1; //to be displayed

if(isset($_POST['incqty'])){

   $val += 1;
}

if(isset($_POST['decqty'])){
   $val -= 1;                                            
}


?>
 
    
    <body>

    <?php 
    if($_SESSION['user_array']){
    ?>
    
    <div class="container text-dark bg-white" id="cont">
        <div class="row">
            <!-- <div class="alert alert-info mb-0" style="width: -webkit-fill-available;">
              <strong>Info!</strong> online payment are currently disabled so please choose cash on delivery.
            </div> -->
            <div class="col-lg-12 text-center border rounded bg-dark text-white my-3">
                <h1>My Cart</h1>
            </div>
            <div class="col-lg-8">
                <div class="card wish-list mb-3">
                    <table class="table text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Item Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">
                                    <form action="partials/_manageCart.php" method="POST">
                                        <button name="removeAllItem" class="btn btn-sm btn-outline-danger">Remove All</button>
                                        <input type="hidden" name="userId" value="<?php echo $userId; ?>">
                                    </form>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        // $productCheck = array_column($_SESSION['cart'],'name');
                        // var_dump($productCheck);

                                $counter = 0;
                                $totalPrice = 0;
                                // var_dump($_SESSION['cart']);


                                if($_SESSION['cart']>1){
                                    echo '<form method="post" action="'.$_SERVER["PHP_SELF"].'">';
                                    foreach ($_SESSION['cart'] as $value) {
                                        // $id=$value['id'];
                                        $quantity = 1;
                                        $total = $value['price'] * $quantity;
                                        $counter++;
                                        $totalPrice += $total;
                                        echo '<tr>
                                        <td>' . $counter . '</td>
                                        <td>' . $value['name'] . '</td>
                                        <td>' . $value['price']  . '</td>


                                            <td>
                                                <input type="hidden" name="product_id" value="' . $value['id'] . '">
                                                <button name="incqty">+</button>
                                                <input type="text" size="1" name="item" value="'.$val.'"/>
                                                <button name="decqty">-</button>
                                            </td>
                              
                                        
                                        <td class="totalPrice">' . $total . '</td>
                                        <td>
                                            <form action="manageCart.php" method="POST">
                                                <button name="removeItem" class="btn btn-sm btn-outline-danger">Remove</button>
                                                <input type="hidden" name="itemId" value="'.$value['id']. '">
                                            </form>
                                        </td>
                                        </tr>';
                                        
                                    }
                                    echo '</form>';

                                }
                                if($counter==0){
                                ?>
                                <script> document.getElementById("cont").innerHTML = 
                                `<div class="col-md-12 my-5">
                                <div class="card">
                                <div class="card-body cart">
                                <div class="col-sm-12 empty-cart-cls text-center"> 
                                <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                                <h3><strong>Your Cart is Empty</strong></h3>
                                <h4>Add something to make me happy :)</h4> 
                                <a href="index.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a> 
                                </div></div></div></div>`</script>; 
                                <?php

                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card wish-list mb-3">
                    <div class="pt-4 border bg-light rounded p-3">
                        <h5 class="mb-3 text-uppercase font-weight-bold text-center">Order summary</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0 bg-light">Total Price<span>Rs. <?php echo $totalPrice ?></span></li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0 bg-light">Shipping<span>Rs. 0</span></li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3 bg-light">
                                <div>
                                    <strong>The total amount of</strong>
                                    <strong><p class="mb-0">(including Tax & Charge)</p></strong>
                                </div>
                                <span><strong>Rs. <?php echo $totalPrice ?></strong></span>
                            </li>
                        </ul>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Cash On Delivery 
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Online Payment 
                            </label>
                        </div><br>
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#checkoutModal">go to checkout</button>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="pt-4">
                        <a class="dark-grey-text d-flex justify-content-between" style="text-decoration: none; color: #050607;" data-toggle="collapse" href="#collapseExample"
                            aria-expanded="false" aria-controls="collapseExample">
                            Add a discount code (optional)
                            <span><i class="fas fa-chevron-down pt-1"></i></span>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <div class="mt-3">
                                <div class="md-form md-outline mb-0">
                                    <input type="text" id="discount-code" class="form-control font-weight-light"
                                    placeholder="Enter discount code">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
         
    <?php 
    }
    else {
        echo '<div class="container" style="min-height : 610px;">
        <div class="alert alert-info my-3">
            <font style="font-size:22px"><center>Before checkout you need to <strong><a class="alert-link" data-toggle="modal" data-target="#loginModal">Login</a></strong></center></font>
        </div></div>';
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <!-- <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script> -->

    <script>
        function check(input) {
            if (input.value <= 0) {
                input.value = 1;
            }

        }
        
        var minVal = 1, maxVal = 100; // Set Max and Min values
        // Increase product quantity on cart page
        $(".increaseQty").on('click', function(){
                var $parentElm = $(this).parents(".qtySelector");
                $(this).addClass("clicked");
                setTimeout(function(){
                    $(".clicked").removeClass("clicked");
                },100);
                var value = $parentElm.find(".qtyValue").val();
                if (value < maxVal) {
                    value++;
                }
                $parentElm.find(".qtyValue").val(value);
        });
        // Decrease product quantity on cart page
        $(".decreaseQty").on('click', function(){
                var $parentElm = $(this).parents(".qtySelector");
                $(this).addClass("clicked");
                setTimeout(function(){
                    $(".clicked").removeClass("clicked");
                },100);
                var value = $parentElm.find(".qtyValue").val();
                if (value > 1) {
                    value--;
                }
                $parentElm.find(".qtyValue").val(value);
                $parentElm.find(".totalPrice").val(value);

            });
        // function updateCart(id) {
        //     $.ajax({
        //         url: 'manageCart.php',
        //         type: 'POST',
        //         data:$("#frm"+id).serialize(),
        //         success:function(res) {
        //             location.reload();
        //         } 
        //     })
        // }
    </script>   
    
<?php
require 'checkoutModal.php';
include_once "layouts/footer.php";


?>

