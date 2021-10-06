<?php include '../connect_db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Registration Page</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        input[type="date"]:before {
            content: attr(placeholder) !important;
            color: #aaa;
            margin-right: 0.5em;
        }
        input[type="date"]:focus:before,
        input[type="date"]:valid:before {
            content: "";
        }
    </style>
</head>
<body>
    <div class="container-fluid" style="border: 0px">
        <div class="card mx-auto w-50 my-5">
            <div class="card bg-light w-100">
                <div class="card-body mx-auto w-100" style="max-width: 400px;">
                    <h3 class="card-title mt-3 text-center">User Registration</h3>
                    <p class="text-center">Get started with your free account</p>

                    <form id="form-login-submit" class="form-login" method="POST" action="./addNewUser.php" enctype="multipart/form-data">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input type="text" class="form-control" name="firstName" placeholder="First Name">
                            <input type="text" class="form-control" name="lastName" placeholder="Last Name">
                        </div>

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fas fa-user-secret"></i> </span>
                            </div>
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div> 

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input type="password" class="form-control" name="pass" placeholder="Password">
                        </div>

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fas fa-calendar-alt"></i> </span>
                            </div>
                            <input type="date" class="form-control" name="tanggalLahir" placeholder="Birth Date">
                        </div>
                        
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fas fa-venus-mars"></i> </span>
                            </div>
                            <!-- <input type="text" class="form-control" name="jenisKelamin" placeholder="Male or Female"> -->
                            <select name="jenisKelamin" id="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="form-group input-group">
                        <label style="margin-bottom: 0%;" for="profilePicture" class="form-label">Upload Profile Picture</label><br>
                            <input style="margin-top: 4%;" type="file" name="gambar" accept="image/png, image/jpeg">
                        </div> 
                        
                        <?php if(isset($_SESSION['error_login_message'])){ ?>
                            <div class="alert alert-danger py-1" style="margin-top: 3%;" role="alert">
                                <?= $_SESSION['error_login_message'] ?>
                            </div>
                        <?php unset($_SESSION['error_login_message']); } ?>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Create Account">
                            <a href="../index.php">
                                <input type="button" class="btn btn-outline-primary btn-block" style="margin-top: 3%;" value="Cancel">
                            </a>
                        </div>
                        <p class="text-center">Already Have An Account? <a href="./loginUser.php">Log In</a> </p>                                                                 
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>