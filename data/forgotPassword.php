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

        #VALIDATION
        //Creating Queries For Validating Email
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) < 1) {
            // check if the user already has an account
            $response = array('status' => 'emailError', 'message' => 'You Do Not Have An Account');
        } elseif ($password != $password2) {
            //validate password
            $response = array('status' => 'passwordError', 'message' => 'Passwords Do Not Match');
        } elseif (strlen($password) < 8) {
            //validate password
            $response = array('status' => 'passwordError', 'message' => 'Password Should Be At Least 8 Characters');
        } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', $password)) {
            //validate password
            $response = array('status' => 'passwordError', 'message' => 'Password Should Contain At Least One UpperCase, LowerCase And One Number');
        } else {
            //send otp code
            $otpCode = rand(00000, 99999);
            // $to = $email;
            // $subject = "PASSWORD RESET NOTIFICATION";
            // $message = "Your one time password for reseting your password is $otpCode . Please contact support if this action was not initiated by you";
            // $header = "From: admin@anagar-foods.com \r\n";
            // mail($to, $subject, $message, $header);

            $response = array('status' => 'otp', 'message' => $otpCode);
        }
    } else {
        //IF NOT A POST REQUEST
        $response = array('status' => 'error', 'message' => 'Invalid request method');
    }

    // RETURN JSON RESPONSE
    header('Content-Type: application/json');
    $jsonResult = json_encode($response);
    echo $jsonResult;
    