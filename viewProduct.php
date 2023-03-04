<?php 
session_start();
include_once "layouts/header.php";
// include_once __DIR__."/../admin/includes/connect.php";
include_once "controller/viewCart_controller.php";

$products = new ViewCartController();
// $product = $products->get_products($productID);




?>



    <div class="container text-dark bg-white my-4 text-center" id="cont">
        <div class="row jumbotron">
        <?php
            // $pizzaId = $_GET['pizzaid'];
            $productID = $_GET['item_id'];
            $product = $products->get_product($productID);
            // var_dump($product);
            $productName = $product['name'];
            $productPrice = $product['price'];
            $productDesc = $product['description'];
            $productStatus = $product['status'];
            $productImage = $product['image'];
            $productCategorieId = $product['category_id'];
        ?>
        <script> document.getElementById("title").innerHTML = "<?php echo $productName; ?>"; </script> 
        <?php
        echo  ' <div class="col-md-4">
                    <img class="w-75" src="img/product-'.$productID. '.jpg">
                </div>
                <div class="col-md-8 my-4 text-center">
                    <h2 class="w-100">' . $productName . '</h2>
                    <h5 class="mt-3">Price : '.$productPrice. ' MMK</h5>
     
                    <p class="mb-2">Description : ' .$productDesc .'</p>
                    <p class="mb-3">Status : ' .$productStatus .'</p>
                    <form action="manageCart.php" method="post">
                        <div class=" d-flex justify-content-center">
                            <input type="number" name="pQty" class="form-control w-25 mt-2" value="1" min="1">
                            <input type="hidden" name="pId" value="'.$productID. '">
                            <input type="hidden" name="pName" value="'.$productName. '">
                            <input type="hidden" name="pPrice" value="'.$productPrice. '">
                            <button name="addToCart" class=" btn btn-outline-primary my-cart-btn w-25 mt-2">Add</button>  
                        </div>
                    </form>
                </div>';

                
        ?>
        </div>
    </div>

    <?php
    include_once 'layouts/footer.php';


    ?>