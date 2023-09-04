<?php

session_start();
if(!isset($_SESSION['username'])){
    header('location:Login_Page.php');
}


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center text-warning mt-5">Welcome
        <?php 
            echo $_SESSION['username']
        ?>
    </h1>

    <div class="container text-center">
        <a href="logout.php" class="btn btn-warning mt-5">Logout</a>
    </div>

  </body>
</html>