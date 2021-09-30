<?php
    include './connectdb.php';

    $id = $_GET['id'];

    $queryberita = $db->prepare("DELETE FROM berita WHERE idBerita=?");
    $queryberita->execute([$id]);

    header("location: $base_url");
?>