<?php
    include '../connect_db.php';

    $emailUname = $_POST['emailUname'];
    $password = $_POST['pass'];

    //Jika user menggunakan email untuk login
    $queryEmailCheck = $db->prepare("SELECT * FROM user WHERE email= :email");
    $queryEmailCheck->bindParam(":email", $emailUname);
    $queryEmailCheck->execute();  
    $user = $queryEmailCheck->fetch();

    //Jika user menggunakan username untuk login
    $queryUnameCheck = $db->prepare("SELECT * FROM user WHERE username= :username");
    $queryUnameCheck->bindParam(":username", $emailUname);
    $queryUnameCheck->execute();
    $user2 = $queryUnameCheck->fetch();

    //Untuk login dengan email
    if($queryEmailCheck->rowCount() > 0){
        $encrypted_password_salt = md5($password . $user['salt']); 

        if($user['pass'] === $encrypted_password_salt){
            $_SESSION['id_user'] = $emailUname;

            if($user['salt'] == "admin")
                $_SESSION['admin'] = true;
            else
                $_SESSION['admin'] = false;

            // header("location: $base_url/loginRegisPage/loginRegister.php"); 
            header("location: $base_url/loginRegisPage/loginRegister.php?id={$emailUname}");
        }
        else{
            $SESSION['error_login_message'] = 'Password yang dimasukkan salah';
            header("location: $base_url/loginRegisPage/loginRegister.php");
        }
    }
    else if($queryUnameCheck->rowCount() > 0){ //Login dengan username
        $encrypted_password_salt = md5($password . $user2['salt']); 

        if($user2['pass'] === $encrypted_password_salt){
            $_SESSION['id_user'] = $emailUname;

            if($user2['salt'] == "admin")
                $_SESSION['admin'] = true;
            else
                $_SESSION['admin'] = false;

            // header("location: $base_url/loginRegisPage/loginRegister.php"); 
            header("location: $base_url/loginRegisPage/loginRegister.php?id={$emailUname}");
        }
        else{
            $SESSION['error_login_message'] = 'Password yang dimasukkan salah';
            header("location: $base_url/loginRegisPage/loginRegister.php");
        }
    }
    else{
        $_SESSION['error_login_message'] = 'Email atau username yang dimasukkan salah';
        header("location: $base_url/loginRegisPage/loginRegister.php");  
    }
?>