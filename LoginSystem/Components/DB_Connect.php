<?php 
$servername = "localhost";
$username = "root";
$password = "Bakar@786";
$database = "PHPCRUD";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    echo "Connection Failed with DataBase" . mysqli_connect_error();
} 

?>