<?php
include_once "layouts/header.php";
include_once "controller/user_controller.php";
// include_once "admin/includes/connect.php";

include_once 'admin/controller/product_controller.php';
// include_once 'controller/categories_controller.php';
include_once "controller/viewCart_controller.php";

$products_controller=new ProductController();
$products=$products_controller->getProducts();
// var_dump($products);
// $categories=new CategoriesController();
// $results=$categories->getcategories();

$id = $_SESSION['user_array']['id'];
// echo '<pre>';
// var_dump($_SESSION['cart']);
// echo '</pre>';
$user_id = $_SESSION['user_array']['id'];
$order = new ViewCartController();
$order_details_result = $order->getOrderMaxID($user_id);
// var_dump($order_details_result);



?>

    
    <body>

    <?php 
    if($_SESSION['user_array']){
    ?>
    
    <div class="container mt-4 text-dark bg-white" id="cont">
        <div class="row">
            <!-- <div class="alert alert-info mb-0" style="width: -webkit-fill-available;">
              <strong>Info!</strong> online payment are currently disabled so please choose cash on delivery.
            </div> -->
            <div class="col-lg-12 text-center border rounded bg-dark text-white my-3">
                <h1 class="m-0">My Cart</h1>
            </div>
            <div class="col-lg-8">
                <div class="card wish-list mb-3">
                    <table class="table table-responsive-sm">
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
                                                <input type="number" name="quantity" id="' . $value['id'] . '" value="' .$Quantity.'" class="text-center quantity" onchange="subTotalPrice()" style="width:60px" min="1";">
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
                                <h3 class="mt-4"><strong>Your Cart is Empty</strong></h3>
                                <h5 class="mt-4"><strong>Add something to make me happy :)</strong></h5>
                                <a href="index.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a> 
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 220"><path fill="#000000" fill-opacity="1" d="M0,320L1440,96L1440,320L0,320Z"></path></svg>                                
                                </div></div></div></div>`</script>
                                <?php

                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-4">
                    <form action="manageCart.php" method="post">
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
                                                <input class="form-check-input" value="0=cash_on_delivery" type="radio" name="paytype" id="flexRadioDefault1" checked>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Cash On Delivery 
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" value="1=mBanking" type="radio" name="paytype" id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Online Payment 
                                                </label>
                                            </div><br>
                                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#checkoutModal">go to checkout</button>
                                        </div>
                                    </div>
                                    <!-- <div class="mb-3">
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
                                    </div> -->
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

                        <!-- Checkout Modal -->
                        <div class="modal fade text-dark" id="checkoutModal" tabindex="-1" role="dialog" aria-labelledby="checkoutModal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="checkoutModal">Enter Your Details:</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                <div class="form-group">

                                    <b><label class="form-label" for="deliType">Delivery Type: </label></b></br> 
                                    <!-- <input class="form-control" id="password" name="password" placeholder="Enter Password" type="password" required minlength="4" maxlength="21" data-toggle="password"> -->
                                    <span class="mx-5">
                                        <input type="radio" class="form-check-input" value="1" name="delitype" id="deli1">
                                        <label class="form-label" for=""> Pick Up </label>
                                    </span>
                                    <span class="mx-5 float-right">
                                        <input type="radio" class="form-check-input" value="2" name="delitype" id="deli2" checked>
                                        <label class="form-label" for=""> via Delivery Man </label>   
                                    </span>
            
                                </div>
                                <div>
                                    <div class="form-group">
                                        <b><label for="address">Address:</label></b>
                                        <input class="form-control" id="address" name="address" placeholder="xxxxxSt" type="text" required minlength="3" maxlength="500">
                                    </div>
                                    <div class="form-group">
                                        <b><label for="address1">Address Line 2:</label></b>
                                        <input class="form-control" id="address1" name="address1" placeholder="xxxxxTsp" type="text">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 mb-0">
                                        <b><label for="phone">Phone No:</label></b>
                                        <div class="input-group mb-3">
                                        <!-- <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon"></span>
                                        </div> -->
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="09xxxxxxxxx" required pattern="[0-9]{11}" maxlength="11">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <input type="hidden" name="amount" value="<?php echo $grandTotal ?>">
                                    <button type="submit" name="checkout" class="btn btn-success">Order</button>
                                </div>
                                
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>          -->
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

        var firstRadio = document.getElementById('deli1');
        var secRadio = document.getElementById('deli2');

        var address = document.getElementById('address');
        var address1 = document.getElementById('address1');
        firstRadio.addEventListener('click', function() {
            address.disabled = true;
            address1.disabled = true;
        })
        secRadio.addEventListener('click', function() {
            address.disabled = false;
            address1.disabled = false;
        })
       
    </script>
    
<?php
include_once "layouts/footer.php";


?>

