<?php 
    include './connect_db.php';

    $query = $db->prepare("SELECT * FROM berita");
    $query->execute();
    $berita = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Portal Berita - IF330</title>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="main.css" type="text/css">
    <?php include './show.php'; ?>
</head>

<!-- Belom paham make ini -->
<?php //include './nav(blmslsi).php' ?>
<!-- <body>
  <div id="cf" class="col-12 col-m-12">
    <img class="top" src='./image/Economy.jpg'/>
    <img class="top" src='./image/Sports.jpg'/>
    <img class="top" src='./image/Politic.jpg'/>
    <img class="top" src='./image/News.jpg'/>
  </div>
</body> -->

<!-- Masih tes doang buat liat kluar apa enggak-->
<body onload="showAll()">
  <div class="sorting">
    <h4 onclick="showAll()">All</h4>
    <h4 onclick="showPolitik()">Politics</h4>
    <h4 onclick="showFood()">Food</h4>
  </div>
  <div id="berita"></div>
</body>

</html>

<!-- Gak pake -->
<!-- <?php
    foreach($berita as $news) { ?>
      <div id=<?=$news['idBerita']?> class="container">
        <h3><?=$news['judul']?></h3>
        <h4 style="display: inline-block; padding-right: 30px;">Kategori : <b><?=$news['kategori']?></b></h4>
        <h4 style="display: inline-block;">Tanggal : <b><?=$news['tanggal']?></b></h4>
      </div>
  <?php }?> -->