<?php include '../connect_db.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User Registration Page</title>

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
            <div class="modal-dialog">              
                <div class="modal-content">
                    <div class="modal-header"> 
                        <div style="float: left;">
                            <h2><b>User Registration</b></h2>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form id="form-login-submit" class="form-login" method="POST" action="./addNewUser.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="firstName" placeholder="Masukkan First Name">
                                <label style="margin-top: 3%" for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="lastName" placeholder="Masukkan Last Name">
                                <label style="margin-top: 3%" for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Masukkan Username">
                                <label style="margin-top: 3%" for="inputEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Masukkan Email">
                                <label style="margin-top: 3%" for="inputPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="pass" placeholder="Masukkan Password">
                                <label style="margin-top: 3%" for="tanggalLahrir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggalLahir">
                                <label style="margin-top: 3%;" for = "jenisKelamin" class="form-label">Jenis Kelamin :</label><br>
                                    <input type="text" class="form-control" name="jenisKelamin" placeholder="Male or Female">
                                <input style="margin-top: 4%;" type="file" name="gambar" accept="image/png, image/jpeg">

                                <input style="margin-top: 4%" type="submit" name="register" class="btn btn-primary" value="Register">
                                <a style="margin-top: 4%; margin-left: 3%;" type="button" class="btn btn-outline-primary" href="../index.php">Cancel</a>

                                <?php if(isset($_SESSION['error_login_message'])){ ?>
                                    <div class="alert alert-danger py-1" style="margin-top: 3%;" role="alert">
                                        <?= $_SESSION['error_login_message'] ?>
                                    </div>
                                <?php unset($_SESSION['error_login_message']); } ?>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <h5>Already Have An Account?</h5>
                        <a type="button" class="btn btn-primary" href="./loginUser.php">Login</a>
                    </div>
                </div>
            </div>               
        </div>     
    </body>
</html>