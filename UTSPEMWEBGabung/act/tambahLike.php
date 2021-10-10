<?php
    include '../connect_db.php';

    if(!isset($_SESSION)){ 
        header("location: $base_url/loginRegisPage/loginUser.php");
    };

    $judul = $_POST['judul'];
    $idBerita = $_POST['idBerita'];
    $idKomentar = $_POST['idKomentar'];
    
    $queryLike = $db->prepare("SELECT suka FROM komentar WHERE idBerita = :idBerita AND idKomentar = :idKomentar");
    $queryLike->bindParam(":idBerita", $idBerita);
    $queryLike->bindParam(":idKomentar", $idKomentar);
    $queryLike->execute();
    $suka = $queryLike->fetch();
    $suka['suka']++;
    /* 
    UPDATE komentar SET suka = :suka WHERE idBerita = :idBerita AND idKomentar = :idKomentar
    */
    $queryLike = $db->prepare("UPDATE komentar SET suka = :suka WHERE idBerita = :idBerita AND idKomentar = :idKomentar");
    $queryLike->bindParam(":suka", $suka['suka']);
    $queryLike->bindParam(":idBerita", $idBerita);
    $queryLike->bindParam(":idKomentar", $idKomentar);
    $queryLike->execute();
    
    header("location: $base_url/detailBerita.php?judul=$judul");
