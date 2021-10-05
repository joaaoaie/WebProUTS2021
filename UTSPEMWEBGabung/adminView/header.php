<?php 
  include '../connect_db.php';

  $name = $_GET['id'];
  $queryCheck = $db->prepare("SELECT * FROM user WHERE (email=? OR username=?)");
  $queryCheck->execute([$name, $name]);
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
      <a class="navbar-brand mt-2 mt-lg-0" href="../index.php?id=<?= $user['username']?>">
        <img
          src="./assets/logo.png"
          height="35"
          alt=""
          loading="lazy"
        />
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <p style= "font-weight: bold; font-size: 30px;">CRUD News</p>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      <!-- Icon -->
      <a class="text-reset me-3" href="#">
        <i class="fas fa-shopping-cart"></i>
      </a>

      <?php if(isset($_SESSION['admin'])){ ?>
        <!-- Avatar -->
        <?php if(isset($user['foto'])){?>
          <a>
            <img
              src="../image/profile/<?= $user['foto']; ?>"
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
              src="../image/profile/placeholder.png"
              class="rounded-circle"
              style="height: 40px; width: 40px;"
              alt=""
              loading="lazy"
            />
          </a>
        <?php }
      } ?> 
      <a href="<?= $base_url?>/loginRegisPage/logout.php" class="btn btn-danger" style="float: right; padding: 10px; margin-left: 10px;" >Sign Out</a>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->