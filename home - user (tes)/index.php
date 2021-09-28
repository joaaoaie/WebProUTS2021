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
    <link rel="stylesheet" href="main.css" type="text/css"/>
    <style>
       @keyframes cfFadeInOut {
        0% {
        opacity:1;
        }
        45% {
        opacity:1;
        }
        55% {
        opacity:0;
        }
        100% {
        opacity:0;
        }
        }

        #cf {
          position:relative;
          width: 1200px;
          height: 600px;
          margin:0 auto;
        }

        #cf img {
          position:absolute;
          left:0;
          -webkit-transition: opacity 2s ease-in-out;
          -moz-transition: opacity 2s ease-in-out;
          -o-transition: opacity 2 ease-in-out;
          transition: opacity 2s ease-in-out;
          width: 100%;
          height: 100%;
        }

        #cf img.top {
        animation-name: cfFadeInOut;
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
        animation-duration: 5s;
        animation-direction: alternate;
        }
    </style>
</head>

<!-- Parameter GET buat category -->
<?php error_reporting(0); $kategori =  $_GET['kategori']; ?>

<!-- Gambar di HOME -->
<body>
  <div id="cf" class="col-12 col-m-12">
  <?php if($kategori == null) { ?>
    <img class="bottom" src='./image/News2.jpg'/>
    <img class="top" src='./image/News1.jpg'/>
  <?php } ?>
  <?php if($kategori == "Politik") { ?>
    <img class="bottom" src='./image/Politik2.jpg'/>
    <img class="top" src='./image/Politik1.jpg'/>
  <?php } ?>
  <?php if($kategori == "Sports") { ?>
    <img class="bottom" src='./image/Sports2.jpg'/>
    <img class="top" src='./image/Sports3.jpg'/>
  <?php } ?>
  <?php if($kategori == "Food") { ?>
    <img class="bottom" src='./image/Food2.jpg'/>
    <img class="top" src='./image/Food1.jpg'/>
  <?php } ?>
  </div>
</body>

<body>
  <!-- Sorting category -->
  <div class="sorting"> 
    <a href="./index.php" style="font-size: xx-large;color: red;display: inline-block;padding: 20px;">All</a>
    <a href="./index.php?kategori=Politik" class="category" style="font-size: xx-large;color: red;display: inline-block;padding: 20px;">Politics</a>
    <a href="./index.php?kategori=Food" class="category" style="font-size: xx-large;color: red;display: inline-block;padding: 20px;">Food</a>
    <a href="./index.php?kategori=Sports" class="category" style="font-size: xx-large;color: red;display: inline-block;padding: 20px;">Sports</a>
  </div>

  <!-- Buat nampilin berita -->
  <div id="berita" class="col-12 col-m-12">
    <?php if($kategori != null) { 
         foreach($berita as $news) { 
          if($kategori == $news['kategori']) {?>
          <div id=<?=$news['idBerita']?> class="container">
          <h3><?=$news['judul']?></h3>
          <h4 style="display: inline-block; padding-right: 30px;">Kategori : <b><?=$news['kategori']?></b></h4>
          <h4 style="display: inline-block;">Tanggal : <b><?=$news['tanggal']?></b></h4>
        </div>
      <?php }}
       } else { 
           foreach($berita as $news) { ?>
            <div id=<?=$news['idBerita']?> class="container">
              <h3><?=$news['judul']?></h3>
              <h4 style="display: inline-block; padding-right: 30px;">Kategori : <b><?=$news['kategori']?></b></h4>
              <h4 style="display: inline-block;">Tanggal : <b><?=$news['tanggal']?></b></h4>
            </div>
        <?php }
           } ?>
  </div>

</body>



</html>

