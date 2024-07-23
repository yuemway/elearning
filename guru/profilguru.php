<?php
    session_start();
    require "navbarguru.php";
    require "../koneksi.php";

    $queryPG= mysqli_query($con, "SELECT * FROM profil_guru");
    $dataPG = mysqli_fetch_array($queryPG);

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
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/style2.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">
            Account settings
        </h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Change password</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label class="" for="currentFoto">Upload new photo</label>
                                        <input type="file" class="account-settings-fileinput">
                                    </label>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control mb-1" value="" name= "username" id="username">
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control mb-1" value="" name= "name" id="name">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="email">E-mail</label>
                                    <input type="email" class="form-control mb-1" value="" name= "email" id="email">
                                </div>
                            </div>
                            <div class="text-right mt-3">
                                <button type="button" name="simpan" class="btn btn-primary">Save changes</button>&nbsp;
                                <button type="button" class="btn btn-default">Cancel</button>
                            </div>
                            <?php
                                if (isset($_POST["simpan"])) {
                                    $username = htmlspecialchars($_POST['username']);
                                    $nama = htmlspecialchars($_POST['nama']);
                                    $email = htmlspecialchars($_POST['email']);
                                    $target_dir="../image/";
                                    $nama_file=basename($_FILES["foto"]["name"]);
                                    $target_file=$target_dir.$nama_file;
                                    $imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                    $image_size=$_FILES["foto"]["size"];
                                    $random_name=generateRandomString(20);
                                    $new_name = $random_name. "." .$imageFileType;  //rename file with new file name

                                    if ($username == '' || $nama == '' || $email == '') {
                                        echo '<div class="alert alert-warning mt-3" role="alert">
                                                Username, nama, dan e-mail harus diisi
                                            </div>';
                                    } else {
                                        if ($image_size > 500000) {
                                            echo '<div class="alert alert-warning mt-3" role="alert">
                                                    Foto tidak boleh lebih dari 500 kb
                                                </div>';
                                        } elseif ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'svg') {
                                            echo '<div class="alert alert-warning mt-3" role="alert">
                                                    Foto wajib bertipe jpg atau png atau svg
                                                </div>';
                                        } else {
                                            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $new_name)) {
                                                // query insert to materi table
                                                $queryInput = mysqli_query($con, "UPDATE INTO profil_guru (username, nama, email) VALUES ('$username', '$nama', '$email')");
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
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label" for="password">Current password</label>
                                    <input type="password" class="form-control" name="current_password" value="<?php $dataPG['password'];?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="password">New password</label>
                                    <input type="password" class="form-control" name="new_password">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="password">Repeat new password</label>
                                    <input type="password" class="form-control" name="repeat_new_password">
                                </div>
                            </div>
                            <div class="text-right mt-3">
                                <button type="button" name="simpan" class="btn btn-primary">Save changes</button>&nbsp;
                                <button type="button" class="btn btn-default">Cancel</button>
                            </div>
                            <?php
                                if (isset($_POST["simpan"])) {
                                    $current_password = htmlspecialchars($_POST['current_password']);
                                    $new_password = htmlspecialchars($_POST['new_password']);
                                    $repeat_new_password = htmlspecialchars($_POST['repeat_new_password']);
                                    if ($current_password == '' || $new_password == '' || $repeat_new_password == '') {
                                        echo '<div class="alert alert-warning mt-3" role="alert">
                                                Current password, New password, dan Repeat new password harus diisi
                                            </div>';
                                    } else {
                                        $query = mysqli_query($con, "SELECT * FROM userguru WHERE passwordguru='$current_password'");
                                        $countdata= mysqli_num_rows($query);
                                        $data = mysqli_fetch_array($query);
                                        
                                        if($countdata>0){
                                            if (password_verify($passwordguru, $data['passwordguru'])){
                                                $_SESSION['usernameguru'] = $data['usernameguru'];
                                                $_SESSION['login'] = true; 
                                                header("Location: apa-apasaja.php");
                                            }
                                            else{
                                                ?>
                                                <div class= "alert alert-warning" rol="alert">
                                                Password salah!
                                                </div>
                                                <?php
                                            }
                                        }
                                        else{
                                            ?>
                                            <div class= "alert alert-warning" rol="alert">
                                                Akun tidak tersedia!
                                            </div>
                                            <?php
                                        }
                                    }
                                }
                                    
                                ?>
                        </div>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
    <script type="text/javascript">

    </script>
</body>
</html>