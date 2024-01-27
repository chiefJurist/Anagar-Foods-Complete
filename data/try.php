<?php
// INCLUDE THE DATABASE CONNECTION
include("config.php");

// ALLOW CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// CHECK IF IT'S A POST REQUEST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /* The code `// GET POST DATA  = json_decode(file_get_contents("php://input"));` is
    retrieving the raw POST data from the request body and decoding it as a JSON object. This allows
    you to access the data sent in the POST request. */
    // GET POST DATA
    $postData = json_decode(file_get_contents("php://input"));

    // VALIDATE AND ESCAPE POST DATA (to prevent SQL injection)
    $email = mysqli_real_escape_string($conn, $postData->email);
    $username = mysqli_real_escape_string($conn, $postData->username);
    $password = mysqli_real_escape_string($conn, $postData->password);
    $usage = mysqli_real_escape_string($conn, $postData->usage);
    $terms = mysqli_real_escape_string($conn, $postData->terms);

    // YOUR ADDITIONAL VALIDATIONS AND BUSINESS LOGIC HERE

    // INSERT INTO DATABASE
    /* The `` variable is storing an SQL query that inserts data into the "users" table of
    a database. The query specifies the columns (email, username, password, usage, terms) and the
    corresponding values ('', '', '', '', '') that will be
    inserted into the table. */
    $insertQuery = "INSERT INTO users (email, username, password, usage, terms) VALUES ('$email', '$username', '$password', '$usage', '$terms')";
    /* ` = ->query();` is executing the SQL query `` on the
    database connection ``. The `query()` method is a function provided by the database
    connection object in PHP to execute SQL queries. In this case, it is used to insert the data
    into the "users" table in the database. The result of the query execution is stored in the
    `` variable. */
    $insertResult = $conn->query($insertQuery);

    if ($insertResult) {
        // SUCCESSFUL INSERT
        $response = array('status' => 'success', 'message' => 'User registered successfully');
    } else {
        // FAILED INSERT
        $response = array('status' => 'error', 'message' => 'Error registering user');
    }

    // RETURN JSON RESPONSE
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // IF NOT A POST REQUEST
    $response = array('status' => 'error', 'message' => 'Invalid request method');
    header('Content-Type: application/json');
    echo json_encode($response);
}

