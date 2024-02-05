<?php 
    //Include The Database Connection
    include("config.php");

    // ALLOW CORS
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    

    //CHECK IF A OST REQUEST WAS MADE
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        //GET POST DATA
        $postData = json_decode(file_get_contents("php://input"));

        //ASSIGNING THE POSTDATA TO VARIABLES
        $recognition = mysqli_real_escape_string($conn, $postData->recognition);
        $password = mysqli_real_escape_string($conn, $postData->password);

        //CREATE A QUERY TO CHECK IF THE USER EXISTS
        $sql = "SELECT * FROM users WHERE email = '$recognition' OR username = '$recognition'";

        //GET THE QUERY RESULT 
        $result = mysqli_query($conn, $sql);

        //PROCEED IF THE USER EXISTS
        if (mysqli_num_rows($result) > 0) {
            //Store The User Data In A Variable
            $userData = $result->fetch_assoc();

            //Check If The Password Is Correct
            if (password_verify($password, $userData["password"])) {
                //Send A Notification Mail About The Login
                // $to = $userData["email"];
                // $subject = "ACCOUNT LOG IN NOTIFICATION";
                // $message = "A user just accessed your account now, contact us at admin@anagar-foods.com if this action was not authorized by you";
                // $header = "From: admin@anagar-foods.com \r\n";
                // mail($to, $subject, $message, $header);

                //Login Successful, Insert JSON Response
                $response = array('status' => 'success', 'message' => 'Login Successful', 'id' => $userData['id'], 'email' => $userData['email'], 'username' => $userData['username'], 'type' => $userData['type']);
            } else {
                //Wrong Password, Insert Response
                $response = array('status' => 'invalid', 'message' => 'Invalid Password');
            }
        } else {
            //User Does Not Exist, Insert Response
            $response = array('status' => 'unrecognized', 'message' => 'You Do Not Have An Account');
        }
    } else {
        // IF NOT A POST REQUEST
        $response = array('status' => 'error', 'message' => 'Invalid request method');
    }

    //RETURN JSON RESPONSE
    header("Content-Type: application/json");
    $jsonResult = json_encode($response);
    echo $jsonResult;