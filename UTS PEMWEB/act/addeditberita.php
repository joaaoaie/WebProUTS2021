<?php

    include '../connectdb.php';
    
    $id = $_POST['id'];
    $judul = $_POST['Judul'];
    $kategori = $_POST['Kategori'];
    $penulis = $_POST['Penulis'];
    $konten = $_POST['Konten'];
    $tanggal = $_POST['Tanggal'];
    $gambar = $_POST['gambarBerita'];
    $queryberita = $db->prepare('UPDATE berita SET judul=?, kategori=?, penulis=?, konten=?, tanggal=?, gambar=? WHERE idBerita=?');
    $queryberita->execute([$judul, $kategori, $penulis, $konten, $tanggal, $gambar, $id]);
    header("location: $base_url")
?>