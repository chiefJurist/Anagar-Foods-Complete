<?php 
    //INCLUDE THE DATABASE CONNECTION
    include("config.php");

    // ALLOW CORS
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");


    //IF A GET REQUEST WAS MADE
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //get post result
        $postData = json_decode(file_get_contents("php://input"));

        //assigning the postdata to a variable
        $orderId = $conn->real_escape_string($postData->orderId);

        //create query
        $sql = "SELECT * FROM orders WHERE id = '$orderId' ORDER BY created_at DESC";

        //get the result 
        $result = $conn->query($sql);

        //fetch the result in array format
        $data = mysqli_fetch_assoc($result);

        //populating the response array
        if ($data) {
            $response = $data;
        } else {
            $response = array('status' => 'empty', 'message' => 'No Orders Made');
        }
    } else {

       //populating the response array
        $response = array('status' => 'error', 'message' => 'Invalid Request Method');
    }

    //RETURN JSON RESPONSE
    header('Content-Type: application/json');
    $jsonResult = json_encode($response);
    echo $jsonResult;