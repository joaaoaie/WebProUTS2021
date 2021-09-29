<?php
    include './connect_db.php';

    $email = $_POST['email'];
    $password = $_POST['pass'];

    $queryEmailCheck = $db->prepare("SELECT * FROM user WHERE email= :email");
    $queryEmailCheck->bindParam(":email", $email);
    $queryEmailCheck->execute();
    
    $user = $queryEmailCheck->fetch();
    $encrypted_password_salt = md5($password . $user['salt']); 
    
    if($user['pass'] === $encrypted_password_salt){
        $_SESSION['id_user'] = $username;
        if($user['salt'] == "admin")
            $_SESSION['admin'] = true;
        else
            $_SESSION['admin'] = false;
    }
    else
        $SESSION['error_login_message'] = 'Email atau password salah';
    header("location: $base_url/index.php");  
?>