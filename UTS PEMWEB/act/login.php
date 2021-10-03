<?php
    include '../connectdb.php';

    $email = $_POST['email'];
    $password = $_POST['pass'];

    $queryEmailCheck = $db->prepare("SELECT * FROM user where email=:email");
    $queryEmailCheck->bindParam(":email", $email);
    $queryEmailCheck->execute();
    
    $user = $queryEmailCheck->fetch();

    if ($queryEmailCheck->rowCount() > 0) {
        $pass_salt = $password . $user["salt"];
        $hash = md5($pass_salt);

        if ($user['pass'] === $hash) {
            $_SESSION['user'] = $user['email'];

            header("location: $base_url/index.php");
        }
        else{
            $_SESSION['error_login_message'] = 'Email atau password yang dimasukkan salah';

            header("location: $base_url/login.php");
        }
    }
    else{
        $_SESSION['error_login_message'] = 'Email atau password yang dimasukkan salah';
        header("location: $base_url/login.php");
    }

