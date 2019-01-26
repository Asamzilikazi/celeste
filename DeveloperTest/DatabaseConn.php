<?php
$servername = "localhost";
$database = "userinfo";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "connected";

mysqli_close($conn);
?>