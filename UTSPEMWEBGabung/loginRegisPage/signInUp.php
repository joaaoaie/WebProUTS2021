<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="login.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form method="POST" action="./loginUserCek.php" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" class="form-control" name="emailUname" placeholder="Email/Username">
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" class="form-control" name="pass" placeholder="Password">  
            </div>

            <div class="captchaText">
                <?php 
                    $var = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                    for($i=0;$i<8;$i++){
                        $pass[$i] = $var[rand(0,strlen($var)-1)];
                    }
                    $code = implode($pass); //Untuk mengubah array menjadi string
                    echo $code;
                ?>
            </div>
            
            <input type="hidden" class="form-control" name="captcha" value="<?=$code?>">

            <div class="input-field">
                <i class="fas fa-key"></i>
                <input type="text" class="form-control" name="kodeCaptcha" value="" maxlength="8" placeholder="Masukkan Captcha">
            </div>

            <?php if(isset($_SESSION['error_login_message'])){ ?>
                <div class="warning" role="alert">
                    <?= $_SESSION['error_login_message'] ?>
                </div>
            <?php unset($_SESSION['error_login_message']); } ?>

            <input type="submit" value="Login" class="btn solid" />
            <a href="../index.php">
                <input type="button" value="Cancel" class="btn solid" />
            </a>
          </form>
          <form id="form-login-submit" action="./addNewUser.php" method="POST" class="sign-up-form" enctype="multipart/form-data">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" name="firstName" placeholder="First Name" />
            </div>
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" name="lastName" placeholder="Last Name" />
            </div>
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Username" />
            </div>
            <div class="input-field">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" />
            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" name="pass" placeholder="Password" />
            </div>
            <div class="input-field">
                <i class="fas fa-calendar-alt"></i>
                <input type="date" name="tanggalLahir" placeholder="Birth Date" />
            </div>
            <div class="input-field">
                <i class="fas fa-venus-mars"></i>
                <select name="jenisKelamin" class="form-select" id="gender">
                    <!-- <option selected hidden>Select Gender</option> -->
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div>
                <label style="margin-bottom: 0%;" for="profilePicture" class="custom-file-upload">Upload Profile Picture</label><br>
                <input style="margin-top: 4%;" type="file" name="gambar" accept="image/png, image/jpeg">
            </div>
            <input type="submit" class="btn signUp" value="Sign up" />
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
