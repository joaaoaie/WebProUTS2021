<?php
    include '../../connect_db.php';
    $user = $_GET['user'];
    $id = $_POST['id'];
    $judul = $_POST['Judul'];
    $kategori = $_POST['Kategori'];
    $penulis = $_POST['Penulis'];
    $konten = $_POST['Konten'];
    $tanggal = $_POST['Tanggal'];
    if($_FILES['gambar']['name'] != NULL){
        $gambar =  time() . '_' . $_FILES['gambar']['name'];
        $target = '../../image/news/' . $gambar;
        move_uploaded_file($_FILES['gambar']['tmp_name'], $target);
    }
    $queryberita = $db->prepare('UPDATE berita SET judul=?, kategori=?, penulis=?, konten=?, tanggal=?, gambar=? WHERE idBerita=?');
    $queryberita->execute([$judul, $kategori, $penulis, $konten, $tanggal, $gambar, $id]);
    header("location: $base_url/adminView/crud.php?id=$user");
?>