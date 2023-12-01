<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Search </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <?php
    require "Components/DBConnect.php";
    require "Components/NavBar.php";
    ?>
    <div class="container my-5">
      <h1 class="text-center"> Search Reasult <em>"<?php echo $_GET['search']; ?>"</em></h1>
      <?php 
      $search = $_GET['search'];
      $sql = "SELECT * FROM `threads` WHERE MATCH (`thread_name`, `thread_description`) AGAINST ('$search')";
      $result = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($result);
      if (!$result) {
        echo "Error: " . mysqli_error($conn);
      } else {
        if ($num > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo
            '<div>
                <h4><b><a class="text-dark" href="./thread.php?threadid= '. $row['thread_id'] .' ">' . $row['thread_name'] . '</a></b></h4>
                <p>' . $row['thread_description'] . '</p>
            </div>';
          }
        } else {
          echo "No result found";
          
        }
      }
     
      ?>
      
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>