<?php
    require "navbarsiswa.php";
    require "../koneksi.php";
    $querySP = mysqli_query($con, "SELECT * FROM sipaling");
    $queryJurusan = mysqli_query($con, "SELECT * FROM jurusan");
    $queryKelas = mysqli_query($con, "SELECT * FROM kelas2");

    // get produk dari nama produk/keyword
    if (isset($_GET['keyword'])) {
        $querySP = mysqli_query($con, "SELECT * FROM sipaling WHERE nama LIKE '%$_GET[keyword]%'");
    }
    // get produk dari kategori
    else  if (isset($_GET['jurusan'])) {
        $queryGetKodeJurusan = mysqli_query($con, "SELECT kode_jurusan FROM jurusan WHERE nama='$_GET[jurusan]'");
        $kodeJurusan = mysqli_fetch_array($queryGetKodeJurusan);
        $querySP = mysqli_query($con, "SELECT * FROM sipaling WHERE ='$kodeJurusan[kode_jurusan]'");
    }
    // get produk default
    else {
        $querySP = mysqli_query($con, "SELECT * FROM sipaling");
    }

    $countData= mysqli_num_rows($querySP);
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
    <div class="container-fluid banner3 d-flex align-items-center"> <!-- d-flex dan align-items-center da kasi ke tengah secara vertikal-->
        <div class="container">
            <div class="input-group input-group-lg my-4">
                <h1 class="text-center font">Mata Pelajaran</h1>   
            </div>
        </div>
    </div>
    <div>
        <div class="col-md-8 offset-md-2 shadow3">
            <form method="get" action="apa-apasaja.php">
                <div class="input-group input-group-lg my-4">
                    <input type="text" class="form-control" placeholder="Cari mata pelajaran?" name="keyword">
                    <button type="submit" class="warna3 btn btn-secondary"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>        
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3 mb-5"><!-- 1. style="border: solid red; height: 300px" bisa dipake  untuk tau bentuk ukuran col 2. mb-5 biar kalo layar kecil ada jarak bawah antara kotak pertama dan kedua-->
                <h3 class="py-2 text-center">Jurusan</h3><!--py-2 untuk kasi jarak bawahS antara kategori dan grup an item-->
                <ul class="list-group"><!--daftar yang tidak diurutkan ( <ul> )-->
                    <?php while($jurusan = mysqli_fetch_array ($queryJurusan)){?>
                    <a href="apa-apasaja.php?jurusan=<?php echo $jurusan['jurusan'];?>"class="no-decoration">
                    <li class="list-group-item no-decoration font2"><?php echo $jurusan['jurusan'];?></li><!--<li> digunakan di dalam daftar yang diurutkan -->
                    </a>
                    <?php }?>
                </ul>
            </div> 
            <div class="col-lg-9">
                <h3 class="py-2 text-center">Mata Pelajaran</h3>
                <div class="row">
                    <?php 
                        if ($countData < 1) {
                    ?>
                        <h5 class="text-center my-4">Mata pelajaran yang anda cari tidak tersedia</h5>
                    <?php
                        }
                    ?>
                    <?php while($dataSP = mysqli_fetch_array($querySP)) { ?>
                    <div class="col-sm-6 col-md-4 mb-3">
                        <div class="card h-100 shadow">
                            <div class="image-box">
                                <img src="../image/ss.jpg" class="card-img-top" alt="">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $dataSP['mapel']; ?></h4>
                                <p class="card-text">Guru: <?php echo $dataSP['nama_guru']; ?></p>
                                <p class="card-text"> <?php echo $dataSP['kelas']; ?></p>
                                <p class="card-text"> <?php echo $dataSP['jurusan']; ?></p>
                                <a href="course.php?nama=<?php echo $dataSP['mapel']; ?>" class="btn btn-secondary shadow2 warna1 font form-control">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>