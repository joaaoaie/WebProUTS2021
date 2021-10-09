<?php 
  include '../connect_db.php';

  if(isset($_SESSION['id_user'])) {
    $name = $_SESSION['id_user'];
    $queryCheck = $db->prepare("SELECT * FROM user WHERE (email=? OR username=?)");
    $queryCheck->execute([$name, $name]);
    $user = $queryCheck->fetch();
  }
?>

<html>
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scal=1.0">
  <link rel="stylesheet" href="header.css" type="text/css"/>

  </head>
  <body>
      <header class="header">
      <nav class="navbar navbar-expand-lg" style="padding: 0; margin: 0;">
          <div class="container-fluid">
            <div class="navbar-brand">
              <a href="../index.php">Web UTS</a>
            </div>
              <ul class="navbar-nav ml-auto ">
                  <?php if(isset($_SESSION['id_user'])){?>
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
                    <?php }?>
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
                    <?php }?>
                  <?php }?>
                  <a href="<?= $base_url?>/loginRegisPage/logout.php" class="btn" style="float: right; padding: 10px; margin-left: 10px; background:red;" >Sign Out</a>
              </ul>


            </div>
          </div>
        </nav>
      </header>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" integrity="sha384-PsUw7Xwds7x08Ew3exXhqzbhuEYmA2xnwc8BuD6SEr+UmEHlX8/MCltYEodzWA4u" crossorigin="anonymous"></script>
    </body>
</html>
