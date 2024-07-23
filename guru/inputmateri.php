<?php
    require "navbarguru.php";
    require "../koneksi.php";
    $querySP = mysqli_query($con, "SELECT * FROM sipaling");
    $queryJurusan = mysqli_query($con, "SELECT * FROM jurusan");
    $queryKelas = mysqli_query($con, "SELECT * FROM kelas2");
/*
    $nama = htmlspecialchars($_GET['nama']);
    $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama='$nama'"); 
    $produk = mysqli_fetch_array($queryProduk);

    $queryProdukTerkait = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$produk[kategori_id]' AND id!='$produk[id]' LIMIT 4");
    */
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
        <div class="container warna8">
            <h3> Input Materi</h3>
                <form action="" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="materi">Materi</label>
                        <input type="file" class="form-control" name= "materi" id="materi">
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    </div>
                </form>
        </div>
    </div>   
    <?php /*require "footer.php";*/?>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>