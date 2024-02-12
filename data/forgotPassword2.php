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
        $email = $conn->real_escape_string($postData->email);
        $password = $conn->real_escape_string($postData->password);
        $password2 = $conn->real_escape_string($postData->password2);

        //hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        //create saving query
        $sql = "UPDATE users SET password = '$hashedPassword' WHERE email = '$email'";

        //checking if the query was successful
        if ($conn->query($sql)) {
            $response = array('status' => 'success', 'message' => 'Password Updated Successfuly');

            // $to = $email;
            // $subject = "PASSWORD RESET NOTIFICATION";
            // $message = "Your password has been updated successfully. Please contact support if this action was not initiated by you";
            // $header = "From: admin@anagar-foods.com \r\n";
            // mail($to, $subject, $message, $header);
        } else {
            $response = array('status' => 'failure', 'message' => 'Password Update Unsuccessful');
        }
    } else {
        //IF NOT A POST REQUEST
        $response = array('status' => 'error', 'message' => 'Invalid request method');
    }

    // RETURN JSON RESPONSE
    header('Content-Type: application/json');
    $jsonResult = json_encode($response);
    echo $jsonResult;
    