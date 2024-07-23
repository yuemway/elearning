<?php
    session_start();
    if ($_SESSION ['loginguru'] == false) {
        header('location: ../utama.php');
    }
?>