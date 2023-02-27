<?php
session_start();

include_once "controller/login_controller.php";

//WHEN USER LOGIN
if(isset($_POST['loginBtn']))
{


    $_SESSION['cart'] = array();
    $email=trim($_POST['email']);
    $password=md5(trim($_POST['password']));

    $loginController = new LoginController();
    $user_result = $loginController->getUser($email,$password);
    if($user_result['email'] == $email && $user_result['password'] == $password)
    {
        $_SESSION['user_array']=$user_result;
        session_regenerate_id();
        $user_session_id = session_id();
        $user_id = $_SESSION['user_array']['id'];
        $_SESSION['user_session_id'] = $user_session_id;
        $setUser = $loginController->setUser_SessionId($user_session_id,$user_id);

        header('location:index.php');
        
    }

}

?>
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"
        />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="./css/style.css" />
        <link rel="stylesheet" href="./css/customize.css" />
        <script src="./js/jquery.min.js"></script>
        <style>
            /* width */
            ::-webkit-scrollbar {
            width: 10px;
            }

            /* Track */
            ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px gold; 
            border-radius: 6px;
            }
            
            /* Handle */
            ::-webkit-scrollbar-thumb {
            background: #000000;
            box-shadow: inset 0 0 5px #ffffff; 
            border-radius: 6px;
            }

            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
            background: #ffffff; 
            box-shadow: inset 0 0 5px #000000; 
            }
        </style>
        <link rel="icon" href="./img/logo.jpg" />
        <title>Darli Login</title>
    </head>
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-dark"> <a class="navbar-brand" href="./index.php"><img src="./img/logo.jpg"></a>
        <button
        class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
        aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"> <a class="nav-link text-white" href="./index.php"><h5>Darli</h5></a>
                    </li>
                    <li class="nav-item"> <a class="nav-link text-white" href="./index.php#menu">Today's Menu</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link text-white" href="./about.php">About</a>
                    </li>
                </ul> 
            </div>
    </nav>
    
    <body>
        <div class="maincontent pt-0 pb-0">
            <div class="d-md-flex h-md-100 align-items-center">
                <div class="col-md-6 p-0 h-md-100">
                    <div class="block hero2 my-auto" style="background-image:url(https://images.unsplash.com/photo-1514933651103-005eec06c04b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1934&q=80);">
                        <div class="container-fluid text-center">
                             <h1 class="display-2 text-white" data-aos="fade-up" data-aos-duration="1000"
                            data-aos-offset="0">Darli SNACKS & DRINKS</h1>
                            <p class="lead text-white" data-aos="fade-up" data-aos-duration="1000"
                            data-aos-delay="300">We are closed for the moment, but we will still deliver food at your place!</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-6 p-0 h-md-100 loginarea">
                    <div class="d-md-flex align-items-center h-md-100 p-3 justify-content-center">
                    <div class="container-fluid mt-2 text-dark">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header bg-dark">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="card-title"><a href="login.php" class="text-white" style="text-decoration:none;"><h5>Welcome to Darli</h5></a></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="index.php" class="float-right mx-3 text-white" style="text-decoration:none;">X</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="card-title">Login</div>
                                                        </div>
                                                        <form action="login.php" method="post">
                                                            <div class="card-body">
                                                            <?php if(isset($error)): ?>
                                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                    <strong><?php echo $error;  ?></strong>
                                                                </div>
                                                            <?php endif ?>
                                                                <div class="form-group">
                                                                    <label for="" class="form-label">Email</label>
                                                                    <input type="email" name="email" id="" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="" class="form-label">Password</label>
                                                                    <input type="password" name="password" id="" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <button type="submit" name="loginBtn" class="btn btn-primary float-end my-3">Login</button>
                                                                <div>
                                                                    <span>If you have no account, you can register 
                                                                        <a href="register.php">here</a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                                <div class="col-md-3"></div>
                                                
                                            </div>


                                        </div>
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