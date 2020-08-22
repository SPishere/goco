<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$existing_user = check_existing("user_name", $_POST['user_name']);
$existing_email = check_existing("email", $_POST['email']);

if (!$existing_user && !$existing_email) {
    require("../config.inc.php");

    $servername = $config_server_name;
    $username = $config_username;
    $password = $config_password;
    $dbname = $config_db_name;

    $password_original = $_POST['password'];
    $hashed_password = password_hash($password_original, PASSWORD_DEFAULT);
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (email, user_name, first_name, last_name, password, country, phone, gender, state, city, dob) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $email, $user_name, $first_name, $last_name, $password, $country, $phone, $gender, $state, $city, $dob);

    // set parameters and execute
    $email = $_POST['email'];
    $user_name = $_POST['user_name'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password =  $hashed_password;
    $phone = $_POST['phone_number'];
    $gender = $_POST['gender'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $dob = $_POST['birthday'];

    $stmt->execute();


    echo "Account Registered";

    $stmt->close();
    $conn->close();
} else {
    echo "User already exists, Please login to continue!";
}
function check_existing($field, $value)
{

    require("../config.inc.php");

    $servername = $config_server_name;
    $username = $config_username;
    $password = $config_password;
    $dbname = $config_db_name;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $password = $_POST['password'];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users where " . $field . " = '" . $value . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        return (true);
    } else {
        return (false);
    }
    $conn->close();
}
