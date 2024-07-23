<?php
    require "navbarsiswa.php";
    require "../koneksi.php";
    $querySiswa = mysqli_query($con, "SELECT * FROM mapel");
    $queryJurusan = mysqli_query($con, "SELECT * FROM jurusan");
    $queryKelas = mysqli_query($con, "SELECT * FROM kelas");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style2.css">
</head>
<body class="banner6">
<div class="container py-5 warna4">
        <div class="container">
            <h3 class="text-center">Mata Pelajaran</h3>
            <?php while($dataJ = mysqli_fetch_array($queryJurusan)) { ?>
            <h5><?php echo $dataJ['jurusan_skul']; ?></h5>
                <?php while($dataK = mysqli_fetch_array($queryKelas)) { ?>
                    <option><?php echo $dataK['kelas']; ?></option>
                <?php } ?>
            <?php } ?>
            <div class="row mt-5">
            <?php while($data = mysqli_fetch_array($querySiswa)) { ?>
            <div class="col-sm-6 col-md-4 mb-3">
                <div class="card h-100 shadow">
                    <div class="image-box">
                        <img src="../image/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $data['mapel']; ?></h4>
                        <p class="card-text text-truncate">Guru: <?php echo $data['guru']; ?></p>
                        <p class="card-text text-harga"> <?php echo number_format($data['mapel'], 0, ',', '.'); ?></p>
                        <a href="elearningsiswa.php?nama=<?php echo $data['mapel']; ?>" class="btn btn-secondary shadow2 warna1 font">Lihat detail</a>
                    </div>
                </div>
            </div>
            <?php } ?>
            </div>
            <a class="btn btn-outline-secondary mt-3 shadow2 warna6 form-control font2 p-3 fs-5" href="produk.php">See More!</a>
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>