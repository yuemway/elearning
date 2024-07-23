<?php
    session_start();
    require "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style2.css">
</head> 

<style>
    .main{
        height: 100vh;
    }
    .login-box{
        width: 500px;
        height: 300px;
        box-sizing: border-box;
        border-radius: 10px;
    }
</style>
<body>
    <div class="main d-flex flex-column justify-content-center banner align-items-center">
        <div class="login-box p-5 shadow warna4">
            <form action="" method="post">
                <div>
                    <label for="usernameguru">NUPTK</label>
                    <input type="text" class="form-control" name="usernameguru" id="usernameguru" autocomplete="off">
                </div>
                <div>
                    <label for="passwordguru">Password</label>
                    <input type="password" class="form-control" name="passwordguru" id="passwordguru">
                </div>
                <div>
                    <button class="btn btn-secondary warna1 form-control mt-3" type="submit" name="loginbtn">Login</button>
                </div>
            </form>
        </div>
        <div class="mt-3" style="width: 500px">
            <?php 
                if(isset($_POST['loginbtn'])){
                    $usernameguru = htmlspecialchars($_POST['usernameguru']);
                    $passwordguru = htmlspecialchars($_POST['passwordguru']);

                    $query = mysqli_query($con, "SELECT * FROM userguru WHERE usernameguru='$usernameguru'");
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
            ?>
        </div>
    </div>
</body>
</html>