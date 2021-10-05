<?php
    include '../connect_db.php';

    if(!isset($_SESSION)){ 
        header("location: $base_url/loginRegisPage/loginUser.php");
    };

    $username = $_POST['username'];
    $isi = $_POST['isi'];