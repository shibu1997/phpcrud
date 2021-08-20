<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "login";


    $con = mysqli_connect($server, $username, $password, $db);

    if (!$con) {
        die(" not connected with sql : " . mysqli_connect_error());
    } else {
    }
    ?>