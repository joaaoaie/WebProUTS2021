<?php
    include '../connect_db.php';

    // Hapus session email biar dianggap logout
    unset($_SESSION['id_user']); //buat session finished gtu jadi biar user nya berhasil log out trs nnti balik ke window log in lgi
    unset($_SESSION['admin']);
    header("location: $base_url/index.php");
?>