<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "applestore";
    //Connect to database
    $db_connect = mysqli_connect($servername, $username, $password, $db);
    //Check connection
    if (!$db_connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>