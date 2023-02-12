<?php
session_start();
include_once "layouts/header.php";
include_once "controller/user_controller.php";
include_once "admin/controller/categories_controller.php";
include_once "admin/controller/product_controller.php";

$categories=new CategoriesController();
$results=$categories->getCategories();

$parents = array_filter($results,function($value){
    if($value["parent"] == 0) 
        return $value;
});




$products_controller=new ProductController();
$products=$products_controller->getProducts();




if(isset($_POST['logoutBtn']))
{
    session_destroy();
    header('location:login.php');
}



?>


<body>
    <div class="block hero1 my-auto"
        style="background-image:url(https://images.unsplash.com/photo-1514933651103-005eec06c04b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1934&q=80);">
        <div class="container-fluid text-center">
            <h1 class="display-2 text-white" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="0">Darli
                SNACKS & DRINKS</h1>
            <p class="lead text-white" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">We are closed
                for the moment, but we will still deliver food at your place!</p>
            <a href="#menu" class="btn-text lead d-inline-block text-white border-top border-bottom mt-4 pt-1 pb-1"
                data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1200">View Today's Menu</a>
            <a href="#about" class="btn-text lead d-inline-block text-white border-top border-bottom mt-4 pt-1 pb-1"
                data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1200">About</a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="maincontent">
        <div class="container">
            <section id="menu">
                <div class="block menu1">
                    <div class="row">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <div class="col-md-2">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                        aria-selected="true">ALL</button>
                                </li>
                            </div>
                            <div class="col-md-10 d-flex">
                                <?php 
                                for($i = 0; $i < count($parents); $i++){
                            ?>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#<?php echo $parents[$i]['name']; ?>" type="button" role="tab"
                                        aria-controls="pills-profile"
                                        aria-selected="false"><?php echo $parents[$i]['name']; ?></button>
                                </li>

                                <?php
                                }
                            ?>
                            </div>
                        </ul>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">
                            <div class="menu menu--is-visible" id="pizzaMenu" data-aos="fade-up">
                                <div class="row">
                                    <?php
                            for($row=0;$row<count($products);$row++){
                                echo ' <div class="col-md-3 text-center">
                                    <div class="px-2 my-2">
                                    <img src="admin/uploads/'.$products[$row]['image'].'"alt="" width="200px" height="200px">
                                         <h3 class="item__title text-center" style="font-size:23px">'.$products[$row]['name'].'</h3>
                                        <!-- <span class="item__dots"></span> -->
                                        <p class="item__price text-center">'.$products[$row]['price'].'</p>
                                        <button class=" btn btn-outline-primary my-cart-btn"
                                    data-id="2" data-name="'.$products[$row]['name'].'" data-price="'.$products[$row]['price'].'" data-quantity="1"
                                    data-image="admin/uploads/'.$products[$row]['image'].'"alt="">Add to cart</button>
                                    </div>
                                </div>';
                                
                                } 

                            ?>
                                </div>

                            </div>
                        </div>
                        <?php 
                            for($i = 0; $i < count($parents); $i++){
                        ?>
                        <div class="tab-pane fade" id="<?php echo $parents[$i]['name']; ?>" role="tabpanel"
                            aria-labelledby="pills-profile-tab" tabindex="0">
                            <div class="menu menu--is-visible" id="pizzaMenu" data-aos="fade-up">
                                <div class="row">
                                    <?php
                            for($row=0;$row<count($products);$row++){
                                if($products[$row]["category_id"] == $parents[$i]['id']){
                                echo ' <div class="col-md-3 text-center">
                                    <div class="px-2 my-2">
                                    <img src="admin/uploads/'.$products[$row]['image'].'"alt="" width="200px" height="200px">
                                         <h3 class="item__title text-center" style="font-size:23px">'.$products[$row]['name'].'</h3>
                                        <!-- <span class="item__dots"></span> -->
                                        <p class="item__price text-center">'.$products[$row]['price'].'</p>
                                        <button class=" btn btn-outline-primary my-cart-btn"
                                    data-id="2" data-name="'.$products[$row]['name'].'" data-price="'.$products[$row]['price'].'" data-quantity="1"
                                    data-image="admin/uploads/'.$products[$row]['image'].'"alt="">Add to cart</button>
                                    </div>
                                </div>';
                                
                                } 
                            }                           

                            ?>
                                </div>
                            </div>
                        </div>
                        <?php 
                            }
                        ?>
                    </div>
                </div>
        </div>
        <!-- End Pizza Menu -->
        
    </div>
    <!-- End block -->
    <script src="./js/mycart.js"></script>
    <script src="./js/mycart-custom.js"></script>
    </section>
    </div>
    </div>
    <div class="maincontent">
        <div class="container" id="about">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h1 class="display-4 text-center">Ways to deliver at your home and the measures we take</h1>

                    <div class="featured-img mt-5 mb-5">
                        <img data-aos="fade-up" data-aos-duration="1000" data-aos-offset="0"
                            src="https://images.unsplash.com/photo-1532509334149-d2130d74253c?ixlib=rb-1.2.1&auto=format&fit=crop&w=2000&q=80">
                    </div>
                    <article class="article" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="0"
                        data-aos-delay="200">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It
                            has roots in a piece of classical Latin literature from 45 BC, making it
                            over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney
                            College in Virginia, looked up one of the more obscure Latin words, consectetur,
                            from a Lorem Ipsum passage, and going through the cites of the word in
                            classical literature, discovered the undoubtable source.</p>
                        <p>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum
                            et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC.
                            This book is a treatise on the theory of ethics, very popular during the
                            Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..",
                            comes from a line in section 1.10.32.</p>
                        <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below
                            for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum
                            et Malorum" by Cicero are also reproduced in their exact original form,
                            accompanied by English versions from the 1914 translation by H. Rackham.</p>
                    </article>
                </div>
            </div>
        </div>

    </div>
        <div class='nav-item my-cart-icon'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-cart3' viewBox='0 0 16 16'>
            <path d='M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
            </svg></i> <span class='badge badge-notify my-cart-badge'> </span>
        </div>
    <?php
    include_once 'layouts/footer.php';


       ?>