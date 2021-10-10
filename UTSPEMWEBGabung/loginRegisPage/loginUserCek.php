<?php
    include '../connect_db.php';

    $emailUname = $_POST['emailUname'];
    $password = $_POST['pass'];
    $captcha = $_POST['captcha'];
    $capt = $_POST['kodeCaptcha'];
    $cek = true;

    $queryCheck = $db->prepare("SELECT * FROM user WHERE (email= :email OR username= :username)");
    $queryCheck->bindParam(":email", $emailUname);
    $queryCheck->bindParam(":username", $emailUname);
    $queryCheck->execute();  
    $user = $queryCheck->fetch();

    if($emailUname != "" && $password != "" && $capt != "")
    {
        for($a=0;$a<8;$a++)
        {
            if($captcha[$a] !== $capt[$a]){
                $cek = false;
                break;
            }
        }
        if($cek) //Jika captcha yang dimasukkan benar
        {
            //Pengecekan login
            if($queryCheck->rowCount() > 0){
                $encrypted_password_salt = md5($password . $user['salt']); 

                if($user['pass'] == $encrypted_password_salt){
                    $_SESSION['id_user'] = $emailUname;

                    if($user['salt'] == "admin")
                        $_SESSION['admin'] = true;
                    else
                        $_SESSION['admin'] = false;

                    header("location: $base_url");
                }
                else{
                    $_SESSION['error_login_message'] = 'Incorrect Password';
                    header("location: $base_url/loginRegisPage/loginRegister.php");
                }
            }
            else{
                $_SESSION['error_login_message'] = 'Incorrect email or username';
                header("location: $base_url/loginRegisPage/loginRegister.php");  
            }
        }
        else{
            $_SESSION['error_login_message'] = 'Incorrect Captcha';
            header("location: $base_url/loginRegisPage/loginRegister.php");  
        }
    }
    else{
        $_SESSION['error_login_message'] = 'Fill all the required fields';
        header("location: $base_url/loginRegisPage/loginRegister.php");  
    }
?>
