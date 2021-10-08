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
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
</head>

<!-- Parameter GET buat category -->
<?php error_reporting(0); $kategori = $_GET['kategori']; ?>

<header>
  <?php include './header.php';?>
</header>

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
    <a href="./index.php" class="category">All</a>
    <a href="./index.php?kategori=Politik" class="category">Politics</a>
    <a href="./index.php?kategori=Food" class="category">Food</a>
    <a href="./index.php?kategori=Sports" class="category">Sports</a>
  </div>

  <!-- Buat nampilin berita -->
  <div id="berita" style="margin: auto;flex-direction: column; justify-content: center; align-items: center; display: flex;">
    <?php if($kategori != null) { 
        foreach($berita as $news) { 
          if($kategori == $news['kategori']) {?>
          <div id=<?=$news['idBerita']?> class="container" data-aos="fade-up">
          <img style="width: 100%; margin-top: 10px; margin-right: auto;height: auto;" src='./image/News2.jpg'/>
          <a href="./detailBerita.php?judul=<?=$news['judul']?>?id=<?=$id?>" style="font-size: xx-large;"><?=$news['judul']?></a><br>
          <h4 style="display: inline-block; padding-right: 30px;">Kategori : <b><?=$news['kategori']?></b></h4>
          <h4 style="display: inline-block;">Tanggal : <b><?=$news['tanggal']?></b></h4>
        </div>
      <?php }}
      } else { 
          foreach($berita as $news) { ?>
            <div id=<?=$news['idBerita']?> class="container" data-aos="fade-up">
              <img style="width: 100%; margin-top: 10px; margin-right: auto; height: auto;" src='./image/News2.jpg'/>
              <a href="./detailBerita.php?judul=<?=$news['judul']?>?id=<?=$id?>" style="font-size: xx-large;"><?=$news['judul']?></a><br>
              <h4 style="display: inline-block; padding-right: 30px;">Kategori : <b><?=$news['kategori']?></b></h4>
              <h4 style="display: inline-block;">Tanggal : <b><?=$news['tanggal']?></b></h4>
            </div>
        <?php }
        } ?>
  </div>
  
  <!-- AOS -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({
      // Global settings:
      disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
      startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
      initClassName: 'aos-init', // class applied after initialization
      animatedClassName: 'aos-animate', // class applied on animation
      useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
      disableMutationObserver: false, // disables automatic mutations' detections (advanced)
      debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
      throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
      

      // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
      offset: 120, // offset (in px) from the original trigger point
      delay: 0, // values from 0 to 3000, with step 50ms
      duration: 400, // values from 0 to 3000, with step 50ms
      easing: 'ease', // default easing for AOS animations
      once: false, // whether animation should happen only once - while scrolling down
      mirror: false, // whether elements should animate out while scrolling past them
      anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

  });
  </script>
</body>
</html>

