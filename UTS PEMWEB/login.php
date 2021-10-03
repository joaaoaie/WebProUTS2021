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
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>

    <div class="container">
        <form class="box" method="POST" action="<?= $base_url?>act/login.php" onsubmit="return Submission">
            <h1>Login</h1>
            <input type="email" class="col-12" placeholder="Email" name="email" autocomplete="off">
            <input type="password" class="col-12" placeholder="Password" name="pass">
            <?php if(isset($_SESSION['error_login_message'])) { ?>
                <div class="warning" role="alert">
                    <?= $_SESSION['error_login_message'] ?>
                </div>
            <?php
                unset($_SESSION['error_login_message']);
            } ?>
            <input type="submit" value="Login"></input>
        </form>  
    </div>

    
</body>
</html>