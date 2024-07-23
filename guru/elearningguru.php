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
<div class="container mb-5 py-5 warna4">
        <div class="container">
        <div class="my-5 col-12 col-md-6"></div>
            <h3> Pilih Mata Pelajaran</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="jurusan">Jurusan</label>
                    <select name="jurusan" id="jurusan" class="form-control" required>
                    <option value="">Pilih Jurusan</option>
                    <?php
                            while($dataJ=mysqli_fetch_array($queryJurusan)){
                        ?>    
                            <option value="<?php echo $dataJ['kode_jurusan'];?>"><?php echo $dataJ['jurusan'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="kelas">Kelas</label>
                    <select name="kelas" id="kelas" class="form-control" required>
                    <option value="">Pilih Kelas</option>
                    <?php
                            while($dataK=mysqli_fetch_array($queryKelas)){
                        ?>    
                            <option value="<?php echo $dataK['kode_kelas'];?>"><?php echo $dataK['kelas'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-secondary warna1 form-control" name="simpan">Submit</button>
                </div>
            </form>
            <?php
            if (isset($_POST["simpan"])) {
                $jurusan = htmlspecialchars($_POST['jurusan']);
                $kelas = htmlspecialchars($_POST['kelas']);
                if ($jurusan == '' || $kelas == '') {
                    echo '<div class="alert alert-warning mt-3" role="alert">
                            Jurusan dan kelas harus diisi
                        </div>';
                } else {
                    echo '<meta http-equiv="refresh" content="0; url=course.php"/>';
                }
            }
            ?>
        </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>