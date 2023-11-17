<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $check = isset($_POST['check']) ? 1 : 0;  

    // Data Save in Database.
    $servername = "localhost";
    $db_username = "root"; 
    $password = "Bakar@786";
    $database = "HTML";
    // Connect With Database.
    $conn = mysqli_connect($servername, $db_username, $password, $database);
    if (!$conn) {
        echo "Connection Failed: " . mysqli_connect_error();
    } else {
        // Store Data in Table.
        $sql = "INSERT INTO `users` (`name`, `username`, `city`, `state`, `is_checked`) VALUES ('$name', '$username', '$city', '$state', '$check')";
        $result = mysqli_query($conn, $sql);
        // if ($result) {
        //     echo "Data Submitted Successfully into the Database. <br>";
        //     echo $name . "<br>";
        //     echo $username . "<br>";
        //     echo $state . "<br>";
        //     echo $city . "<br>";
        //     echo $check . "<br>";
        // } else {
        //     echo "Data Not Submitted. <br>" . mysqli_error($conn);
        // }
        // mysqli_close($conn);
    }
    // View All Data
    // $view = "SELECT * FROM `users` WHERE `city`='lahore'";  ____________if you want to filter.
    $view = "SELECT * FROM `users`";
    $viewResult = mysqli_query($conn, $view);

    $numOfRows = mysqli_num_rows($viewResult);
    echo $numOfRows . " Records Found in DataBase. <br>";
    // var_dump($viewResult);
   if ($numOfRows > 0) {
        while ($row = mysqli_fetch_assoc($viewResult)) {
            echo "ID: " . $row['id'] .  " Name: " . $row['name'] . " Email: " . $row['username'] . " City: " . $row['city'] . " State: " . $row['state'] . " Checked: " . $row['is_checked'] . "<br>";
        }
    }

}
?>
