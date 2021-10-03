<?php
    include './connect_db.php';

    if(!isset($_SESSION)){ 
        header("location: $base_url/loginRegisPage/loginUser.php");
    };

    $email = $_POST['email'];
    $isi = $_POST['isi'];