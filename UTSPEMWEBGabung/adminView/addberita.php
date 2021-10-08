<?php $user = $_GET['user']; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
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
    <nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<h4 style="color:grey"> Add Berita </h4>
			</div>
			<div>
			<ul class="nav navbar-nav navbar-right">
			<li style="list-style: none" class="nav-item active list-inline-item"><a href="#" class="btn btn-success"> Admin </a></li>
			</ul>
		</div>
		</div>
    </nav>
    <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="fw-bold text-uppercase"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data</h3>
            </div>
            <hr>
        </div>
        <div class="card">
            <div class="card-body">
            <form method="POST" action="./act/adddataberita.php?user=<?= $user; ?>" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">ID Berita</label>
                    <input type="text" class="form-control" placeholder="idBerita" name="id" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" class="form-control" placeholder="Judul" name="Judul" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <input type="text" class="form-control" placeholder="kategori" name="Kategori" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Penulis</label>
                    <input type="text" class="form-control" placeholder="Penulis" name="Penulis" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Konten Berita</label>
                    <input type="text" class="form-control" placeholder="Konten Berita" name="Konten" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Publikasi</label>
                    <input type="date" class="form-control" placeholder="Tanggal Publikasi" name="Tanggal" required>
                </div>
                <div class="mb-3">
                    <label for="Gambar Berita">Choose a picture:</label>

                    <input type="file" name="gambar" accept="image/png, image/jpeg">
                </div>
                <p></p>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="CRUD.php?id=<?=$user?>" class="btn btn-primary" >Cancel</a>
            </form>
            </div>
        </div>
    </div>
    
</body>
</html>