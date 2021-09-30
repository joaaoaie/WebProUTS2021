<?php
    include './connectdb.php';

    if ($_SESSION['user'] || $_SESSION['admin'] == null) {
        header("location: $base_url/login.php");
    }
    $queryberita = $db->prepare("SELECT * from berita");
    $queryberita->execute();
    $berita = $queryberita->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WeButs Admin</title>
    <link rel="stylesheet" type="text/css" href="main.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
</head>
<body>
    <?php include_once './header.php';?>
    
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
    </div>

    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;Dashboard</span>
    

    <div class="container">    
        
        <a href="<?= $base_url ?>addberita.php" style="float:right; border-radius:25px;" class="btn btn-primary" >Add News</a>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
            <th>Nomor</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Penulis</th>
            <th>Konten Berita</th>
            <th>Tanggal Publikasi</th>
            <th>Gambar</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($berita as $i => $news) { 
            $konten = substr($news['konten'], 0,256);?>
            
            <tr>
                <td><?= $news['idBerita'] ?></td>
                <td><?= $news['judul'] ?></td>
                <td><?= $news['kategori'] ?></td>
                <td><?= $news['penulis'] ?></td>
                <td><?= $konten . " ...."?></td>
                <td><?= $news['tanggal'] ?></td>
                <td><?= $news['gambar'] ?></td>
                <td><a href="editberita.php?id=<?= $news['idBerita']; ?>" class="btn btn-primary">Edit</a>
                    <a href="deleteberita.php?id=<?= $news['idBerita']; ?>" class="btn btn-danger" style="margin-top: 10px;" >Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>

        </table>
    </div>
<script>
    $(document).ready(function() {
            $('#example').DataTable({
                "order": [
                [0, 'asc']
                ]
            });
        });

    function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    }
</script>
   
</body>
</html> 
