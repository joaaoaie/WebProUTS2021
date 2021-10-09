<?php
    include '../connect_db.php';
    $id = $_GET['id'];

    $query = $db->prepare("SELECT * FROM berita WHERE idBerita=?");
    $query->execute([$id]);  
    $user = $query->fetch();
    unlink('../image/news/' . $user['gambar']);

    $queryberita = $db->prepare("DELETE FROM berita WHERE idBerita=?");
    $queryberita->execute([$id]);

    header("location: $base_url/adminView/CRUD.php");
?>