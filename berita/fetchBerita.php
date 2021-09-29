<?php
  include '../connect_db.php';

  // $idBerita = POST['idBerita'];
  $queryBerita = $db->query("SELECT * FROM berita WHERE idBerita = ?");
  $queryBerita->execute($idBerita);

