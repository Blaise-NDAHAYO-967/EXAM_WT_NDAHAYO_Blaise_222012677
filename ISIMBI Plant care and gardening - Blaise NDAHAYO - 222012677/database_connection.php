<?php
// Database credentials
$hostname = "localhost";
$username = "ndahayo";
$password = "blaise@123";
$database = "plant_care_and_gardening_assistance_platform";

// Create connection
$connection = new mysqli($hostname, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>


