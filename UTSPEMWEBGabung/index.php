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
  <div style="z-index:100; position: absolute; width:100%;">
    <?php include './header.php';?>
  <div>
</header>

<!-- Gambar di HOME - Carousel -->
<body class="col-12 col-m-12">
  <div id="myCarousel" class="carousel slide" data-ride="carousel" style="z-index: 1; margin-top: 75px;">
    <!-- Wrapper untuk slide -->
    <div class="carousel-inner" style="border-radius: 15px;">
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

      <div class="item">
        <img src="./image/Lifestyle.jpg" alt="Lifestyle" style="width:100%;">
        <div class="carousel-caption" style="font-weight: bold;">
          <h3>Lifestyle</h3>
          <p>Style for your life</p>
        </div>
      </div>

      <div class="item">
        <img src="./image/Travel.jpg" alt="Travel" style="width:100%;">
        <div class="carousel-caption" style="font-weight: bold;">
          <h3>Travel</h3>
          <p>Travel around the world</p>
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

<body class="col-12 col-m-12" style="background: linear-gradient(to bottom right,#2980b9, lightblue); background-attachment: fixed;">
  <!-- Portal Berita -->
  <section class="wrapper">
    <div class="container-fostrap">
      <div class="content">
        <div class="container">
          <div class="row">
            <?php if($kategori != null) { 
            foreach($berita as $news) { 
              if($kategori == $news['kategori']) {
                $judul = substr($news['judul'], 0,40);?>
              <div class="col-xs-12 col-sm-4" data-aos="fade-up" style="z-index: 1; position: relative;">
                <div class="card">
                  <!-- Thumbnail for category -->
                  <?php if(isset($news['gambar'])){?>
                      <img style="width: 100%; margin-top: 10px; margin-right: auto;height: auto; max-height: 200px" src='./image/news/<?= $news['gambar']?>' alt=""/>                    
                    <?php } else {?>
                      <img style="width: 100%; margin-top: 10px; margin-right: auto;height: auto; max-height: 200px" src='./image/News2.jpg' alt=""/>  
                    <?php } ?>

                    <div class="card-content">
                      <?php if(strlen($news['judul']) > 40) {?>
                        <h4 class="card-title"><a href="./detailBerita.php?judul=<?=$news['judul']?>"><?=$judul . "..."?></a></h4>
                      <?php } else {?>
                        <h4 class="card-title"><a href="./detailBerita.php?judul=<?=$news['judul']?>"><?=$judul?></a></h4>
                      <?php } ?>
                      <p style="display: inline-block; padding-right: 30px;">Kategori : <b><?=$news['kategori']?></b></p>
                      <p style="display: inline-block;">Tanggal : <b><?=$news['tanggal']?></b></p>
                    </div>
                </div>
              </div>
          <?php }}
          } else { 
              foreach($berita as $news) { 
                $judul = substr($news['judul'], 0,40);?>
              <div class="col-xs-12 col-sm-4" data-aos="fade-up" style="z-index: 1; position: relative;">
                <div class="card">
                  <!-- Thumbnail all category -->
                  <?php if(isset($news['gambar'])){?>
                    <img style="width: 100%; margin-top: 10px; margin-right: auto;height: auto; max-height: 200px" src='./image/news/<?= $news['gambar']?>' alt=""/>                    
                  <?php } else{?>
                    <img style="width: 100%; margin-top: 10px; margin-right: auto;height: auto; max-height: 200px" src='./image/News2.jpg' alt=""/>  
                  <?php } ?>
                  
                    <div class="card-content">
                    <?php if(strlen($news['judul']) > 40) {?>
                        <h4 class="card-title"><a href="./detailBerita.php?judul=<?=$news['judul']?>"><?=$judul . "..."?></a></h4>
                      <?php } else {?>
                        <h4 class="card-title"><a href="./detailBerita.php?judul=<?=$news['judul']?>"><?=$judul?></a></h4>
                      <?php } ?>
                      <p style="display: inline-block; padding-right: 30px;">Kategori : <b><?=$news['kategori']?></b></p>
                      <p style="display: inline-block;">Tanggal : <b><?=$news['tanggal']?></b></p>
                    </div>
                </div>
              </div>
            <?php }
            } ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer id="sticky-footer" class="flex-shrink-0 py-4 bg-light text-white-50">
    <div class="container text-center">
      <h5 style="color: #2980b9;">&copy; Universitas Multimedia Nusantara </h5>
      <h6 style="color: #2980b9;">(IF330-B) Web Programming - LEC</h6>
      <small style="color: #2980b9; padding-left: 3px">Steven Geraldi (00000043822) |</small>
      <small style="color: #2980b9; padding-left: 3px">Tesalonika Abigail (00000044503) |</small>
      <small style="color: #2980b9; padding-left: 3px">Jonathan Octavien (00000044495) |</small>
      <small style="color: #2980b9;">Felix Nugraha (00000043938)</small>
    </div>
  </footer>
  
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
