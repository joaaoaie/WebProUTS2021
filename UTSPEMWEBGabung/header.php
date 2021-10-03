<?php 
  include './connect_db.php';

  $queryEmailCheck = $db->prepare("SELECT * FROM user");
  $queryEmailCheck->execute();

  $user = $queryEmailCheck->fetch();
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
            <p style= "font-weight: bold; font-size: 30px; margin-top: 2%; margin-bottom: 0%;">Hello, <?= $user["username"]?></p>
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
        <a>
          <img
            src="https://mdbootstrap.com/img/new/avatars/2.jpg"
            class="rounded-circle"
            style="height: 30px;"
            alt=""
            loading="lazy"
          />
        </a>
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