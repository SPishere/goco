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

$sql = "select t1.* from symptoms t1 inner join (select max(date) as date from symptoms group by date(date)) t2 on t1.date= t2.date where user_id = ". $_SESSION["authenticated_user_id"]. "  ORDER BY date";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $res="[";
    while($row = $result->fetch_assoc()) {
        $res .='{"date":' ;
        $res .= '"' . $row['date'] . '", "symptom":';
        $res .= $row["symptom"];
        $res .= '},';
    }
    $res = substr($res , 0, -1);
    $res .="]";
    echo $res;
} else {
    echo "false";
}
$conn->close();
