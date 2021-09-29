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
      [class*="col-"] {
          width: 100%;
      }

      @media only screen and (min-width: 600px) {
          /*for tablets (ukuran layar lebih besar dari 600px)*/
          .col-m-1 {width: 8.33%;}
          .col-m-2 {width: 16.66%;}
          .col-m-3 {width: 25%;}
          .col-m-4 {width: 33.33%;}
          .col-m-5 {width: 41.66%;}
          .col-m-6 {width: 50%;}
          .col-m-7 {width: 58.33%;}
          .col-m-8 {width: 66.66%;}
          .col-m-9 {width: 75%;}
          .col-m-10 {width: 83.33%;}
          .col-m-11 {width: 91.66%;}
          .col-m-12 {width: 100%;}
      }

      @media only screen and (min-width: 768px) {
          /*for desktop (ukuran layar lebih besar dari 768px)*/
          .col-1 {width: 8.33%;}
          .col-2 {width: 16.66%;}
          .col-3 {width: 25%;}
          .col-4 {width: 33.33%;}
          .col-5 {width: 41.66%;}
          .col-6 {width: 50%;}
          .col-7 {width: 58.33%;}
          .col-8 {width: 66.66%;}
          .col-9 {width: 75%;}
          .col-10 {width: 83.33%;}
          .col-11 {width: 91.66%;}
          .col-12 {width: 100%;}
      }

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

<body >
  <header style="margin: none; padding: none;">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
          <a class="navbar-brand" href="#">Tes</a>
				</div>
				<ul class="navbar-nav navbar-right nav" style="margin-right: 20px;">
          <?php error_reporting(0);if($_SESSION['id_user'] == null) { ?>
          <a href="./login/loginUser.php" class="btn btn-primary" style="margin-top: 6.5px;margin-left: 950px;">Login</a>
				<?php } else {?>
          <a href="" class="btn btn-primary" style="margin-top: 6.5px;margin-left: 950px;background-color: red;">Log out</a>
          <?php } ?>
      </ul>
			</div>
		</nav>
	</header>
</body>

<!-- Parameter GET buat category -->
<?php error_reporting(0); $kategori =  $_GET['kategori']; ?>

<!-- Gambar di HOME -->
<body class="col-12 col-m-12">
  <div id="cf" class="col-12 col-m-12">
    <?php if($kategori == null) { ?>
      <img class="bottom" style="max-width: 100%;" src='./image/News2.jpg'/>
      <img class="top" style="max-width: 100%;" src='./image/News1.jpg'/>
    <?php } ?>
    <?php if($kategori == "Politik") { ?>
      <img class="bottom" style="max-width: 100%;" src='./image/Politik2.jpg'/>
      <img class="top" style="max-width: 100%;" src='./image/Politik1.jpg'/>
    <?php } ?>
    <?php if($kategori == "Sports") { ?>
      <img class="bottom" style="max-width: 100%;" src='./image/Sports2.jpg'/>
      <img class="top" style="max-width: 100%;" src='./image/Sports3.jpg'/>
    <?php } ?>
    <?php if($kategori == "Food") { ?>
      <img class="bottom" style="max-width: 100%;" src='./image/Food2.jpg'/>
      <img class="top" style="max-width: 100%;" src='./image/Food1.jpg'/>
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
  <div class="col-12 col-m-12">
    <div class="col-3 col-m-3"></div>
    <div id="berita" class="col-9 col-m-9">
      <?php if($kategori != null) { 
          foreach($berita as $news) { 
            if($kategori == $news['kategori']) {?>
            <div id=<?=$news['idBerita']?> class="container">
            <img style="width: 100%; margin-top: 10px; margin-right: auto;" src='./image/News2.jpg'/>
            <a style="font-size: xx-large;"><?=$news['judul']?></a><br>
            <h4 style="display: inline-block; padding-right: 30px;">Kategori : <b><?=$news['kategori']?></b></h4>
            <h4 style="display: inline-block;">Tanggal : <b><?=$news['tanggal']?></b></h4>
          </div>
        <?php }}
        } else { 
            foreach($berita as $news) { ?>
              <div id=<?=$news['idBerita']?> class="container">
                <img style="width: 100%; margin-top: 10px; margin-right: auto;" src='./image/News2.jpg'/>
                <a href="" style="font-size: xx-large;"><?=$news['judul']?></a><br>
                <h4 style="display: inline-block; padding-right: 30px;">Kategori : <b><?=$news['kategori']?></b></h4>
                <h4 style="display: inline-block;">Tanggal : <b><?=$news['tanggal']?></b></h4>
              </div>
          <?php }
            } ?>
    </div>
  </div>

</body>



</html>

