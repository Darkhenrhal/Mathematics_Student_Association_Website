<?php
$host = "localhost";
$dbName = "web_project_database";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass, $dbName);

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}
?>