<?php
session_start();
include_once "controller/user_controller.php";
// include_once "admin/includes/connect.php";

include_once 'admin/controller/product_controller.php';
// include_once 'controller/categories_controller.php';

$products_controller=new ProductController();
$products=$products_controller->getProducts();
// var_dump($products);
// $categories=new CategoriesController();
// $results=$categories->getcategories();




?>

<?php
include_once "controller/viewCart_controller.php";
include_once "layouts/header.php";

$viewCart = new ViewCartController();
$userId = $_SESSION['user_array']['id'];
$result = $viewCart->getViewCart($id);
// var_dump($result[0]['category_id']);

?>    
    
    <body>
    
    <div class="container text-dark bg-white" id="cont">
        <div class="row">
            <div class="alert alert-info mb-0" style="width: -webkit-fill-available;">
              <strong>Info!</strong> online payment are currently disabled so please choose cash on delivery.
            </div>
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


                                $counter = 0;
                                $totalPrice = 0;
                                // var_dump($result);

                                if($result){



                                    
                                    for($i=0;$i<count($result);$i++)
                                    {
                                        $user_id = $result[$i]['user_id'];
                                        $category_id = $result[$i]['category_id'];
                                        // var_dump($category_id);

                                        $product_id = $result[$i]['product_id'];
                                        $Quantity = $result[$i]['itemQuantity'];
                                        // $detailCart = new ViewCartController();
                                        // $myrow = $detailCart->getDetailCart($user_id,$product_id); 
                                        // var_dump($myrow);                                       
                                        for($j=0;$j<count($products);$j++)
                                        {
                                            if($products[$j]['id']==$result[$i]['product_id'])
                                            {
                                                // echo $products[$j]['name'];
                                                $itemName = $products[$j]['name'];
                                                $itemPrice = $products[$j]['price'];

                                            }

                                        }
                                    // var_dump($itemName);

                                    $total = $itemPrice * $Quantity;
                                    $counter++;
                                    $totalPrice = $totalPrice + $total;
                                    echo '<tr>
                                    <td>' . $counter . '</td>
                                    <td>' . $itemName . '</td>
                                    <td>' . $itemPrice . '</td>
                                    <td>
                                        <form id="frm' . $product_id . '">
                                            <input type="hidden" name="product_id" value="' . $product_id . '">
                                            <input type="number" name="quantity" value="' . $Quantity . '" class="text-center" onchange="updateCart(' . $product_id . ')" onkeyup="return false" style="width:60px" min=1 oninput="check(this)" onClick="this.select();">
                                        </form>
                                    </td>
                                    <td>' . $total . '</td>
                                    <td>
                                        <form action="manageCart.php" method="POST">
                                            <button name="removeItem" class="btn btn-sm btn-outline-danger">Remove</button>
                                            <input type="hidden" name="itemId" value="'.$product_id. '">
                                        </form>
                                    </td>
                                </tr>';
                            }

                                    }



                                if($counter==0) {
                                    ?><script> document.getElementById("cont").innerHTML = '<div class="col-md-12 my-5"><div class="card"><div class="card-body cart"><div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3"><h3><strong>Your Cart is Empty</strong></h3><h4>Add something to make me happy :)</h4> <a href="index.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a> </div></div></div></div>';</script> <?php
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

include_once "layouts/footer.php";


?>