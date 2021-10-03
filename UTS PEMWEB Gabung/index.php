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
    <!-- <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script> -->
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    
</head>

<!-- Parameter GET buat category -->
<?php error_reporting(0); $kategori =  $_GET['kategori']; ?>

<body>
  <?php include_once './header.php';?>
</body>

<!-- Gambar di HOME -->
<body class="col-12 col-m-12">

  <div id="cf" style="flex-direction: column;justify-content: center;align-items: center;display: flex;">
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

<body class="col-12 col-m-12">
  <!-- Sorting category -->
  <div class="sorting col-12 col-m-12" style="background-color: lightgray;"> 
    <a href="./index.php" style="font-size: xx-large;color: red;display: inline-block;padding: 20px;">All</a>
    <a href="./index.php?kategori=Politik" class="category" style="font-size: xx-large;color: red;display: inline-block;padding: 20px;">Politics</a>
    <a href="./index.php?kategori=Food" class="category" style="font-size: xx-large;color: red;display: inline-block;padding: 20px;">Food</a>
    <a href="./index.php?kategori=Sports" class="category" style="font-size: xx-large;color: red;display: inline-block;padding: 20px;">Sports</a>
  </div>

  <!-- Buat nampilin berita -->
    <div id="berita" style="margin: auto;flex-direction: column; justify-content: center; align-items: center; display: flex;">
      <?php if($kategori != null) { 
          foreach($berita as $news) { 
            if($kategori == $news['kategori']) {?>
            <div id=<?=$news['idBerita']?> class="container">
            <img style="width: 100%; margin-top: 10px; margin-right: auto;height: auto;" src='./image/News2.jpg'/>
            <a href="./detailBerita.php?judul=<?=$news['judul']?>" style="font-size: xx-large;"><?=$news['judul']?></a><br>
            <h4 style="display: inline-block; padding-right: 30px;">Kategori : <b><?=$news['kategori']?></b></h4>
            <h4 style="display: inline-block;">Tanggal : <b><?=$news['tanggal']?></b></h4>
          </div>
        <?php }}
        } else { 
            foreach($berita as $news) { ?>
              <div id=<?=$news['idBerita']?> class="container">
                <img style="width: 100%; margin-top: 10px; margin-right: auto; height: auto;" src='./image/News2.jpg'/>
                <a href="./detailBerita.php?judul=<?=$news['judul']?>" style="font-size: xx-large;"><?=$news['judul']?></a><br>
                <h4 style="display: inline-block; padding-right: 30px;">Kategori : <b><?=$news['kategori']?></b></h4>
                <h4 style="display: inline-block;">Tanggal : <b><?=$news['tanggal']?></b></h4>
              </div>
          <?php }
            } ?>
    </div>


</body>



</html>

