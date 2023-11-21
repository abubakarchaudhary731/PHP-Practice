<?php 
require "Components/DBConnect.php";
// if (!isset($_SESSION) || $_SESSION['loggedin'] != true) {
//   header("location: Components/login.php");
//   exit;
// }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> FORUM </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <?php 
    require "Components/NavBar.php" ;
    require "Components/Crausal.php";
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    ?>
    <div class="container mt-3">
      <h1 class="text-center"> iForum -Browse Categories</h1>
      <div class="d-flex justify-content-between flex-wrap">
      <?php 
    $sql = "SELECT * FROM `categories`";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_array($result)) { ?>
        <div class="card my-3" style="width: 18rem;">
            <img src="https://source.unsplash.com/500x400/?coding" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="./View.php?view=<?php echo $row['category_id']; ?>">
                        <?php echo $row['category_name']; ?>
                    </a>
                </h5>
                <p class="card-text">
                    <?php echo substr($row['category_description'], 0, 100) . '...'; ?>
                </p>
                <a href="./View.php?view=<?php echo $row['category_id']; ?>" class="btn btn-primary"> View </a>
            </div>
        </div>
<?php
    }
?>

      </div> 
          
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>