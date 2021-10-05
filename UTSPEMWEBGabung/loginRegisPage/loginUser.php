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
            <form class="box col-2 col-m-2" method="POST" action="./loginUserCek.php">
                <h1>User Sign In</h1>
                <input type="text" class="form-control" name="emailUname" placeholder="Masukkan Email/Username">
                <input type="password" class="form-control" name="pass" placeholder="Masukkan Password">
                
                <!-- captcha -->
                <?php 
                    $var = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                    for($i=0;$i<8;$i++){
                        $pass[$i] = $var[rand(0,strlen($var)-1)];
                    }
                ?>
                <style>
                    .captchaImage{
                        background-color: whitesmoke;
                        color: black;
                        user-select: none;
                        width: 45%;
                        margin: auto;
                        padding: 3%;
                        border-radius: 5px;
                        font-family: "Brush Script MT",cursive;
                        font-size: 25pt;
                    }
                </style>
                <div class="captchaImage">
                    <?php
                        for($i=0;$i<8;$i++){
                            echo $pass[$i];
                        }
                        $code = implode($pass); //Untuk mengubah array menjadi string
                    ?>
                </div>
                <input type="hidden" class="form-control" name="captcha" value="<?=$code?>">
                <input type="text" class="form-control" name="kodeCaptcha" value="" maxlength="8" placeholder="Masukkan Captcha">

                <div>
                    <div style="width: 48%; float: right;">
                        <a href="../index.php"><input type="button" value="Cancel"/></a>
                    </div>
                    <div style="width: 32%; margin-left: 20%;">
                        <input type="submit" value="Sign In">
                    </div>
                </div>

                <?php if(isset($_SESSION['error_login_message'])){ ?>
                    <div class="warning" role="alert">
                        <?= $_SESSION['error_login_message'] ?>
                    </div>
                <?php unset($_SESSION['error_login_message']); } ?>
                
                <div class="footer">
                    <div style="width: 50%; float: left">
                        <h4>Doesn't Have An Account Yet?</h4>
                    </div>
                    <div style="width: 45%; float: right; margin-top: 6%;">
                        <a href="./registrationUser.php"><input type="button" value="Register"></a>
                    </div>
                </div>
            </form>  
        </div>
    </body>
</html>