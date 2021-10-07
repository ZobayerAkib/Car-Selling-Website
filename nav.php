<?php
session_start();
include 'connect.php';

$sql0 = "select *from nav";
$result0 = mysqli_query($conn, $sql0);
$count = $result0->num_rows;
$id = 1;
$titleQ = mysqli_query($conn, "select *from nav where id=1");
$title = mysqli_fetch_array($titleQ);
if (isset($_POST['nav_submit'])) {
  $_SESSION['_search'] = $_POST['search'];
  header("Location:search.php");
}

?>

<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/nav.css">
  <title></title>
</head>

<body>
  <!-- Nav-ber Section -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <h1><a class="navbar-brand brndName" href="index.php"><?php echo $title['db'] ?></a></h1>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="form-inline my-2 my-lg-0" method="POST">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="nav_submit">Search</button>
      </form>
      <ul class="navbar-nav mr-auto mleft">


        <?php
        while ($count) {
          $sql = "select *from nav where id='$id'";
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_array($result);
        ?>

          <li class="nav-item">
            <?php
            if (!isset($_SESSION['user_id']) && $id == 7) {
            ?>
              <a class="nav-link nItem" href="<?php echo $row['link'] ?>" style="font-size: large;margin-top: 5px;">Sign In</a>
            <?php

            } else {
            ?>
              <a class="nav-link nItem" href="<?php echo $row['link'] ?>" style="font-size: large;margin-top: 5px;"><?php echo $row['title'] ?></a>
            <?php

            }

            ?>

          </li>

        <?php
          $count--;
          $id++;
        }

        ?>

      </ul>

    </div>
  </nav>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>