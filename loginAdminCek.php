<!-- <?php
    include './connect_db.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $queryEmailCheck = $db->prepare("SELECT * FROM user WHERE email= :email");
    $queryEmailCheck->bindParam(":email", $email);
    $queryEmailCheck->execute();
    
    $user = $queryEmailCheck->fetch();
    if($queryEmailCheck->rowCount() > 0){ 
        $encrypted_password_salt = md5($password.$user['salt']);
        if($user['pass'] === $encrypted_password_salt){ 
            $_SESSION['id_user'] = $email;
            header("location: ./loginAdmin.php");
        } 
        else{ 
            $_SESSION['error_login_message'] = 'Email atau password salah';
            header("location: ./loginAdmin.php");
        }
    } 
    else{ 
        $_SESSION['error_login_message'] = 'Email atau password salah';
        header("location: ./loginAdmin.php");
      }
?> -->