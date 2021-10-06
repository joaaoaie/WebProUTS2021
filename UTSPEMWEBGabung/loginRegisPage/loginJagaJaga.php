<?php include '../connect_db.php' ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Login Page</title>

        <link rel="stylesheet" type="text/css" href="styleLogin.css">
        <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <script type="text/javascript"> 
            $(document).ready(function(){
                $('#myModal').modal({
                    keyboard: false,
                    show: true,
                    backdrop: 'static'
                });
            });
        </script>
    </head>
    <body>
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog color">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2><b>User Sign In<b></h2>
                    </div>
                    <div class="modal-body">
                        <form class="form-login" method="POST" action="./loginUserCek.php">
                            <label style="margin-top: 3%;" for="inputEmailUname" class="form-label">Email/Username :</label>
                                <input type="text" class="form-control" name="emailUname" placeholder="Masukkan Email/Username">
                            <label style="margin-top: 3%;" for="inputPassword" class="form-label">Password :</label>
                                <input type="password" class="form-control" name="pass" placeholder="Masukkan Password">
                            
                            <!-- captcha -->
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
                            
                            <input type="hidden" class="form-control" name="captcha" value="<?=$code?>">
                            <label style="margin-top: 3%;" for="inputCaptcha" class="form-label">Masukkan Captcha :</label>
                                <input type="text" class="form-control" name="kodeCaptcha" value="" maxlength="8" placeholder="Masukkan Captcha">

                            <input style="margin-top: 4%; margin-bottom: 3%;" type="submit" class="btn btn-primary" value="Sign In">
                            <a style="margin-top: 4%; margin-bottom: 3%;" type="button" class="btn btn-outline-primary" href="../index.php">Cancel</a>

                            <?php if(isset($_SESSION['error_login_message'])){ ?>
                                <div class="warning" role="alert">
                                    <?= $_SESSION['error_login_message'] ?>
                                </div>
                            <?php unset($_SESSION['error_login_message']); } ?>
                            
                            <div class="modal-footer">
                                <h5 style="margin-top: 0%;">Doesn't Have An Account Yet?</h5>
                                <a type="button" class="btn btn-primary" href="./registrationUser.php">Register</a>       
                            </div>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>