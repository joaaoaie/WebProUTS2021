<?php 
  include './connect_db.php';

  $name = $_GET['id'];
  if($_SESSION['id_user'] == $_GET['key']){
    $queryCheck = $db->prepare("SELECT * FROM user WHERE email=? ");
  }
  else{
    $queryCheck = $db->prepare("SELECT * FROM user WHERE username=? ");
  }
  $queryCheck->execute([$name]);
  $user = $queryCheck->fetch();
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="index.php">
        <img
          src="assets/logo.png"
          alt=""
          loading="lazy"
          style="height: 40px;"
        />
      </a>
      <!-- Left links -->
      <?php if(isset($_SESSION['id_user'])) { ?>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <p style= "font-weight: bold; font-size: 30px; margin-top: 2%; margin-bottom: 0%;">Hello, <?= $_SESSION['id_user'] ?></p>
        </ul>
      <?php } ?>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      <!-- Icon -->
      <a class="text-reset me-3" href="#">
        <i class="fas fa-shopping-cart"></i>
      </a>  
        
      <?php if(isset($_SESSION['id_user'])){ ?>
        <!-- Avatar -->
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
        <?php } ?> 
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
        <?php } ?> 


        <a href="<?= $base_url?>/loginRegisPage/logout.php" class="btn btn-danger" style="float: right; padding: 10px; margin-left: 10px;">Sign Out</a>
        <?php if($_SESSION['admin']){ ?> 
          <a href="<?= $base_url?>/adminView/CRUD.php" class="btn btn-success" style="float: right; padding: 10px; margin-left: 10px;">CRUD News</a>
        <?php } ?>
      <?php } ?>
      <?php if(!isset($_SESSION['id_user'])) { ?>
        <a href="<?= $base_url?>/loginRegisPage/loginRegister.php" class="btn btn-primary" style="float: right; padding: 10px; margin-left: 10px;">Sign In</a>
      <?php } ?>

      
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->