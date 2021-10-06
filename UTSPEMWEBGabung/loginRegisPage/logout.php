<?php
    include '../connect_db.php';

    unset($_SESSION['id_user']); 
    unset($_SESSION['admin']);
    header("location: $base_url/index.php");
?>