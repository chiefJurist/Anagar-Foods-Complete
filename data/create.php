<?php 
    //INCLUDE THE DATABASE CONNECTION
    include("config.php");

    //ALLOW CORS
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");

    //START THE SESSION
    session_start();

    //IF A POST REQUEST IS MADE
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //Get Post Result
        $postData = json_decode(file_get_contents("php://input"));

        //Assigning The Postdata To Variables
        $location = $conn->real_escape_string($postData->location);
        $mainOrder = $conn->real_escape_string($postData->mainOrder);
        $additionalOrder = $conn->real_escape_string($postData->additionalOrder);
        $streetAddress = $conn->real_escape_string($postData->streetAddress);
        $zip = $conn->real_escape_string($postData->zip);
        $city = $conn->real_escape_string($postData->city);
        $state = $conn->real_escape_string($postData->state);
        $country = $conn->real_escape_string($postData->country);
        $orderType = $conn->real_escape_string($postData->orderType);
        $userId = $conn->real_escape_string($id);
        $currentDate = date('Y-m-d');
        $arrival = date('Y-m-d', strtotime($currentDate . ' +1 day'));

        //Create A Query to Input data In The Database
        $sql = "INSERT INTO orders(location, main_order, additional_order, street_address, zip, city, state, country, order_type, user_id, arrival) VALUES('$location', '$mainOrder', '$additionalOrder', '$streetAddress', '$zip', '$city', '$state', '$country', '$orderType', '$userId', '$arrival')";

        //Getting The Query Result
        $result = $conn->query($sql);

        if ($result) {
            // Successful Creation
            $response = array('status' => 'success', 'message' => 'Order Created Successfully');
        } else {
            // Failed Creation
            $response = array('status' => 'error', 'message' => 'Error Creating Order');
        }
    
        // RETURN JSON RESPONSE
        header('Content-Type: application/json');
        $jsonResult = json_encode($response);
        echo $jsonResult;
    } else {
        // If Not A Post Request
        $response = array('status' => 'error', 'message' => 'Invalid request method');
        header('Content-Type: application/json');
        $jsonResult = json_encode($response);
        echo $jsonResult;
    }