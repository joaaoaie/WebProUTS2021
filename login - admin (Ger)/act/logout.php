<?php
    include '../connectdb.php';
    
    session_start();

    if(isset($_SESSION)){
        session_destroy();
    }

    header("Location: $base_url/login.php");
?>