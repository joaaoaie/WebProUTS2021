<?php
    include '../connect_db.php';

    if(!isset($_SESSION)){ 
        header("location: $base_url/loginRegisPage/loginUser.php");
    };

    $emailUname = $_POST['emailUname'];
    $isi = $_POST['isi'];

    $queryCheck = $db->prepare("SELECT * FROM user WHERE (email= :email OR username= :username)");
    $queryCheck->bindParam(":email", $emailUname);
    $queryCheck->bindParam(":username", $emailUname);
    $queryCheck->execute();

    $inserQuery = $db->prepare("INSERT INTO komentar VALUES");