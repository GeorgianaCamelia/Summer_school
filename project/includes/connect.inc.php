<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_summerschool";

    // Create connection
    $conn =  mysqli_connect($servername, $username, $password );

    // Check connection
    if (!$conn) {
        die('Connection failed: '.  mysqli_connect_error());
    } 
    mysqli_select_db($conn, $dbname) or die('Connection failed: ' . mysqli_error($conn));
?>
