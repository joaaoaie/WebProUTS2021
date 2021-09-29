<?php
  include '../connect_db.php';

  // ambil dari sini, ini buat yang di home -> <a href="../berita/index.php?idBerita='. $berita['idBerita'] .'">...</a>
  $idBerita = $_GET['idBerita'];
  $queryBerita = $db->query("SELECT * FROM berita WHERE idBerita = :idBerita");
  $queryBerita->bindParam(":idBerita", $idBerita);
  $queryBerita->execute();

  $berita = $queryBerita->fetch();
  header("location: $base_url/berita/index.php");