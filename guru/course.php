<?php
    require "navbarguru.php";
    require "../koneksi.php";
    $querySP = mysqli_query($con, "SELECT * FROM sipaling");
    $queryJurusan = mysqli_query($con, "SELECT * FROM jurusan");
    $queryKelas = mysqli_query($con, "SELECT * FROM kelas2");
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
<div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-5">
                    <img src="../image/ss.jpg" class="w-100" alt="">
                </div>
                <?php while($dataSP = mysqli_fetch_array($querySP)) { ?>
                <div class="col-lg-6 offset-lg-1">
                    <h2><?php echo $dataSP['mapel']; ?></h2>
                    <p class="fs-5"><?php echo $dataSP['nama_guru']; ?></p>
                    <p class="fs-3 font2"><?php echo $dataSP['kelas']; ?></p>
                    <p class="fs-5"> <a href="../materiw/<?php echo $dataSP['materi']; ?>></a></p>
                    <embed type="application/pdf" src="Nama-Nama Kelompok PROFESI PENDIDIK" width="600" height="400"></embed>

                </div>
            </div>
        </div>
        <?php } ?>
    </div>   
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>










