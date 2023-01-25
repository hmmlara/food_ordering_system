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
        <link rel="icon" href="./img/logo.jpg" />
        <title>Darli Register</title>
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
                                    <a href="index.php" class="float-right mx-3 text-white" style="text-decoration:none;"><< Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body bg-dark text-dark">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="">
                                                <div class="form-group">
                                                    <label for="" class="form-label">Name</label>
                                                    <input type="text" name="name" id="" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-label">Email</label>
                                                    <input type="email" name="email" id="" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-label">Address</label>
                                                    <textarea type="text" name="address" id="" class="form-control" rows="1"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-label">Phone Number</label>
                                                    <input type="number" name="phnum" id="" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-label">Password</label>
                                                    <input type="password" name="pswd" id="" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="form-label">Confirm Password</label>
                                                    <input type="password" name="confirmpswd" id="" class="form-control">
                                                </div>
                                            </form>
                                            
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-primary float-end">Register</button>
                                            <span>If you have account, you can directly login  
                                                <a href="login.php">here</a>
                                            </span>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                                
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
        <script src="js/custom-general.js"></script>
    </body>

</html>