<?php
//  For Errors use______this.
//  error_reporting(E_ALL);
//  ini_set('display_errors', 1);
$insert = false;
$update = false;
$servername = "localhost";
$username = "root";
$password = "Bakar@786";
$database = "PHPCRUD";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    echo "Connection Failed: " . mysqli_connect_error();
}

// Edit functionality
if (isset($_GET['edit'])) {
  $editId = $_GET['edit'];
  $editData = "SELECT * FROM `informations` WHERE `id`=$editId";
  $editResult = mysqli_query($conn, $editData);
  $editRow = mysqli_fetch_assoc($editResult);
}

// Update functionality
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
  $editId = $_POST['editId'];
  $name = $_POST['name'];
  $description = $_POST['description'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $check = isset($_POST['check']) ? 1 : 0;

  $updateData = "UPDATE `informations` SET `name`='$name', `description`='$description', `city`='$city', `state`='$state', `checkbox_column`='$check' WHERE `id`='$editId'";
  $updateResult = mysqli_query($conn, $updateData);

  if ($updateResult) {
      $update = true;
  } else {
      echo "An Error Occurred. <br>" . mysqli_error($conn);
  }
}

// Save data to the database
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['update'])) {
  $name = $_POST['name'];
  $description = $_POST['description'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $check = isset($_POST['check']) ? 1 : 0;

  // Data Save in Database.
  $saveData = "INSERT INTO `informations` (`name`, `description`, `city`, `state`, `checkbox_column`) VALUES ('$name', '$description', '$city', '$state', '$check')";
  $saveDataResult = mysqli_query($conn, $saveData);
  if ($saveDataResult) {
      $insert = true;
  } else {
      echo "An Error Occurred. <br>" . mysqli_error($conn);
  }
}

// Delete functionality
if (isset($_GET['delete'])) {
    $deleteId = $_GET['delete'];
    $deleteData = "DELETE FROM `informations` WHERE `id`='$deleteId'";
    $deleteResult = mysqli_query($conn, $deleteData);

    if ($deleteResult) {
        header("Location: index.php");
        exit();
    } else {
        echo "An Error Occurred. <br>" . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>
<body>
    <div>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">PHP CRUD</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Contact us</a>
                  </li>
                </ul>
                <form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
              </div>
            </div>
        </nav>

        <?php if ($insert) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your data has been inserted successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="container mt-5 px-5">
            <h2 class="text-center"> Fill This Form </h2>
            <form class="g-3 needs-validation" novalidate action="./index.php" method="post">
            <div class="w-100">
                  <label for="validationCustom01" class="form-label"> Name</label>
                  <input type="text" class="form-control" id="validationCustom01" value="Abu Bakar" name="name" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
               
                <div class="my-3">
                    <label for="validationTextarea" class="form-label">Textarea</label>
                    <textarea class="form-control" id="validationTextarea" placeholder="Required example textarea"  name="description" required></textarea>
                    <div class="invalid-feedback">
                      Please enter a message in the textarea.
                    </div>
                  </div>
                  
                <div class="row">
                    <div class="col-8">
                        <label for="validationCustom03" class="form-label">City</label>
                        <input type="text" class="form-control" id="validationCustom03" name="city" required>
                        <div class="invalid-feedback">
                          Please provide a valid city.
                        </div>
                    </div>
                    <div class="col-4">
                      <label for="validationCustom04" class="form-label">State</label>
                      <select class="form-select" id="validationCustom04" name="state" required>
                          <option selected value="punjab"> Punjab </option>
                          <option selected value="sindh"> Sindh </option>
                          <option selected value="kpk"> KPK </option>
                          <option selected value="balochistan"> Balochistan </option>
                          <option selected value="none" disabled> None </option>
                      </select>
                      <div class="invalid-feedback">
                        Please select a valid state.
                      </div>
                    </div>

                </div>
               
                <div class="col-12 my-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck"  name="check">
                    <label class="form-check-label" for="invalidCheck">
                      Agree to terms and conditions
                    </label>
                    <div class="invalid-feedback">
                      You must agree before submitting.
                    </div>
                  </div>
                </div>

                <div class="col-12 text-center mt-3">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
            </form>

            <!-- Display data in table -->
            <table class="table table-striped mt-5" id="myTable">
                <thead>
                    <tr>
                        <th scope="col"> ID </th>
                        <th scope="col"> Name </th>
                        <th scope="col"> Description </th>
                        <th scope="col"> City </th>
                        <th scope="col"> State </th>
                        <th scope="col"> Actions </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $view = "SELECT * FROM `informations`";
                    $viewResult = mysqli_query($conn, $view);
                    $numOfRows = mysqli_num_rows($viewResult);
                    if ($numOfRows > 0) {
                        while ($row = mysqli_fetch_assoc($viewResult)) {
                            echo '<tr>
                                    <th scope="row">' . $row['id'] . '</th>
                                    <td>' . $row['name'] . '</td>
                                    <td>' . $row['description'] . '</td>
                                    <td>' . $row['city'] . '</td>
                                    <td>' . $row['state'] . '</td>
                                    <td>
                                        <a href="index.php?edit=' . $row['id'] . '" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="index.php?delete=' . $row['id'] . '" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
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


