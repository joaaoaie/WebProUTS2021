<?php include '../connect_db.php' ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Login Page</title>

        <link rel="stylesheet" type="text/css" href="styleLogin.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    </head>
    <body>
        <div class="scroll col-m-12 col-12">
            <div class="container">
                <div class="wrapper">
                    <div class="title"><span>User Sign in</span></div>
                    <form method="POST" action="./loginUserCek.php">
                        <div class="row">
                            <i class="fas fa-user"></i>
                            <input type="text" class="form-control" name="emailUname" placeholder="Masukkan Email/Username">
                        </div>
                        <div class="row">
                            <i class="fas fa-lock"></i>
                            <input type="password" class="form-control" name="pass" placeholder="Masukkan Password">
                        </div>

                        <div class="captchaImage">
                            <?php 
                                $var = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                                for($i=0;$i<8;$i++){
                                    $pass[$i] = $var[rand(0,strlen($var)-1)];
                                }
                                $code = implode($pass); //Untuk mengubah array menjadi string
                                echo $code;
                            ?>
                        </div>

                        <div class="row">
                            <input type="hidden" class="form-control" name="captcha" value="<?=$code?>">
                            <input type="text" class="form-control" name="kodeCaptcha" value="" maxlength="8" placeholder="Masukkan Captcha">
                        </div>
                        
                        <?php if(isset($_SESSION['error_login_message'])){ ?>
                            <div class="warning" role="alert">
                                <?= $_SESSION['error_login_message'] ?>
                            </div>
                        <?php unset($_SESSION['error_login_message']); } ?>

                        <!-- <div class="pass"><a href="#">Forgot password?</a></div> -->
                        <div class="row button">
                            <input type="submit" value="Sign In">
                        </div>
                        <div class="row button2">
                            <input type="button" value="Cancel" href="../index.php">
                        </div>
                        
                        <div class="signup-link">Doesn't Have An Account?  <a href="./registrationUser.php">Register</a></div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>