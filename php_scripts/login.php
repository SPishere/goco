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

$password = $_POST['password'];
$logged_id;

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users where user_name = '". $_POST['user_name']."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $logged_id = $row["id"];
        $compare_password = $row["password"];
    }
    if (password_verify($password, $compare_password)) {
        $_SESSION["authenticated_user_id"] = $logged_id;
       echo "true";
       /* echo $_SESSION["authenticated_user_id"]; */
    } 
    else{
        echo "false";
    }
} else {
    echo "false";
}
$conn->close();
