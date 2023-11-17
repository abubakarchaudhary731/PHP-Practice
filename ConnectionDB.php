<?php
// Connection with DataBase 
$servername = "localhost"; // server name
$username = "root"; // username
$password = "Bakar@786"; // password

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("Sorry! we failed to connect" . mysqli_connect_error());
} else {
    echo "Connected successfully <br>";
}
// Create DataBase using php

$DB = "CREATE DATABASE Practice";
$result = mysqli_query($conn, $DB);

if ($result) {
    echo "The DB was Created Successfully";
} else {
    echo "An Error Occupied" . mysqli_error($conn) ;
}

?>