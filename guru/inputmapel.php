<?php
    require "navbarguru.php";
    require "../koneksi.php";
    $querySP = mysqli_query($con, "SELECT * FROM sipaling");
    $queryJurusan = mysqli_query($con, "SELECT * FROM jurusan");
    $queryKelas = mysqli_query($con, "SELECT * FROM kelas2");
    $queryMatapel = mysqli_query($con, "SELECT * FROM matapel");
    

    function generateRandomString($lenght=10){
        $characters='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLenght=strlen($characters);
        $randomString='';
        for($i=0; $i<$lenght; $i++){ 
            $randomString .= $characters[rand(0,$charactersLenght-1)];  
        }    
        return $randomString;
    }
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
            <h3> Input Materi Mata Pelajaran</h3>
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
                <div>
                    <label for="mapel">Mata Pelajaran</label>
                    <select name="mapel" id="mapel" class="form-control" required>
                    <option value="">Pilih Mapel</option>    
                    <?php
                            while($dataMP=mysqli_fetch_array($queryMatapel)){
                        ?>    
                            <option value="<?php echo $dataMP['kode_mapel'];?>"><?php echo $dataMP['mapel']; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="materi">Materi</label>
                    <input type="file" class="form-control" name= "materi" id="materi">
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-secondary warna1 form-control" name="simpan">Submit</button>
                </div>
            </form>
            <?php
if (isset($_POST["simpan"])) {
    $jurusan = htmlspecialchars($_POST['jurusan']);
    $kelas = htmlspecialchars($_POST['kelas']);
    $mapel = htmlspecialchars($_POST['mapel']);
    $target_dir = "../materiw/";
    $nama_file = basename($_FILES["materi"]["name"]);
    $target_file = $target_dir . $nama_file;
    $materiFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $materi_size = $_FILES["materi"]["size"];
    $random_name = generateRandomString(20);
    $new_name = $random_name . "." . $materiFileType;  //rename file with new file name

    if ($jurusan == '' || $kelas == '' || $mapel == '' || $nama_file == '') {
        echo '<div class="alert alert-warning mt-3" role="alert">
                Jurusan, kelas, mata pelajaran, dan materi harus diisi
              </div>';
    } else {
        if ($materi_size > 5000000) {
            echo '<div class="alert alert-warning mt-3" role="alert">
                    File tidak boleh lebih dari 5 mb
                  </div>';
        } elseif ($materiFileType != 'pdf' && $materiFileType != 'doc' && $materiFileType != 'pptx') {
            echo '<div class="alert alert-warning mt-3" role="alert">
                    File wajib bertipe pdf atau doc atau pptx
                  </div>';
        } else {
            if (move_uploaded_file($_FILES["materi"]["tmp_name"], $target_dir . $new_name)) {
                // query insert to materi table
                $queryInput = mysqli_query($con, "INSERT INTO sipaling (jurusan, kelas, mapel, kode_mapel, materi) VALUES ('$jurusan', '$kelas', '$mapel', '$mapel', '$new_name')");
                if ($queryInput) {
                    echo '<div class="alert alert-primary mt-3" role="alert">
                            Materi berhasil tersimpan
                          </div>';
                    echo '<meta http-equiv="refresh" content="2; url=apa-apasaja.php"/>';
                } else {
                    echo '<div class="alert alert-danger mt-3" role="alert">
                            Terjadi kesalahan saat menyimpan data.
                          </div>';
                }
            } else {
                echo '<div class="alert alert-danger mt-3" role="alert">
                        Terjadi kesalahan saat mengupload file.
                      </div>';
            }
        }
    }
}
?>

        </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>










