<?php
    include './connect_db.php';
    unset($_SESSION['id_user']);

    header("location: $base_url");
?>
