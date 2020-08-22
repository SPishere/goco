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

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "select date count(symptom) as count
                      from symptoms  where
                           and user_id = " . $_SESSION["authenticated_user_id"] . "
                      group by date";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    echo "[";
    while ($row = $result->fetch_assoc()) {
        echo '{"count":'.$row['count'] . 'day '.$row["day"]."},";
    }

} else {
    echo "false";
}
$conn->close();
