<?php include '../connect_db.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Login Page</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://www.google.com/recaptcha/api.js"></script>
    
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
            <div class="modal-dialog">              
                <div class="modal-content">
                    <div class="modal-header"> 
                        <div style="float: left;">
                            <h4>User Sign In</h4>
                        </div>
                        <div style="float: right;">
                            <a type="button" class="btn btn-info" href="./loginAdmin.php">Admin</a>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form id="form-login-submit" class="form-login" method="POST" action="./loginUserCek.php"> <!-- action="<?= $base_url ?>/loginUserCek.php" -->
                            <div class="mb-3">
                                <b><label for="inputEmail" class="form-label">Email</label></b>
                                    <input type="email" class="form-control" name="email" placeholder="Masukkan Email">
                                <b><label style="margin-top: 3%" for="inputPassword" class="form-label">Password</label></b>
                                    <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
                                <div class="g-recaptcha" data-sitekey="6LeMIlEcAAAAAMD4rVJUQ8pWx5qT9FPyRSDVO5aV"
                                     style="margin-bottom: 10px; margin-top: 3%"></div>
                                <?php if(isset($_SESSION['error_login_message'])){ ?>
                                    <div class="alert alert-danger py-1" style="margin-top: 3%;" role="alert">
                                        <?= $_SESSION['error_login_message'] ?>
                                    </div>
                                    <?php unset($_SESSION['error_login_message']); } ?>
                                <button style="margin-top: 3%" type="submit" class="btn btn-primary">Sign In</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <h5>Doesn't Have An Account Yet?</h5>
                        <a type="button" class="btn btn-primary" href="./registrationUser.php">Register</a>
                    </div>
                </div>
            </div>               
        </div>     
</body>
</html>
