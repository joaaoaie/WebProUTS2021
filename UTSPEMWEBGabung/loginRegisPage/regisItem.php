<?php include '../connect_db.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Registration Page</title>

        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
        <link rel="stylesheet" type="text/css" href="style.css">
    
        <!-- <script type="text/javascript"> 
            $(document).ready(function(){
                $('#myModal').modal({
                    keyboard: false,
                    show: true,
                    backdrop: 'static'
                });
            });
        </script> -->
    </head>
    <body>
        <div class="container" style="margin-bottom: 3%">
            <form id="form-login-submit" class="box2 col-4 col-m-4" method="POST" action="./addNewUser.php" enctype="multipart/form-data">
                <h1>User Registration</h1>
                <input type="text" class="form-control" name="firstName" placeholder="Masukkan First Name">
                <input type="text" class="form-control" name="lastName" placeholder="Masukkan Last Name">
                <input type="text" class="form-control" name="username" placeholder="Masukkan Username">
                <input type="email" class="form-control" name="email" placeholder="Masukkan Email">
                <input type="password" class="form-control" name="pass" placeholder="Masukkan Password">
                <input type="date" class="form-control" name="tanggalLahir">
                <input type="text" class="form-control" name="jenisKelamin" placeholder="Male or Female">
                <input style="margin-top: 4%;" type="file" name="gambar" accept="image/png, image/jpeg">
                
                <div class="inputs2">
                    <div style="width: 50%; float: right; margin-top: 0%">
                        <a href="../index.php">
                            <input style="margin-top: 4%; margin-left: 3%;" type="button" class="btn btn-outline-primary" value="Cancel">
                        </a>
                    </div>
                    <div style="width: 50%; margin-left: 20%;">
                        <input style="margin-top: 4%" type="submit" name="register" class="btn btn-primary" value="Register">
                    </div>
                </div>

                <?php if(isset($_SESSION['error_login_message'])){ ?>
                    <div class="alert alert-danger py-1" style="margin-top: 3%;" role="alert">
                        <?= $_SESSION['error_login_message'] ?>
                    </div>
                <?php unset($_SESSION['error_login_message']); } ?>

                <div class="footer2">
                    <div style="width: 50%; float: left">
                        <h4>Already Have An Account?</h4>
                    </div>
                    <div style="width: 50%; float: right; margin-top: 1%;">
                        <a href="./loginUser.php"><input type="button" value="Login"></a>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>