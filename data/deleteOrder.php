<?php  
    //INCLUDE THE DATABASE CONNECTION
    include("config.php");

    // ALLOW CORS
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");


    //IF A GET REQUEST WAS MADE
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //get post result
        $postData = json_decode(file_get_contents("php://input"));

        //assigning the postdata to a variable
        $deleteId = $conn->real_escape_string($postData->deleteId);

        //create query
        $sql = "DELETE FROM orders WHERE id = '$deleteId'";

        //get the result 
        $result = $conn->query($sql);

        //populating the response array
        if ($result) {
            $response = $result;
        } else {
            $response = array('status' => 'failure', 'message' => $conn->error);
        }
    } else {
        //populating the response array
        $response = array('status' => 'error', 'message' => 'Invalid Request Method');
    }


    //RETURN JSON RESPONSE
    header('Content-Type: application/json');
    $jsonResult = json_encode($response);
    echo $jsonResult;
    