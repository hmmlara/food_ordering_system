<?php
session_start();
include_once "controller/user_controller.php";
include_once "include/connect.php";


if(!isset($_SESSION['user_array']))
{
    header('location:login.php');
}

if(isset($_POST['logoutBtn']))
{
    session_destroy();
    header('location:login.php');
}

$id=$_SESSION['user_array']['id'];
// var_dump($id);
$userController = new UserController();
$users  = $userController->getUsers();
$user = $userController->getUser($id);

//USER EDIT
$user_edition_form_status=false;
if(isset($_REQUEST['user_id_to_update']))
{
    $user_edition_form_status=true;
}

//UDPATE USER
if(isset($_POST['updateBtn']))
{
    $id=$_POST['user_id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone_number=$_POST['phone_number'];
    $address=$_POST['address'];
    $input_password=$_POST['password'];

    $old_password = $user['password'];

    $new_password = $old_password != $input_password ? md5($input_password) : $input_password;

    $userController = new UserController();
    $result = $userController->updateUser($id, $name, $email, $phone_number, $address, $new_password);

    if($result)
    {
        $_SESSION['expire_time'] = time() + (0.1 * 60);
        $_SESSION['success_msg'] = "<script>swal('Good job!', 'Successfully Updated!', 'success');</script>";
        header('location:profile.php');

    }

    if(time() < $_SESSION['expire_time'])
    {
        echo $_SESSION['success_msg'];
    }
    else
    {
        unset($_SESSION['success_msg']);
        unset($_SESSION['expire_time']);
    }
}

//Read authentication userdata from database
// $auth_user_id=$_SESSION['user_array']['id'];
// $auth_user_result = mysqli_query($dbconnection, "SELECT * FROM users_info WHERE id=$auth_user_id");
// if($auth_user_result)
// {
//     $auth_user_array = mysqli_fetch_array($auth_user_result);
//     // $auth_user_name = $auth_user_array['name'];
//     // $auth_user_email = $auth_user_array['email'];
// }
// else{
//     die('Error : '. mysqli_error($dbconnection));

// }


?>
<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="./css/style.css" />
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="./js/jquery.min.js"></script>
        <link rel="icon" href="./img/logo.jpg" />
        <link rel="stylesheet" href="./css/customize.css" />
        <title>Darli SNACKS & DRINKS</title>
    </head>
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-dark"> <a class="navbar-brand" href="./user.php"><img class="rounded" src="./img/logo.jpg"></a>
        <button
        class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
        aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"> <a class="nav-link text-white" href="./user.php"><h5>Darli</h5></a>
                    </li>
                    <!-- <li class="nav-item"> <a class="nav-link text-white" href="./profile.php#about">Today's Menu</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link text-white" href="./profile.php#about">About</a>
                    </li> -->
                </ul>
                <div class="d-flex">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>
                            <span> <?php echo $user['name'];        ?></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="profile.php?user_id_to_update=<?php echo $_SESSION['user_array']['id'];        ?>">Profile</a></li>
                            <li><a class="dropdown-item" href="#">My Orders</a></li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <form action="login.php" method="post">
                                        <button type="submit" class="btn btn-danger btn-sm float-end" name="logoutBtn" onclick="return confirm('Are you sure to logout?')">Logout</button>
                                    </form>  
                                </a>
                            </li>
                        </ul>
                    </div>   
                    <div class="mt-2 mx-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bucket" viewBox="0 0 16 16">
                        <path d="M2.522 5H2a.5.5 0 0 0-.494.574l1.372 9.149A1.5 1.5 0 0 0 4.36 16h7.278a1.5 1.5 0 0 0 1.483-1.277l1.373-9.149A.5.5 0 0 0 14 5h-.522A5.5 5.5 0 0 0 2.522 5zm1.005 0a4.5 4.5 0 0 1 8.945 0H3.527zm9.892 1-1.286 8.574a.5.5 0 0 1-.494.426H4.36a.5.5 0 0 1-.494-.426L2.58 6h10.838z"/>
                        </svg>
                    </div>           
                </div>
=======
<?php
>>>>>>> b6dad36a6d0e14d1644d47a6db5d32f1a4b20a9b

include_once "layouts/header.php";


?>    
    <body>
        <div class="container-fluid mt-2 text-dark">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6> User Info</h6>
                                            <div>Name : <span class="px-1 py-1 bg-success"><?php echo $user['name'];        ?></span></div>
                                            <div>Email : <?php echo $user['email'];        ?></div>
                                            <div>Phone Number : <?php echo $user['phone_number'];        ?></div>
                                            <div>Address : <?php echo $user['address'];        ?></div>
                                            <div>Password : <?php echo $user['password'];        ?></div>
                                            <a href="profile.php?user_id_to_update=<?php echo $_SESSION['user_array']['id'];        ?>" class="btn btn-primary btn-sm" name="editBtn">Edit Your Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <?php if($user_edition_form_status==true) : ?>
                                    <div class="card">
                                        <div class="card-header bg-dark text-white">
                                            <div class="card-heading">User Edition Form</div>
                                        </div>
                                        <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="POST">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <!-- <label for="" class="form-label">ID</label> -->
                                                    <input type="hidden" name="user_id" id="" class="form-control" value="<?php if(isset($user)) echo $user['id']  ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-label">Name</label>
                                                    <input type="text" name="name" id="" class="form-control" value="<?php if(isset($user)) echo $user['name']  ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-label">Email</label>
                                                    <input type="text" name="email" id="" class="form-control" value="<?php if(isset($user)) echo $user['email']  ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-label">Phone Number</label>
                                                    <input type="number" name="phone_number" id="" class="form-control" value="<?php if(isset($user)) echo $user['phone_number']  ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-label">Address</label>
                                                    <textarea name="address" id="" cols="30" rows="2" class="form-control"><?php if(isset($user)) echo $user['address']  ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-label">Password</label>
                                                    <input type="text" name="password" id="" class="form-control" value="<?php if(isset($user)) echo $user['password']  ?>">
                                                </div>

                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary" name="updateBtn">Update</button>
                                            </div>
                                        </form>

                                    </div>
                                    <?php endif ?>
                                </div>
                                    
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

<<<<<<< HEAD
        <script src="./js/mycart.js"></script>
        <script src="./js/mycart-custom.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
        <script src="js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="js/custom-general.js"></script>
    </body>
    
    <footer class="block footer1 footer text-center">
            <p>No 14, Nandar St, Conor of KhanTawLay'circle, Infront of Gannamar Park, YatKatGyi 6, Pyin Oo Lwin</p>
            <p>Ph no : 09 794278148</p>
    </footer>
=======

    
<?php

include_once "layouts/footer.php";
>>>>>>> b6dad36a6d0e14d1644d47a6db5d32f1a4b20a9b


?>