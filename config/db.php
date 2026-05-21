<?php

$dbHost = "localhost";
$dbPassword = '';
$dbName = "crud_app";
$dbUserName = 'root';

$conn = mysqli_connect($dbHost, $dbUserName, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    echo "Connected successfully";
}

?>