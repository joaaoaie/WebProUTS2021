<?php
    include '../connect_db.php';

    if(!isset($_SESSION)){ 
        header("location: $base_url/loginRegisPage/loginUser.php");
    };

    $judul = $_POST['judul'];
    $Username = $_POST['Username'];
    $isi = $_POST['isi'];
    $idBerita = $_POST['idBerita'];
    $idKomentar = $_POST['idKomentar'];
    $date = date("Y-m-d");
    
    $insertQuery = $db->prepare("INSERT INTO komentar VALUES (:idBerita, :idKomentar, :username, :tanggal, :isi, 0)");
    $insertQuery->bindParam(":idBerita", $idBerita);
    $insertQuery->bindParam(":idKomentar", $idKomentar);
    $insertQuery->bindParam(":username", $Username);
    $insertQuery->bindParam(":tanggal", $date);
    $insertQuery->bindParam(":isi", $isi);
    $insertQuery->execute();
    
    header("location: $base_url/detailBerita.php?judul=$judul");
