<?php
    include './connectdb.php';

    $queryuser = $db->prepare("SELECT * from user");
    $queryuser->execute();
    $user = $queryuser->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challenge</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css" media="screen" title="no title" charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sign in</h4>
            </div>
            <div class="modal-body">
                <form id="login-submit"  method="POST" action="<?= $base_url?>act/login.php" onsubmit="return Submission">
                    <div class="form-group">
                        <label for="email" name="email">Email</label><br>
                        <input type="email" class="col-12" placeholder="Masukkan Email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="pass" name="pass">Password</label><br>
                        <input type="password" class="col-12" placeholder="Masukkan Password" name="pass">
                    </div>
                    <?php if(isset($_SESSION['error_login_message'])) { ?>
                        <div class="alert alert-danger py-1" role="alert">
                            <?= $_SESSION['error_login_message'] ?>
                        </div>
                    <?php
                        unset($_SESSION['error_login_message']);
                    } ?>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        
        </div>
    </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#myModal').modal({
            keyboard: false,
            show: true,
            backdrop: 'static'
            });
        });
        $(document).ready(function() {
            $('#example').DataTable({
                "order": [
                [0, 'asc']
                ]
            });
        });
    </script>

    
</body>
</html>