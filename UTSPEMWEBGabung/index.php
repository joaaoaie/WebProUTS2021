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
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css"> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script> -->
</head>

<!-- Parameter GET buat category -->
<?php error_reporting(0); $kategori = $_GET['kategori']; ?>

<header>
  <div style="z-index:100;">
    <?php include './header.php';?>
  <div>
</header>

<!-- Gambar di HOME - Carousel -->
<body class="col-12 col-m-12">
  <div id="myCarousel" class="carousel slide" data-ride="carousel" style="z-index: -1;">
    <!-- Wrapper untuk slide -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="./image/News1.jpg" alt="Breaking News" style="width:100%;">
        <div class="carousel-caption" style="font-weight: bold;">
          <h3>NEWS</h3>
          <p>Your trusted News portal</p>
        </div>
      </div>

      <div class="item">
        <img src="./image/Food1.jpg" alt="Food" style="width:100%;">
        <div class="carousel-caption" style="font-weight: bold;">
          <h3>Food</h3>
          <p>Delightful delicacy</p>
        </div>
      </div>
    
      <div class="item">
        <img src="./image/Politik2.jpg" alt="Politics" style="width:100%;">
        <div class="carousel-caption" style="font-weight: bold;">
          <h3>Politics</h3>
          <p>Know more about your country</p>
        </div>
      </div>

      <div class="item">
        <img src="./image/Sports2.jpg" alt="Sports" style="width:100%;">
        <div class="carousel-caption" style="font-weight: bold;">
          <h3>Sports</h3>
          <p>Stay healthy</p>
        </div>
      </div>
    </div>

    <!-- Tombol kiri kanan -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>

  </div>
</body>

<body class="col-12 col-m-12">

  <!-- Buat nampilin berita -->
  <div id="berita" style="margin: auto;flex-direction: column; justify-content: center; align-items: center; display: flex;">
    <?php if($kategori != null) { 
        foreach($berita as $news) { 
          if($kategori == $news['kategori']) {?>
          <div id=<?=$news['idBerita']?> class="container col-7 col-m-7" data-aos="fade-up">
          <img style="width: 100%; margin-top: 10px; margin-right: auto;height: auto;" src='./image/News2.jpg'/>
          <a href="./detailBerita.php?judul=<?=$news['judul']?>" style="font-size: xx-large;"><?=$news['judul']?></a><br>
          <h4 style="display: inline-block; padding-right: 30px;">Kategori : <b><?=$news['kategori']?></b></h4>
          <h4 style="display: inline-block;">Tanggal : <b><?=$news['tanggal']?></b></h4>
        </div>
      <?php }}
      } else { 
          foreach($berita as $news) { ?>
            <div id=<?=$news['idBerita']?> class="container col-7 col-m-7" data-aos="fade-up">
              <img style="width: 100%; margin-top: 10px; margin-right: auto; height: auto;" src='./image/News2.jpg'/>
              <a href="./detailBerita.php?judul=<?=$news['judul']?>" style="font-size: xx-large;"><?=$news['judul']?></a><br>
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