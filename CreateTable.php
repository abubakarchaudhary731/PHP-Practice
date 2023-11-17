<?php
$servername = "localhost"; 
$username = "root"; 
$password = "Bakar@786"; 
$database = "Practice";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Sorry! we failed to connect" . mysqli_connect_error());
} else {
    echo "Connected successfully <br>";
}

// Create Table in Database using PHP.
$sql = "CREATE TABLE `detail` (
    `id` INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `address` VARCHAR(100) NOT NULL,
    `number` INT(20) NOT NULL
)";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "The table was created successfully";
} else {
    echo "An error occurred: " . mysqli_error($conn);
}
?>
