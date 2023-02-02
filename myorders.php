<?php
session_start();
include_once "controller/user_controller.php";
include_once "includes/connect.php";


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

<?php

include_once "layouts/header.php";


?>    
    
    <body>
        <div class="container-fluid mt-2 text-dark text-center">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Active Orders</h4>
                                    <p>You have no active orders.</p>

                                </div>
                                <div class="col-md-12">
                                    <h4>Past Orders</h4>

   
                                </div>
                                    
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

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
    
<?php

include_once "layouts/footer.php";


?>