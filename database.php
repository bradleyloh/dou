<?php
$servername = "localhost";
$username = "f32ee";
$password = "f32ee";
$database = "f32ee";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if (mysqli_connect_error()) {
  die("Connection failed: " . mysqli_connect_error());
}
?>