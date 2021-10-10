<?php
    
    include '../connect_db.php';
    $id = $_SESSION['id_user'];
    $queryberita = $db->prepare("SELECT * from berita");
    $queryberita->execute();
    $berita = $queryberita->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webuts Admin</title>
    <link rel="stylesheet" type="text/css" href="table.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
</head>
<body>
    <?php include_once './header.php';?>
   
    <div class="container">   
        <div class="row my-2">
            <div class="col-md">
                <h3 class="text-center fw-bold text-uppercase">Data Berita</h3>
                <hr>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <a href="addberita.php" class="btn btn-primary"><i class="bi bi-plus-square"></i>&nbsp;Tambah Data</a>
            </div>
        </div>     

        <div class="d-flex justify-content-center">
            <table id="example" class="table table-striped text-center tableText" style="overflow: auto;">
                <div class="details">
                    <thead class="table-primary">
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
                            <td data-label="Nomor "><?= $news['idBerita'] ?></td>
                            <td data-label="Judul  "><?= $news['judul'] ?></td>
                            <td data-label="Kategori "><?= $news['kategori'] ?></td>
                            <td data-label="Penulis "><?= $news['penulis'] ?></td>
                            <td data-label="Konten Berita "><?= $konten . " ...."?></td>
                            <td data-label="Tanggal Publikasi "><?= $news['tanggal'] ?></td>
                            <td data-label="Gambar "><a> 
                                    <?php if(isset($news['gambar'])){?>
                                        <img
                                        src="../image/news/<?= $news['gambar']; ?>"
                                        style="height: 60px; width: 60px;"
                                        alt=""
                                        loading="lazy"
                                        />
                                    <?php } else{?>
                                        <img
                                        src="../image/news/no-image.jpg"
                                        style="height: 60px; width: 60px;"
                                        alt=""
                                        loading="lazy"
                                        />
                                    <?php } ?>
                            </a></td>
                            <td data-label="Action ">
                                <a href="editberita.php?id=<?= $news['idBerita']; ?>" class="btn btn-warning btn-sm" style="font-weight: 600;"><i class="bi bi-pencil-square"></i>&nbsp;Edit</a> |
                                <a href="deleteberita.php?id=<?= $news['idBerita']; ?>" class="btn btn-danger btn-sm" style="font-weight: 600;" onclick="return confirm('Apakah anda yakin ingin menghapus berita dengan judul <?= $news['judul']; ?> ?');"><i class="bi bi-trash-fill"></i>&nbsp;Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </div>
            </table>
        </div>
   
    </div>

    <!-- Data Tables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
                $('#example').DataTable({
                    "order": [
                    [0, 'asc']
                    ]
                });
            });
    </script>
    </body>

    
</html> 
