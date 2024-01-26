<?php 
    //Connecting To Database
    $servername = "localhost";
    $username = "root";
    $password= "";
    $database = "anagar_foods";

    $conn = new mysqli($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection Error:" . $conn->connect_error );
    }