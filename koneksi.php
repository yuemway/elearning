<?php
    $con = mysqli_connect("localhost", "root", "", "elearning_project");

    //check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
?>