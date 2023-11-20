<?php 
require "DBConnect.php";

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> View  </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <?php 
    require "NavBar.php" ?>
    <div class="container mt-5 ">
    <div class="card mb-3">
        <div class="card-body">
        <?php 
         $id = $_GET['view'];
         $sql = "SELECT * FROM `categories` WHERE `category_id` = $id";
         $result = mysqli_query($conn, $sql);
         while ($row = mysqli_fetch_assoc($result)) {
            echo 
            '<h2 class="card-title text-center">' . $row['category_name'] . '</h2>
            <p class="card-text">' . $row['category_description'] . '</p>
            <p class="card-text"><small class="text-body-secondary">' . $row['date'] . '</small></p>';
        } 
        ?>
        </div>
    </div>

    <h2 class="text-center my-5" > Browse Questions </h2>
    <?php 
    $id = $_GET['view'];
    $sql = "SELECT * FROM `threads` WHERE `thread_category_id` = $id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['thread_id'];
        $title = $row['thread_name'];
        $desc = $row['thread_description'];
        $thread_time = $row['date'];
        // $sql2 = "SELECT * FROM `users` WHERE `user_id` = $row[user_id]";
        // $result2 = mysqli_query($conn, $sql2);
        // $row2 = mysqli_fetch_assoc($result2);
        
             echo '<div class="media my-3 d-flex gap-3">
             <img src="https://source.unsplash.com/500x400/?coding" width="54px" class="mr-3 rounded-circle" alt="...">
             <div class="media-body">'.
              '<h5 class="mt-0"> <a class="text-dark" href="thread.php?threadid=' . $id. '">'. $title . ' </a></h5>
                 '. $desc . ' </div>'.'<div class="font-weight-bold my-0"> Asked by: '. $row2['user_email'] . ' at '. $thread_time. '</div>'.
            '</div>';
    }
    
    ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>