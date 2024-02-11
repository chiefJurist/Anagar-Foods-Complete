<?php 
/* FOR GETTING THE USERS FOR VALIDATION BEFORE SAVING */
    //INCLUDE THE DATABASE CONNECTION
    include("config.php");

    // ALLOW CORS
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       // GET POST DATA
       $postData = json_decode(file_get_contents("php://input"));

        //SET THE VARIABLES VALIDATE AND ESCAPE POST DATA (to prevent SQL injection)
        $email = $conn->real_escape_string($postData->email);
        $username = $conn->real_escape_string($postData->username);
        $password = $conn->real_escape_string($postData->password);
        $password2 = $conn->real_escape_string($postData->password2);
        $type = $conn->real_escape_string($postData->usage);
        $terms = $conn->real_escape_string($postData->terms);



        #VALIDATION
        //Creating Queries For Validating Email And Username
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $sql2 = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $result2 = mysqli_query($conn, $sql);
             
        if (mysqli_num_rows($result) > 0) {
            // check if the user already has an account
            $response = array('status' => 'emailError', 'message' => 'You Already Have An Account');
        } elseif (mysqli_num_rows($result2) > 0) {
            // check if the username is taken
            $response = array('status' => 'usernameError', 'message' => 'Username Is Already Taken');
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //validate email
            $response = array('status' => 'emailError', 'message' => 'Please Input A Valid Email Address');
        } elseif (!preg_match('/^[a-zA-Z_]+$/', $username)) {
            //validate username
            $response = array('status' => 'usernameError', 'message' => 'Username Contain Only Letters And Underscore');
        } elseif (strlen($username) < 4) {
            //validate username
            $response = array('status' => 'usernameError', 'message' => 'Username Must Be At Least Four Characters');
        } elseif ($password != $password2) {
            //validate password
            $response = array('status' => 'passwordError', 'message' => 'Passwords Do Not Match');
        } elseif (strlen($password) < 8) {
            //validate password
            $response = array('status' => 'passwordError', 'message' => 'Password Should Be At Least 8 Characters');
        } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', $password)) {
            //validate password
            $response = array('status' => 'passwordError', 'message' => 'Password Should Contain At Least One UpperCase, LowerCase And One Number');
        } elseif (empty($type)) {
            //validate type
            $response = array('status' => 'typeError', 'message' => 'You Account type Should Not Be Empty');
        } elseif (empty($terms)) {
            //validate terms
            $response = array('status' => 'termsError', 'message' => 'You cannot proceed Without Accepting Our Terms');
        } else {
            //Hashing The Password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            //Create SQL For Inputing The Users Output To The DataBase
            $sql = "INSERT INTO users(email, username, password, type, terms) VALUES('$email', '$username', '$hashedPassword', '$type', '$terms')";

            if ($conn->query($sql)) {
                $response = array('status' => 'success', 'message' => 'User registered successfully');
            } else {
                $response = array('status' => 'error', 'message' => 'Error Registering User');
            }
        }
    } else {
        //IF NOT A POST REQUEST
        $response = array('status' => 'error', 'message' => 'Invalid request method');
    }

    // RETURN JSON RESPONSE
    header('Content-Type: application/json');
    $jsonResult = json_encode($response);
    echo $jsonResult;