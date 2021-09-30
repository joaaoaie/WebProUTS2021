<?php

include '../connectdb.php';

$id = $_POST['id'];
$judul = $_POST['Judul'];
$kategori = $_POST['Kategori'];
$penulis = $_POST['Penulis'];
$konten = $_POST['Konten'];
$tanggal = $_POST['Tanggal'];
$gambar = $_POST['gambarBerita'];

$queryInsert = $db->prepare("INSERT INTO berita(idBerita,judul,kategori,gambar, penulis,tanggal,konten)
            VALUES (?,?,?,?,?,?,?)");

$success = $queryInsert->execute([$id, $judul, $kategori, $gambar, $penulis, $tanggal, $konten]);




if ($success) {
  header("location: $base_url");
}

?>
