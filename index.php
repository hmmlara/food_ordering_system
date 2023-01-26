<?php
include_once 'layouts/header.php';

?>
    
    <body>
        <div class="block hero1 my-auto" style="background-image:url(https://images.unsplash.com/photo-1514933651103-005eec06c04b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1934&q=80);">
            <div class="container-fluid text-center">
                 <h1 class="display-2 text-white" data-aos="fade-up" data-aos-duration="1000"
                data-aos-offset="0">Darli SNACKS & DRINKS</h1>
                <p class="lead text-white" data-aos="fade-up" data-aos-duration="1000"
                data-aos-delay="600">We are closed for the moment, but we will still deliver food at your place!</p>
                <a
                href="#menu" class="btn-text lead d-inline-block text-white border-top border-bottom mt-4 pt-1 pb-1"
                data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1200">View Today's Menu</a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="maincontent">
            <div class="container">
                <section id="menu">
                    <div class="block menu1">
                        <div class="buttons-container"> <a href="#" class="button button--is-active" data-target="pizzaMenu">Pizzas</a>
                            <a
                            href="#" class="button" data-target="coffeeMenu">Drinks</a> <a href="#" class="button" data-target="noodlesMenu">Desserts</a>
                        </div>
                        <!-- Start Pizza Menu -->
                        <div class="menu menu--is-visible" id="pizzaMenu" data-aos="fade-up">
                            <div class="item row align-items-center">
                                <div class="col-sm-3 pr-5">
                                    <img class="product-img" src="./img/pizza-1.png">
                                </div>
                                <div class="details col-sm-9">
                                    <div class="item__header">
                                         <h3 class="item__title">Cheese Pizza</h3>
                                        <span class="item__dots"></span>
                                        <span class="item__price">$15</span>
                                    </div>
                                    <p class="item__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum
                                        officia eaque nobis ut.</p>
                                    <button class="btn btn-sm btn-outline-primary my-cart-btn"
                                    data-id="1" data-name="Cheese Pizza" data-price="15" data-quantity="1"
                                    data-image="./img/pizza-1.png">Add to cart</button>
                                </div>
                            </div>
                            <div class="item row align-items-center">
                                <div class="col-sm-3 pr-5">
                                    <img class="product-img" src="./img/pizza-2.png">
                                </div>
                                <div class="details col-sm-9">
                                    <div class="item__header">
                                         <h3 class="item__title">Hot Pastrami</h3>
                                        <span class="item__dots"></span>
                                        <span class="item__price">$25</span>
                                    </div>
                                    <p class="item__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum
                                        officia eaque nobis ut.</p>
                                    <button class="btn btn-sm btn-outline-primary my-cart-btn"
                                    data-id="2" data-name="Hot Pastrami" data-price="25" data-quantity="1"
                                    data-image="./img/pizza-2.png">Add to cart</button>
                                </div>
                            </div>
                            <div class="item row align-items-center">
                                <div class="col-sm-3 pr-5">
                                    <img class="product-img" src="./img/pizza-3.png">
                                </div>
                                <div class="details col-sm-9">
                                    <div class="item__header">
                                         <h3 class="item__title">Classic Pizza</h3>
                                        <span class="item__dots"></span>
                                        <span class="item__price">$20</span>
                                    </div>
                                    <p class="item__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum
                                        officia eaque nobis ut.</p>
                                    <button class="btn btn-sm btn-outline-primary my-cart-btn"
                                    data-id="3" data-name="Classic Pizza" data-price="20" data-quantity="1"
                                    data-image="./img/pizza-3.png">Add to cart</button>
                                </div>
                            </div>
                            <div class="item row align-items-center">
                                <div class="col-sm-3 pr-5">
                                    <img class="product-img" src="./img/pizza-4.png">
                                </div>
                                <div class="details col-sm-9">
                                    <div class="item__header">
                                         <h3 class="item__title">Country Pizza</h3>
                                        <span class="item__dots"></span>
                                        <span class="item__price">$17</span>
                                    </div>
                                    <p class="item__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum
                                        officia eaque nobis ut.</p>
                                    <button class="btn btn-sm btn-outline-primary my-cart-btn"
                                    data-id="4" data-name="Country Pizza" data-price="17" data-quantity="1"
                                    data-image="./img/pizza-4.png">Add to cart</button>
                                </div>
                            </div>
                        </div>
                        <!-- End Pizza Menu -->
                        <!-- Start Coffee Menu -->
                        <div class="menu" id="coffeeMenu">
                            <div class="item">
                                <div class="item__header">
                                     <h3 class="item__title">Cappuccino</h3>
                                    <span class="item__dots"></span>
                                    <span class="item__price">$4</span>
                                </div>
                                <p class="item__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum
                                    officia eaque nobis ut.</p>
                            </div>
                            <div class="item">
                                <div class="item__header">
                                     <h3 class="item__title">Iced Coffee</h3>
                                    <span class="item__dots"></span>
                                    <span class="item__price">$5</span>
                                </div>
                                <p class="item__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum
                                    officia eaque nobis ut.</p>
                            </div>
                            <div class="item">
                                <div class="item__header">
                                     <h3 class="item__title">Café Latte</h3>
                                    <span class="item__dots"></span>
                                    <span class="item__price">$3</span>
                                </div>
                                <p class="item__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum
                                    officia eaque nobis ut.</p>
                            </div>
                            <div class="item">
                                <div class="item__header">
                                     <h3 class="item__title">Espresso</h3>
                                    <span class="item__dots"></span>
                                    <span class="item__price">$4</span>
                                </div>
                                <p class="item__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum
                                    officia eaque nobis ut.</p>
                            </div>
                        </div>
                        <!-- End Coffee Menu -->
                        <!-- Start Noodles Menu -->
                        <div class="menu" id="noodlesMenu">
                            <div class="item">
                                <div class="item__header">
                                     <h3 class="item__title">Chicken Noodles</h3>
                                    <span class="item__dots"></span>
                                    <span class="item__price">$16</span>
                                </div>
                                <p class="item__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum
                                    officia eaque nobis ut.</p>
                            </div>
                            <div class="item">
                                <div class="item__header">
                                     <h3 class="item__title">Egg Noodles</h3>
                                    <span class="item__dots"></span>
                                    <span class="item__price">$12</span>
                                </div>
                                <p class="item__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum
                                    officia eaque nobis ut.</p>
                            </div>
                            <div class="item">
                                <div class="item__header">
                                     <h3 class="item__title">Veg Noodles</h3>
                                    <span class="item__dots"></span>
                                    <span class="item__price">$10</span>
                                </div>
                                <p class="item__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum
                                    officia eaque nobis ut.</p>
                            </div>
                            <div class="item">
                                <div class="item__header">
                                     <h3 class="item__title">Chuck Norris Noodles</h3>
                                    <span class="item__dots"></span>
                                    <span class="item__price">$20</span>
                                </div>
                                <p class="item__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum
                                    officia eaque nobis ut.</p>
                            </div>
                        </div>
                        <!-- End Noodles Menu -->
                    </div>
                    <!-- End block -->
                    <script src="./js/mycart.js"></script>
                    <script src="./js/mycart-custom.js"></script>
                </section>
            </div>
        </div>
        <div class="nav-item my-cart-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg></i> <span class="badge badge-notify my-cart-badge"> </span>
        </div>
        <?php
        include_once 'layouts/footer.php';

        ?>