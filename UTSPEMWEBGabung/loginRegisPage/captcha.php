<?php
    if(!isset($_SESSION)){ 
        session_start();
    };
    
    function acakCaptcha(){
        $var = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

        $pass = array();
        $pjgVar = strlen($var)-2;
        for($i=0; $i<6; $i++){
            $j = rand(0, $pjgVar);
            $pass[] = $var[$j];
        }
        return implode($pass);
    }

    $code = acakCaptcha();
    $_SESSION["captcha"] = $code;

    //lebar dan tinggi captcha
    $wh = imagecreate(150, 50);
    //background color biru
    $bgc = imagecolorallocate($wh,22,86,165);
    //text color abu-abu
    $fc = imagecolorallocate($wh,223,230,233);
    imagefill($wh,0,0,$bgc);
    
    //( $image , $fontsize , $string , $fontcolor )
    imagestring($wh,10,50,15,$code,$fc);
    
    //buat gambar
    header('content-type: image/jpg');
    imagejpeg($wh);
    imagedestroy($wh);
?>