<?php
  // include './fetchBerita.php'
  include './connect_db.php';
  
  $judul = $_GET['judul'];
  $queryBerita = $db->prepare("SELECT * FROM berita WHERE judul = :judul");
  $queryBerita->bindParam(":judul", $judul);
  $queryBerita->execute();

  $berita = $queryBerita->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css" type="text/css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
  <title><?= $berita['judul'] ?></title>
</head>
<body>
  <?php include_once './header.php';?>
  <h1><?= $berita['judul'] ?></h1>
  <div id="infoBerita">
    <table>
      <tr><td>Penulis: <?= $berita['penulis'] ?></td></tr>
      <tr><td>Tanggal publikasi: <?= $berita['tanggal'] ?></td></tr>
      <tr><td>Kategori: <?= $berita['kategori'] ?></td></tr>
    </table>
  </div>
  <div class="container">
    <?= $berita['konten'] ?>
  </div>
  <div class="container">
    <h1>Komentar</h1>
    <div>
      <form id="kirimKomentar" class="form-horizontal" method="POST" action="./act/tambahKomentar.php">
        <textarea id="isi" rows="4" cols="50"></textarea>
        <button type="submit" class="btn btn-primary">Kirim</button>
      </form>
    </div>
  </div>
</body>
</html>