<?php
  include '../../connect_db.php';
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
  else if ($_FILES['gambar']['name'] == NULL)
      $gambar =  NULL;
  
  $queryInsert = $db->prepare("INSERT INTO berita(idBerita,judul,kategori,gambar, penulis,tanggal,konten)
              VALUES (?,?,?,?,?,?,?)");

  $success = $queryInsert->execute([$id, $judul, $kategori, $gambar, $penulis, $tanggal, $konten]);

  if ($success) {
    header("location: $base_url/adminView/crud.php");
  }
?>
