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
                                    <form action="manageCart.php" method="POST">
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
                                $grandTotal = 0;
                                // var_dump($_SESSION['cart']);


                                if($_SESSION['cart']>1){
                                    echo '<form method="post" action="'.$_SERVER["PHP_SELF"].'">';
                                    foreach ($_SESSION['cart'] as $value) {
                                        // $id=$value['id'];
                                        $Quantity = $value['qty'];
                                        $total = $value['price'] * $value['qty'];
                                        $counter++;
                                        $grandTotal += $total;
                                        echo '<tr>
                                        <td>' . $counter . '</td>
                                        <td>' . $value['name'] . '</td>
                                        <td>' . '<input type="hidden" class="unit_price" name="price" value="'.$value['price']. '">' . $value['price']  . '</td>

                                        <td>
                                            <form id="frm' .  $value['id'] . '">
                                                <input type="number" name="quantity" id="' . $value['id'] . '" value="' .$Quantity.'" class="text-center quantity" onchange="subTotalPrice()" style="width:60px" min=1;">
                                            </form>
                                        </td>
                              
                                        
                                        <td class="totalPrice">'.$total.'</td>
                                        <input type="hidden" name="totalPrice" value="'.$total.'">
                                        <input type="hidden" name=" " value="'. $grandTotal .'">

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
                                `<div class="col-md-12">
                                <div class="card">
                                <div class="card-body cart">
                                <div class="col-sm-12 empty-cart-cls text-center"> 
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#000000" fill-opacity="1" d="M0,320L1440,96L1440,0L0,0Z"></path></svg>                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </svg>                                
                                <h3 class="mt-4"><strong>Your Cart is Empty</strong></h3>
                                <a href="index.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a> 
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 220"><path fill="#000000" fill-opacity="1" d="M0,320L1440,96L1440,320L0,320Z"></path></svg>                                
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
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3 bg-light">
                                <div>
                                    <strong>The total amount of</strong>
                                    <strong><p class="mb-0">(including Tax & Charge)</p></strong>
                                </div>
                                <?php echo '<span><strong id="grandTotal">'. $grandTotal .' MMK</strong></span>'?>
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

        let grandTotal = document.getElementById('grandTotal');
        let totalPrice = document.getElementsByClassName('totalPrice');
        let quantity = document.getElementsByClassName('quantity');
        let unit_price = document.getElementsByClassName('unit_price');
        function subTotalPrice()
        {
            let gtotal=0;
            for(let index=0;index<unit_price.length;index++)
            {
                totalPrice[index].innerText = (unit_price[index].value) * (quantity[index].value);
                gtotal += (unit_price[index].value) * (quantity[index].value);
                // console.log(totalPrice[index]);
            }
            grandTotal.innerText = gtotal;
            location.reload();
        }

        $('.quantity').change(function() {
            let id = this.id;
            let qty = this.value;
            console.log(id, qty);

            $.ajax({
                url: 'update_FinalData.php',
                type: 'POST',
                data:{id:id,qty:qty},
                success: function(data) {
                    if(data == 'success') {
                        console.log('Success');
                        
                    }
                    else {
                        console.log(data);

                    }

                }



            })
        });
       
    </script>
    
<?php
require 'checkoutModal.php';
include_once "layouts/footer.php";


?>

