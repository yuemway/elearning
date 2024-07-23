<?php
    session_start();
    if ($_SESSION ['loginguru'] == false) {
        header('location: loginsiswa.php');
    }
?>