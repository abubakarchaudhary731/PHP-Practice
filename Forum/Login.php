<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Login  </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
<!-- PHP Code -->
<?php 
$err = "";
require "Components/DBConnect.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$email = $_POST['email'];
$password = $_POST['password'];

    if ($password && $email) {
    $sql = "SELECT * FROM `users` WHERE `users_email` = '$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
        if ($num == 1 ) {
        while ($row = mysqli_fetch_array($result)) { 
            if (password_verify($password, $row["users_password"])) {
                session_start();
                $_SESSION["loggedin"] = true;
                $_SESSION["user_id"] = $row["users_id"];
                $_SESSION["email"] = $email;
                header("Location: index.php");
            } else { 
                $err = "Password is Incorrect";
            }
    }}  else {
            $err = "Invalid Username";
    }} else {
       $err = "Fill These Fields";
    }

}

?>
  <div class="modal fade" id="loginModel" tabindex="-1" aria-labelledby="loginModelLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="loginModelLabel"> Login </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <div class="mb-3">
            <label for="email" class="col-form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" >
          </div>
          <div class="mb-3">
            <label for="password" class="col-form-label">Password:</label>
            <input type="password" class="form-control" id="password" name="password" >
          </div>
          <?php
            if ($error) {
                echo $error;
            }
          ?>
          <hr>
          <div class="text-center">
            <button type="submit" class="btn btn-primary"> Login </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>