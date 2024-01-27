<?php 
/*FOR SAVING TO THE DATABASE*/
    //INCLUDE THE CONNECTION
    include("config.php");

    // ALLOW CORS
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");


    //CHECKING IF A POST REQUEST WAS MADE
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // GET POST DATA
        $postData = json_decode(file_get_contents("php://input"));

        //HASH THE PASSWORD 
        $hashed = password_hash($postData->password, PASSWORD_DEFAULT);

        // VALIDATE AND ESCAPE POST DATA (to prevent SQL injection)
        $email = $conn->real_escape_string($postData->email);
        $username = $conn->real_escape_string($postData->username);
        $password = $conn->real_escape_string($hashed);
        $type = $conn->real_escape_string($postData->usage);
        $terms = $conn->real_escape_string($postData->terms);

        //CREATE QUERY
        $sql2 = "INSERT INTO users(email, username, password, type, terms) VALUES('$email', '$username', '$password', '$type', '$terms')";

        //GETTING THE QUERY RESULT
        $result2 = $conn->query($sql2);

        if ($result2) {
            // SUCCESSFUL INSERT
            $response = array('status' => 'success', 'message' => 'User registered successfully');
        } else {
            // FAILED INSERT
            $response = array('status' => 'error', 'message' => 'Error registering user');
        }
    
        // RETURN JSON RESPONSE
        header('Content-Type: application/json');
        $jsonResult = json_encode($response);
        echo $jsonResult;
    } else {
        // IF NOT A POST REQUEST
        $response = array('status' => 'error', 'message' => 'Invalid request method');
        header('Content-Type: application/json');
        $jsonResult = json_encode($response);
        echo $jsonResult;
    }
