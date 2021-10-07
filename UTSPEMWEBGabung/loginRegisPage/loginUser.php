<?php include '../connect_db.php' ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Login Page</title>

        <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    </head>
    <body style="background: linear-gradient(to bottom right,#2980b9, lightblue); background-attachment: fixed;">
        <div class="container-fluid mx-auto w-75">
            <div class="card mx-auto w-50 my-5" style="border-radius: 10px;">
                <div class="wrapper">
                    <h3 class="title">User Sign in</h3>
                    <div class="card-body">        
                        <form method="POST" action="./loginUserCek.php">
                            <label for="inputEmailUname" class="form-label">Email/ Username :</label>
                            <div class="row">
                                <i class="fas fa-user"></i>
                                <input type="text" class="form-control" name="emailUname" placeholder="Masukkan Email/Username">
                            </div>
                            <label style="margin-top: 3%;" for="inputPassword" class="form-label">Password :</label>
                            <div class="row">
                                <i class="fas fa-lock"></i>
                                <input type="password" class="form-control" name="pass" placeholder="Masukkan Password">                            
                            </div>

                            <div class="card-header captchaText">
                                <?php 
                                    $var = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                                    for($i=0;$i<8;$i++){
                                        $pass[$i] = $var[rand(0,strlen($var)-1)];
                                    }
                                    $code = implode($pass); //Untuk mengubah array menjadi string
                                    echo $code;
                                ?>
                            </div>
                            
                            <input type="hidden" class="form-control" name="captcha" value="<?=$code?>">
                            <label for="inputCaptcha" class="form-label">Captcha :</label>
                            <div class="row">
                                <i class="fas fa-refresh"></i>
                                <input type="text" class="form-control" name="kodeCaptcha" value="" maxlength="8" placeholder="Masukkan Captcha">
                            </div>
                            
                            <?php if(isset($_SESSION['error_login_message'])){ ?>
                                <div class="warning" role="alert">
                                    <?= $_SESSION['error_login_message'] ?>
                                </div>
                            <?php unset($_SESSION['error_login_message']); } ?>

                            <div class="row button">
                                <input type="submit" value="Sign In">
                            </div>
                            <div class="row button2">
                                <a href="../index.php" style="padding-right: 0%; padding-left: 0%">
                                    <input type="button" value="Cancel">
                                </a>
                            </div>

                            <h3 class="signup-link">Doesn't Have An Account?  <a href="./registrationUser.php">Register</a></h3>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>