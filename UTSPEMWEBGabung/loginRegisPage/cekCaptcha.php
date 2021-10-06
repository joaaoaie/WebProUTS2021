<?php
    if ($_SESSION["code"] != $_POST["kodecaptcha"]) {
        $_SESSION['error_login_message'] = 'Captcha yang dimasukkan salah';
        header("location: $base_url/loginRegisPage/loginRegister.php");
    }
?>