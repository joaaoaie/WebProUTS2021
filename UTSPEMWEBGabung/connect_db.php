<?php
    if(!isset($_SESSION)){ 
        session_start();
    };

    $host = "localhost";
    $username = "root";
    $dbname = "webuts";
    $password = "";

    $base_url = 'http://localhost/UTSPEMWEBGabung';
    $db = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);
?>