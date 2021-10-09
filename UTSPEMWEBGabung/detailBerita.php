<?php
  include './connect_db.php';
  
  $judul = $_GET['judul'];
  $queryBerita = $db->prepare("SELECT * FROM berita WHERE judul = :judul");
  $queryBerita->bindParam(":judul", $judul);
  $queryBerita->execute();
  $berita = $queryBerita->fetch();
  
  $queryBerita2 = $db->prepare("
    SELECT idBerita, idKomentar, username, tanggal, isi, suka, foto
    FROM (
      SELECT
        idBerita, idKomentar, username, tanggal, isi, suka,
        (SELECT foto FROM user WHERE username = k.username) foto
      FROM komentar k
      WHERE idBerita = :idBerita
    ) as a;
  ");
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

  <h1 style="width: 80%; margin: auto; text-align: center"><?= $berita['judul'] ?></h1>
  <div id="infoBerita" style="width: 60%; margin: auto; margin-top: 2%">
    <table>
      <tr><td>Penulis: <?= $berita['penulis'] ?></td></tr>
      <tr><td>Tanggal publikasi: <?= $berita['tanggal'] ?></td></tr>
      <tr><td>Kategori: <?= $berita['kategori'] ?></td></tr>
    </table>
  </div>
  <div class="card container" style="width: 60%; margin-top: 1%">
    <?= $berita['konten'] ?>
  </div>
  <div class="container" style="width: 90%">
    <h3>Komentar</h3>
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
    <br>
    <div>
      <?php foreach($comments as $comment) { ?>
        <div style="display: inline-block">
          <?php if(isset($comment['foto'])){?>
            <img
              src="./image/profile/<?= $comment['foto']; ?>"
              class="rounded-circle"
              style="height: 40px; width: 40px;"
              loading="lazy"
            />
          <?php } else { ?>
            <img
              src="./image/profile/placeholder.png"
              class="rounded-circle"
              style="height: 40px; width: 40px;"
              loading="lazy"
            />
          <?php } ?>
        </div>
        <div style="display: inline-block">
          <form method="POST" action="act/tambahLike.php">
            <h5 id=<?=$comment['idKomentar']?> ><?= $comment['username'] ?> <span style="font-size:12px"><?= $comment['tanggal'] ?></span></h5>
            <p><?=$comment['isi']?></p>
            <input type="hidden" name="idBerita" value="<?= $comment['idBerita'] ?>">
            <input type="hidden" name="judul" value="<?= $judul ?>">
            <input type="hidden" name="idKomentar" value="<?= $comment['idKomentar'] ?>">
            <?php if(!isset($_SESSION['id_user'])) {?>
              <button type="submit" disabled class="btn btn-primary"><?= $comment['suka'] ?> Like (Sign In to Like)</button>
            <?php } else { ?>
              <button type="submit" class="btn btn-primary"><?= $comment['suka'] ?> Like</button>
            <?php } ?>
          </form>
        </div>
        <br><br>
      <?php } ?>
    </div>
  </div>
</body>
</html>
