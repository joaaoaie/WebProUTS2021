<?php include '../connect_db.php' ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Login Page</title>

        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <form class="box" method="POST" action="./loginUserCek.php">
                <h1>User Sign In</h1>
                <input type="text" class="form-control" name="emailUname" placeholder="Masukkan Email/Username">
                <input type="password" class="form-control" name="pass" placeholder="Masukkan Password">
                
                <!-- captcha -->

                <img src="./captcha.php" alt="gambar"/>
                <input type="text" class="form-control" name="kodeCaptcha" value="" maxlength="6" placeholder="Masukkan Captcha">

                <div>
                    <div style="width: 50%; float: right;">
                        <a type="button" href="../index.php">Cancel</a>
                    </div>
                    <div style="width: 50%; margin-left: 20%;">
                        <input type="submit" value="Sign In">
                    </div>
                </div>

                <?php if(isset($_SESSION['error_login_message'])){ ?>
                    <div class="warning" role="alert">
                        <?= $_SESSION['error_login_message'] ?>
                    </div>
                <?php unset($_SESSION['error_login_message']); } ?>
                
                <div>
                    <div class="footer" style="float: left">
                        <h4>Doesn't Have An Account Yet?</h4>
                    </div>
                    <div class="footer" style="float: right">
                        <a type="button" href="./registrationUser.php">Register</a>
                    </div>
                </div>
            </form>  
        </div>
    </body>
</html>