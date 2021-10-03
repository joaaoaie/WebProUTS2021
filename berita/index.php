<?php
  // include './fetchBerita.php'
  include '../connect_db.php';
  
  $idBerita = $_GET['idBerita'];
  $queryBerita = $db->prepare("SELECT * FROM berita WHERE idBerita = :idBerita");
  $queryBerita->bindParam(":idBerita", $idBerita);
  $queryBerita->execute();

  $berita = $queryBerita->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/main.css">
  <title><?= $berita['judul'] ?></title>
</head>
<body>
  <h1><?= $berita['judul'] ?></h1>
  <div id="infoBerita">
    <table>
      <tr>
        <td>Penulis: <?= $berita['penulis'] ?></td>
        <td>Tanggal publikasi: <?= $berita['tanggal'] ?></td>
        <td>Kategori: <?= $berita['kategori'] ?></td>
      </tr>
    </table>
  </div>
  <div class="container">
    <?= $berita['konten'] ?>
  </div>
</body>
</html>