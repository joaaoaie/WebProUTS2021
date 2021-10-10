<?php
    if(!isset($_SESSION)){ 
        session_start();
    };

    $host = "localhost";
    $username = "root";
    $dbname = "id17737508_web_uts";
    $password = "";

    $base_url = 'http://localhost/UTSPEMWEBGabung';
    $db = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);
?>
