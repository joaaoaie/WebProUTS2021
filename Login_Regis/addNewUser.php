<?php
    include './connect_db.php';

    // Mengambil data dari database untuk dilakukan pengecekan di bawah
    $query = $db->prepare("SELECT * FROM user");
    $query->execute();
    $a = $query->fetchall();

    // Mengambil nilai dari submit form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $tanggalLahir = $_POST['tanggalLahir'];
    $jenisKelamin = $_POST['jenisKelamin'];
    $cek = true;
    $salt = "user";

    if($username != "" && $email != "" && $pass != "" && $firstName != "" && $tanggalLahir != "" && $jenisKelamin != ""){
        if($lastName == "")
            $lastName = NULL;
        
        $encrypted_password_salt = md5($pass . $salt);
        foreach($a as $userAcc){
            if($userAcc['username'] == $username){ //username
                $_SESSION['error_login_message'] = "Username already exist";
                $cek = false;
                header("location: $base_url/registrationUser.php"); //masukkin ulang
                break;
            }
        }
        if($cek){
            $queryInsert = $db->prepare("INSERT into user(username,email,pass,salt,firstName,lastName,tanggalLahir,jenisKelamin) 
                                         values(:username,:email,:pass,:salt,:firstName,:lastName,:tanggalLahir,:jenisKelamin)");

            $queryInsert->bindParam(':username', $username);
            $queryInsert->bindParam(':email', $email);
            $queryInsert->bindParam(':pass', $encrypted_password_salt); //udh include password sama salt
            $queryInsert->bindParam(':salt', $salt);
            $queryInsert->bindParam(':firstName', $firstName);
            $queryInsert->bindParam(':lastName', $lastName);
            $queryInsert->bindParam(':tanggalLahir', $tanggalLahir);
            $queryInsert->bindParam(':jenisKelamin', $jenisKelamin);

            $queryInsert->execute();
            header("location: $base_url/index.php"); //berhasil
        }
    }
    else{
        $_SESSION['error_login_message'] = "Fill all required fields";
        header("location: $base_url/registrationUser.php");
    }
?>  

