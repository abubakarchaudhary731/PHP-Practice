<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
<!-- #PHP-->
<?php 
require "DBConnect.php";
$error = false;
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['confirmpassword'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $existSql = "SELECT * FROM `users` WHERE users_email = '$email'";
    $existResult = mysqli_query($conn, $existSql);
    $existNumRows = mysqli_num_rows($existResult);
        if ($existNumRows > 0) { 
            $error =  "Email Already Exists";
        } else {
            if ($password == $cpassword) { 
                $hash = password_hash($password, PASSWORD_BCRYPT);
                $sql = "INSERT INTO `users` (`users_email`, `users_password`, `date`) VALUES ('$email', '$hash', current_timestamp())";
                $result = mysqli_query($conn, $sql);
            } else {
                $error =  "Passwords do not match";
            }
        } 
}
?>
    <div>
    <div class="modal fade" id="signupModel" tabindex="-1" aria-labelledby="signupModelLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h1 class="modal-title fs-5" id="signupModelLabel"> Create a New Account </h1>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="mb-3">
          <label for="email" class="col-form-label">Email:</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
          <label for="password" class="col-form-label">Password:</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
          <label for="confirmpassword" class="col-form-label">Confirm Password:</label>
          <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required>
        </div>
        <?php
        if ($error) {
            echo $error;
        }
        ?>
        <hr>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Sign Up</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   
</body>
</html>
