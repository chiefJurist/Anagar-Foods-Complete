<?php 
    //INCLUDE THE DATABASE CONNECTION
    include("config.php");

    // ALLOW CORS
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");


    //IF A POST REQUEST WAS MADE
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //get post result
        $postData = json_decode(file_get_contents("php://input"));

        //assigning the postdata to a variable
        $id = $conn->real_escape_string($postData->id);
        $username = $conn->real_escape_string($postData->username);
        $type = $conn->real_escape_string($postData->type);

        //validate username
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $response = ["status" => "taken", "message" => "Username Already Taken"];
        } else if (strlen($username) < 3) {
            $response = ["status" => "short", "message" => "Username Should Be At Least 3 Characters"];
        } else {
            //create update query
            $sql2 = "UPDATE users SET username = '$username', type= '$type' WHERE id = '$id'";
            
            //getting the query result
            $result2 = $conn->query($sql2);

            if ($result2) {
                $response = array('status' => 'success', 'message' => 'Profile updated successfully');
            } else {
                $response = array('status' => 'error', 'message' => 'Error updating profile');
            }
        }
        
    } else {
        $response = array('status' => 'error', 'message' => 'Invalid Request Method');
    }
    
    //RETURN JSON RESPONSE
    header('Content-Type: application/json');
    $jsonResult = json_encode($response);
    echo $jsonResult;