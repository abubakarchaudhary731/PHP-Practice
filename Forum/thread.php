<?php 
require "Components/DBConnect.php";
// if (!isset($_SESSION) || $_SESSION['loggedin'] != true) {
//   header("location: login.php");
//   exit;
// }
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
    require "Components/NavBar.php" ?>
    <div class="container mt-5 ">
        <?php 
         $id = $_GET['threadid'];
         $sql = "SELECT * FROM `threads` WHERE `thread_id` = $id";
         $result = mysqli_query($conn, $sql);
         while ($row = mysqli_fetch_assoc($result)) {
            echo 
            '<div class="jumbotron jumbotron-fluid">
                <div class="container bg-light p-4 rounded-4">
                  <h1 class="display-4">Question: ' . $row['thread_name'] . '</h1>
                  <p class="lead"><b> Description: </b>' . $row['thread_description'] . '</p>
                  <p class="lead"><small class="text-body-secondary">' . $row['date'] . '</small></p>
                </div>
            </div>';
        } 
        ?>
    <!-- Post a Comment  -->
    <?php 
    $id = $_GET['threadid'];
    $comment = $_POST['desc'];
    $thread_id = $id;
    $comment_user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    // echo $comment_user_id;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $sql = "INSERT INTO `comments` (`comment_content`, `comment_thread_id`, `comment_user_id`, `comment_time`) VALUES ('$comment', '$thread_id', '$comment_user_id', current_timestamp())";
      $result = mysqli_query($conn, $sql);
      if (!$result) {
        $err =  "Error: "  . mysqli_error($conn);
      }
    }
    ?>
    <h2 class="my-3"> Post a Comment </h2>
    <div class="border border-1 p-3 rounded-3">
      <?php 
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '<form action="" method="POST">
        <textarea name="desc" id="desc" class="form-control my-3" cols="30" rows="4" placeholder="Enter Your Comment"></textarea>
        <button class="btn btn-success" type="submit">Comment</button>
        <small> <?php  echo $err ?></small>
      </form>';

      } else {
        echo 'Please <b>Login</b> to Comment';
      }
      ?>
    </div>
    
    <hr>
    <?php 
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `comments` WHERE `comment_thread_id` = $id";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['comment_id'];
        $title = $row['comment_content'];
        $comment_time = $row['comment_time'];
        $sql2 = "SELECT * FROM `users` WHERE `users_id` = $row[comment_user_id]";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
          echo 
          '<div class="media d-flex gap-3 my-2">
              <img class="align-self-start mr-3 rounded-circle" src="https://source.unsplash.com/500x400/?coding" width="60px" height="60px" alt="Generic placeholder image">
              <div class="media-body flex-grow-1">
                <div class="d-flex justify-content-between">
                  <h5> <b>'. $row2['users_email'] . '</b></h5>
                  <i> <small> At: '. $comment_time. ' </small></i>
                </div>
              <p>'. $title . '</p>
              </div>
          </div>';
    }
    } else {
      echo '<div class="p-4 bg-light w-100 rounded-4 text-center">
              <h2>No Comments Found </h2>
              <p>Be the First Person to Comment for this question.</p>
            </div>';
    }
    
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>