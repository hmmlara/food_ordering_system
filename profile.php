<?php
include_once "layouts/header.php";
include_once "controller/user_controller.php";



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
        // echo '<script> location.replace("profile.php"); </script>';
        $_SESSION['updated_info_message'] = "Updated your info successfully!";

    }

    // if($result)
    // {
    //     $_SESSION['expire_time'] = time() + (0.1 * 60);
    //     $_SESSION['success_msg'] = "
    //     <script>  
    //             alertify.set('notifier','position', 'bottom-right');
    //             alertify.success('Updated Information!');
    //     </script>";
        
    //     // header('location:profile.php');

    // }

    // if(time() < $_SESSION['expire_time'])
    // {
    //     echo $_SESSION['success_msg'];
    // }
    // else
    // {
    //     unset($_SESSION['success_msg']);
    //     unset($_SESSION['expire_time']);
    // }
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
   
    <body>
        <div class="container-fluid mt-4 text-dark">
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


    
<?php

include_once "layouts/footer.php";


?>