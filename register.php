<?php

include_once "controller/register_controller.php";


if(isset($_POST['registerBtn']))
{
    
    if(!empty($_POST['name']))
    {
        $name=$_POST['name'];
    }
    else{
        $name_error="Please input name";
    }
    if(!empty($_POST['email']))
    {
        $email=$_POST['email'];
    }
    else{
        $email_error="Please input email";
    }
    if(!empty($_POST['address']))
    {
        $address=$_POST['address'];
    }
    else{
        $address_error="Please input address";
    }
    if(!empty($_POST['phone_number']))
    {
        $phone_number=$_POST['phone_number'];
    }
    else{
        $phone_number_error="Please input phone number";
    }
    if(!empty($_POST['password']))
    {
        $password=md5($_POST['password']);
    }
    else{
        $password_error="Please input password";
    }
    if(empty($_POST['confirm_password']) || ($_POST['password'] != $_POST['confirm_password']))
    {
        $password_wrong="Password does not match";
    }

    $registerController = new RegisterController();
    $userRegister = $registerController->createUser($name,$phone_number,$address,$email,$password);


    if(!isset($name_error) && !isset($email_error) && !isset($address_error) && !isset($password_error) && !isset($password_wrong))
    {
        
        // $query= "INSERT INTO users_info(name,email,phone_number,address,password) VALUES('$name','$email','$phone_number','$address','$encryptPassword')";
        // $result = mysqli_query($dbconnection,$query);
        if($userRegister)
        {
            // echo "<script>alert('Registration Successful');</script>";
            header('location:login.php');    
        }
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
        <script src="./js/jquery.min.js"></script>
        <link rel="icon" href="./img/logo.jpg" />
        <link rel="stylesheet" href="./css/customize.css" />
        <title>Darli's User</title>
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
                    <li class="nav-item"> <a class="nav-link text-white" href="./index.php#about">About</a>
                    </li>
                </ul> 
            </div>
    </nav>
    
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title"><a href="register.php" class="text-white" style="text-decoration:none;"><h5>Registration Form</h5></a></div>
                                </div>
                                <div class="col-md-6">
                                    <a href="index.php" class="float-right mx-3 text-white" style="text-decoration:none;">X</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body bg-dark text-dark">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <form action="" method="post">
                                            <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="" class="form-label">Name</label>
                                                        <input type="text" name="name" id="" class="form-control">
                                                        <i class="text-danger"><?php if(isset($name_error)) echo $name_error;   ?></i class="text-danger">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="form-label">Email</label>
                                                        <input type="email" name="email" id="" class="form-control">
                                                        <i class="text-danger"><?php if(isset($email_error)) echo $email_error;   ?></i class="text-danger">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="form-label">Address</label>
                                                        <textarea type="text" name="address" id="" class="form-control" rows="1"></textarea>
                                                        <i class="text-danger"><?php if(isset($address_error)) echo $address_error;   ?></i class="text-danger">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="form-label">Phone Number</label>
                                                        <input type="number" name="phone_number" id="" class="form-control">
                                                        <i class="text-danger"><?php if(isset($phone_number_error)) echo $phone_number_error;   ?></i class="text-danger">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="form-label">Password</label>
                                                        <input type="password" name="password" id="" class="form-control">
                                                        <i class="text-danger"><?php if(isset($password_error)) echo $password_error;   ?></i class="text-danger">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="form-label">Confirm Password</label>
                                                        <input type="password" name="confirm_password" id="" class="form-control">
                                                        <i class="text-danger"><?php if(isset($password_wrong)) echo $password_wrong;   ?></i class="text-danger">
                                                    </div>
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary float-end" name="registerBtn">Register</button>
                                                <span>If you have account, you can directly login  
                                                    <a href="login.php">here</a>
                                                </span>
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


<?php

include_once "layouts/footer.php";


?>