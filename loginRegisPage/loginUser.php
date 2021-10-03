<?php include './connect_db.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Login Page</title>

        <link rel="stylesheet" type="text/css" href="login.css">
    </head>
    <body>
        <div class="container">
            <form class="box" method="POST" action="./loginUserCek.php">
                <h1>User Sign In</h1>
                <input type="email" class="form-control" name="email" placeholder="Masukkan Email">
                <input type="password" class="form-control" name="pass" placeholder="Masukkan Password">
                
                <div>
                    <div style="width: 50%; float: right;">
                        <a type="button" href="./base.php">Cancel</a>
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