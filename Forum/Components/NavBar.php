<?php 
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $loggedin = true;
} else {
    $loggedin = false;
}

echo
'<nav class="navbar navbar-expand-lg bg-body-tertiary">
<div class="container-fluid">
  <a class="navbar-brand" href="./index.php"> Forum </a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Top Categories
        </a>
        <ul class="dropdown-menu">';
        $sql = "SELECT * FROM `categories` LIMIT 4";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) { 
          while ($row = mysqli_fetch_array($result)) {
            echo '<li><a class="dropdown-item" href="./View.php?view=' . $row['category_id'] . '">' . $row['category_name'] . '</a></li>';
          }
        } else {
          echo '<li><a class="dropdown-item" href="#">No Categories Found</a></li>';
        };         
  echo '</ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="./contact.php">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" aria-disabled="true">About</a>
      </li>
    </ul>
    <div class="d-flex gap-3">
        <form class="d-flex" role="search" action="./search.php" method="get">
            <input class="form-control me-2" name="search" type="search" placeholder="Search any Question" aria-label="Search">
            <button class="btn btn-success" type="submit">Search</button>
        </form>';
        if (!$loggedin) {
            echo 
            '<button class="btn btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#loginModel"> Login </button>
            <button class="btn btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#signupModel"> Sign Up </button>';
        }; 
        if ($loggedin) {
            echo 
            '<p class="my-auto"> Welcome ' . $_SESSION['email'] . ' </p>
            <a href="./Logout.php" class="btn btn btn-outline-danger"> Logout </a>';
        };
echo '</div>
    </div>
  </div>
</div>
</nav>';
require "Login.php";
require "Signup.php";
?>
