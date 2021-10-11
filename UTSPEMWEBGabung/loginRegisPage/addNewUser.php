<?php
    include '../connect_db.php';

    // Mengambil data dari database untuk dilakukan pengecekan di bawah
    $query = $db->prepare("SELECT * FROM user");
    $query->execute();
    $a = $query->fetchall();

    // Mengambil nilai dari submit form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    if($_FILES['gambar']['name'] != NULL)
        $gambar =  time() . '_' . $_FILES['gambar']['name'];
    else
        $gambar = NULL;

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $tanggalLahir = $_POST['tanggalLahir'];
    $jenisKelamin = $_POST['jenisKelamin'];
    $cek = true;
    $salt = "user";

    if($username != "" && $email != "" && $pass != "" && $firstName != "" && $tanggalLahir != ""){
        if($lastName == "")
            $lastName = NULL;

        $encrypted_password_salt = md5($pass . $salt);
        foreach($a as $userAcc){
            if($userAcc['username'] == $username || $userAcc['email'] == $email){
                // if($userAcc['username'] == $username && $userAcc['email'] == $email)
                //     $_SESSION['error_login_message'] = "Username and Email already taken and used";
                // else if($userAcc['username'] == $username)
                //     $_SESSION['error_login_message'] = "Username already taken";
                // else
                //     $_SESSION['error_login_message'] = "Email already used";

                $cek = false;
                header("location: $base_url/loginRegisPage/signInUp.php");
                break;
            }
        }
        if($cek){
            $queryInsert = $db->prepare("INSERT into user(username,email,pass,salt,foto,firstName,lastName,tanggalLahir,jenisKelamin) 
                                         values(:username,:email,:pass,:salt,:gambar,:firstName,:lastName,:tanggalLahir,:jenisKelamin)");

            $queryInsert->bindParam(':username', $username);
            $queryInsert->bindParam(':email', $email);
            $queryInsert->bindParam(':pass', $encrypted_password_salt); //password and salt included
            $queryInsert->bindParam(':salt', $salt);
            $queryInsert->bindParam(':gambar', $gambar);
            $queryInsert->bindParam(':firstName', $firstName);
            $queryInsert->bindParam(':lastName', $lastName);
            $queryInsert->bindParam(':tanggalLahir', $tanggalLahir);
            $queryInsert->bindParam(':jenisKelamin', $jenisKelamin);

            $queryInsert->execute();

            $target = '../image/profile/' . $gambar;
            move_uploaded_file($_FILES['gambar']['tmp_name'], $target);

            header("location: $base_url/loginRegisPage/signInUp.php"); //User diminta untuk login setelah melakukan registrasi
        }
    }
    else{
        // $_SESSION['error_login_message'] = "Fill all the required fields";
        header("location: $base_url/loginRegisPage/signInUp.php");
    }
?>
