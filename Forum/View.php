<?php 
require "Components/DBConnect.php";
session_start(); // Start the session

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php require "Components/NavBar.php" ?>
    <div class="container mt-5">
        <?php 
        $id = $_GET['view'];
        $sql = "SELECT * FROM `categories` WHERE `category_id` = $id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo
            '<div class="jumbotron bg-light p-5 rounded-4 text-center">
                <h1 class="display-4 text-center"> Welcome to ' . $row['category_name'] . ' Forum</h1>
                <p class="lead text-center">' . $row['category_description'] . '</p>
                <hr class="my-4">
                <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                <p class="lead">
                    <small>' . $row['date'] . '</small>
                </p>
            </div>';
        } 
        ?>

        <!-- Form  -->
        <?php 
        $id = $_GET['view'];
        $err = '';

        if (isset($_POST['name'])) {
            $title = $_POST['name'];
            $desc = $_POST['desc'];
            $cat_id = $id;
            $thread_user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
            // echo $thread_user_id;
            if ($thread_user_id !== null) {
                $sql = "INSERT INTO `threads` (`thread_name`, `thread_description`, `thread_category_id`, `thread_user_id`, `date`) VALUES ('$title', '$desc', '$cat_id', '$thread_user_id', current_timestamp())";
                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    $err = "Error: "  . mysqli_error($conn);
                }
            } else {
                $err = "Error: User not logged in because its id not found.";
            }
        }
        ?>

        <h2 class="my-3"> Ask Question: </h2>
        <div class="border border-1 p-3 rounded-3">
            <?php 
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo '<form action="" method="POST">
                    <input type="text" name="name" class="form-control" placeholder="Enter Your Question" required>
                    <textarea name="desc" id="desc" class="form-control my-3" cols="30" rows="4" placeholder="Describe Your Question"></textarea>
                    <button class="btn btn-success" type="submit">Submit</button>
                    <small>' . $err . '</small>
                </form>';
            } else {
                echo '<p class="my-auto">Please <b>Login</b> to Ask Question</p>';
            }
            ?>
        </div>

        <hr>

        <h2 class="my-4"> Browse Questions </h2>

        <?php 
        $id = $_GET['view'];
        $sql = "SELECT * FROM `threads` WHERE `thread_category_id` = $id";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['thread_id'];
                $title = $row['thread_name'];
                $desc = $row['thread_description'];
                $thread_time = $row['date'];
                $pre = $row['thread_user_id'];
    
                $sql2 = "SELECT * FROM `users` WHERE `users_id` = $pre"; 
                $result2 = mysqli_query($conn, $sql2);
            
                if (!$result2) {
                    echo "Error: " . mysqli_error($conn);
                } else {
                    $row2 = mysqli_fetch_assoc($result2);
                    if ($row2) {
                        echo 
                        '<div class="media d-flex gap-3 my-2">
                            <img class="align-self-start mr-3 rounded-circle" src="https://source.unsplash.com/500x400/?coding" width="60px" height="60px" alt="Generic placeholder image">
                            <div class="media-body flex-grow-1">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <b> Asked by: ' . $row2['users_email'] . ' </b>
                                        <h5><b><a class="text-dark nounderline" href="thread.php?threadid=' . $id . '">' . $title . '</a></b></h5>
                                    </div>
                                    <i><small> At: ' . $thread_time . ' </small></i>
                                </div>
                                <p> ' . $desc . '</p>
                            </div>
                        </div>';
                    } else {
                        echo "No data found for user with ID: $pre";
                    }
                }
            }
        } else {
            echo '<div class="p-4 bg-light w-100 rounded-4 text-center">
                    <h2>No Data Found </h2>
                    <p>Be the First Person to ask the question.</p>
                </div>';
        }
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
