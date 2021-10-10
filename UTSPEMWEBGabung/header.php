<?php 
  include './connect_db.php';

  if(isset($_SESSION['id_user'])) {
    $name = $_SESSION['id_user'];
    $queryCheck = $db->prepare("SELECT * FROM user WHERE (email=? OR username=?)");
    $queryCheck->execute([$name, $name]);
    $user = $queryCheck->fetch();
  }
?>

<html>
  <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
  <link rel="stylesheet" href="header.css" type="text/css"/>

  </head>
  <body>
      <header class="header">
      <nav class="navbar navbar-expand-lg" style="padding: 0; margin: 0;">
          <div class="container-fluid">
            <div class="navbar-brand">
              <a href="index.php">Web UTS</a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
              <span></span>
              <span></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent" style="background-color: white;">
              <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categories
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="./index.php?kategori=Politik">Politics</a></li>
                    <li><a class="dropdown-item" href="./index.php?kategori=Food">Food</a></li>
                    <li><a class="dropdown-item" href="./index.php?kategori=Sports">Sports</a></li>
                    <li><a class="dropdown-item" href="./index.php?kategori=Lifestyle">Lifestyle</a></li>
                    <li><a class="dropdown-item" href="./index.php?kategori=Travel">Travel</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="./index.php">All</a></li>
                  </ul>
                </li>
                
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Profile
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    
                    <?php if(!isset($_SESSION['id_user'])) { ?>
                      <li><a href="<?= $base_url?>/loginRegisPage/loginRegister.php" class="dropdown-item">Sign In</a></li>
                    <?php } ?>
                    <?php if(isset($_SESSION['id_user'])) { ?>
                      <li><a class="dropdown-item" href="<?= $base_url?>/loginRegisPage/logout.php">Log Out</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <?php if($_SESSION['admin']){ ?> 
                        <li><a href="<?= $base_url?>/adminView/crud.php" class="dropdown-item">CRUD News</a></li>
                      <?php } ?>
                    <?php } ?>
                  </ul>
                </li>
                
              </ul>
              <ul class="navbar-nav ml-auto ">
                  <?php if(isset($_SESSION['id_user'])){?>
                    <?php if(isset($user['foto'])){?>
                      <a>
                        <img
                          src="./image/profile/<?= $user['foto']; ?>"
                          class="rounded-circle"
                          style="height: 40px; width: 40px;"
                          alt=""
                          loading="lazy"
                        />
                      </a>
                    <?php }?>
                    <?php if(!isset($user['foto'])){?>
                      <a>
                        <img
                          src="./image/profile/placeholder.png"
                          class="rounded-circle"
                          style="height: 40px; width: 40px;"
                          alt=""
                          loading="lazy"
                        />
                      </a>
                    <?php }?>
                  <?php }?>
                  <?php if(!isset($_SESSION['id_user'])){?>
                    <a style="color: #2980b9; font-size: 1.5rem;">Guest</a>
                  <?php }?>
                 
              </ul>


            </div>
          </div>
        </nav>
      </header>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous"></script>
    </body>
</html>
