<?php
    include '../../connect_db.php';
    $user = $_GET['user'];
    $id = $_POST['id'];
    $judul = $_POST['Judul'];
    $kategori = $_POST['Kategori'];
    $penulis = $_POST['Penulis'];
    $konten = $_POST['Konten'];
    $tanggal = $_POST['Tanggal'];

    $queryberita = $db->prepare('UPDATE berita SET judul=?, kategori=?, penulis=?, konten=?, tanggal=? WHERE idBerita=?');
    $queryberita->execute([$judul, $kategori, $penulis, $konten, $tanggal, $id]);
    header("location: $base_url/adminView/crud.php");
?>