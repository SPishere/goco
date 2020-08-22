<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("../config.inc.php");

$servername = $config_server_name;
$username = $config_username;
$password = $config_password;
$dbname = $config_db_name;


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$stmt = $conn->prepare("INSERT INTO symptoms (user_id, symptom) VALUES (?, ?)");
$stmt->bind_param("ss", $user, $json);

// set parameters and execute
$json = file_get_contents('php://input');
$user = $_SESSION["authenticated_user_id"];

$stmt->execute();


echo "Account Registered";

$stmt->close();
$conn->close();
