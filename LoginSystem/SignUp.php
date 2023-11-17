<?php 
$showAlert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "Components/DB_Connect.php";
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["confirmpassword"];

    if ($password == $cpassword && $username) {
        $sql = "INSERT INTO `users` (`username`, `password`, `date_created`) VALUES ('$username', '$password', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $showAlert = true;
        }
    } else {
        $err = "Passwords do not match";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> SignUp </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
<?php 
require "Components/NavBar.php";
if ($showAlert) {
    echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your Account is now Created and you can Login.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
}
if ($err) {
    echo '  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Danger!</strong> . ' .$err.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
}
?>

    <div class="container my-5 mx-5">
        <h2 class="text-center"> Sign Up </h2>
        <div class="mx-5 px-5">
        <form class="row g-3 needs-validation" novalidate action="" method="post">
            <div class="col-12 item-center w-100">
              <label for="username" class="form-label"> Username </label>
              <div class="input-group has-validation">
                <input type="text" class="form-control" id="username" aria-describedby="inputGroupPrepend" name="username" required>
                <div class="invalid-feedback">
                  Please choose a username.
                </div>
              </div> 
            </div>
            <div class="col-12 item-center w-50">
              <label for="password" class="form-label"> Password </label>
              <div class="input-group has-validation">
                <input type="password" class="form-control" id="password" aria-describedby="inputGroupPrepend" name="password" required>
                <div class="invalid-feedback">
                Enter Your Password
            </div>
              </div>
            </div>
            <div class="col-12 item-center w-50">
              <label for="confirmpassword" class="form-label"> Confirm Password </label>
              <div class="input-group has-validation">
                <input type="password" class="form-control" id="confirmpassword" aria-describedby="inputGroupPrepend" name="confirmpassword" required>
                <div class="invalid-feedback">
                    Confirm Your Password
                </div>
              </div>
            </div>
            
            <div class="col-12 text-center mt-3">
              <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
          </form>
                
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        (() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
    </script>
</body>
</html>