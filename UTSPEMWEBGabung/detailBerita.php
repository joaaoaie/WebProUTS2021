<?php
  include './connect_db.php';
  
  $judul = $_GET['judul'];
  $queryBerita = $db->prepare("SELECT * FROM berita WHERE judul = :judul");
  $queryBerita->bindParam(":judul", $judul);
  $queryBerita->execute();
  $berita = $queryBerita->fetch();
  
  $queryBerita2 = $db->prepare("SELECT * FROM komentar WHERE idBerita = :idBerita");
  $queryBerita2->bindParam(":idBerita", $berita['idBerita']);
  $queryBerita2->execute();
  $comments = $queryBerita2->fetchAll();

  $jumlah = 0;
  foreach ($comments as $comment) {$jumlah++;}
  $idCBaru = $jumlah+1;
  $idCBaru = sprintf("K%04d", $idCBaru);
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
  <header>
    <div style="z-index:100;">
      <?php include './header.php';?>
    <div>
  </header>

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
      <form id="kirimKomentar" class="form-horizontal" method="POST" action="act/tambahKomentar.php">
        <?php if(!isset($_SESSION['id_user'])) {?>
          <textarea disabled name="isi" rows="4" cols="50" placeholder="Please Sign In First"></textarea><br>
        <?php } else { ?>
          <textarea name="isi" rows="4" cols="50"></textarea><br>
          <input type="hidden" name="Username" value="<?= $_SESSION['id_user'] ?>">
          <input type="hidden" name="judul" value="<?= $judul ?>">
          <input type="hidden" name="idBerita" value="<?= $berita['idBerita'] ?>">
          <input type="hidden" name="idKomentar" value="<?= $idCBaru ?>">
          <button type="submit" class="btn btn-primary" style="margin-bottom: 1%;">Kirim</button>
        <?php } ?>
      </form>
    </div>
    <br>
    Jumlah komentar: <?= $jumlah ?>
    <div>
      <?php foreach($comments as $comment) {
        if(isset($_SESSION['id_user'])){
          if(isset($user['foto'])){?>
            <a>
              <img
                src="./image/profile/<?= $user['foto']; ?>"
                class="rounded-circle"
                style="height: 40px; width: 40px; display: inline-block"
                loading="lazy"
              />
            </a>
          <?php }
          if(!isset($user['foto'])){ ?>
            <a>
              <img
                src="./image/profile/placeholder.png"
                class="rounded-circle"
                style="height: 40px; width: 40px; display: inline-block"
                loading="lazy"
              />
            </a>
          <?php }
        } ?>
        <h5 id=<?=$comment['idKomentar']?> ><?= $comment['username'] ?> : <?=$comment['isi']?></h5>
      <?php } ?>
    </div>
  </div>
</body>
</html>