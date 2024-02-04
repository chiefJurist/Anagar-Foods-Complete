<?php 
    //INCLUDE THE DATABASE CONNECTION
    include("config.php");

    // ALLOW CORS
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
       //WRITE THE QUERY
        $sql = "SELECT * FROM users ";

        //GET THE QUERY RESULT
        $result = $conn->query($sql);

        //GET THE RESULT IN ARRAY FORMAT
        $data = $result->fetch_all(MYSQLI_ASSOC);

        //CONVERT TO JSON
        $jsonResult = json_encode($data);

        // SET HEADERS
        header('Content-Type: application/json');

        echo $jsonResult;

        //Free Result From Memory
        mysqli_free_result($result);

        //Close Connection And Exit
        mysqli_close($conn);
        exit();
    }