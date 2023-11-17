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
$sql = "INSERT INTO `detail` (`address`, `number`) VALUES ('SINGHPURA lr', '0I392800920')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "The Data was added successfully";
} else {
    echo "An error occurred: ";
}
?>
