<?php
    include '../connect_db.php';
    $user = $_GET['user'];
    $id = $_GET['id'];

    $queryberita = $db->prepare("DELETE FROM berita WHERE idBerita=?");
    $queryberita->execute([$id]);

    header("location: $base_url/adminView/CRUD.php?id=$user");
?>