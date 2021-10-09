<?php
    include '../connect_db.php';
    $id = $_GET['id'];

    $queryberita = $db->prepare("DELETE FROM berita WHERE idBerita=?");
    $queryberita->execute([$id]);

    header("location: $base_url/adminView/CRUD.php");
?>