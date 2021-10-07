<?php
include 'nav.php';

if (isset($_POST['enter'])) {
  $_SESSION['p_id'] = $_POST['_id'];
  $_SESSION['t_id'] = $_POST['_tbl'];
  header("Location:productDetails.php");
}
include "connect.php";
$sql1 = "select *from banner where id='1'";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($result1);
$sql2 = "select *from banner where id='2'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($result2);
$sql3 = "select *from banner where id='3'";
$result3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_array($result3);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/Homepage.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Homepage</title>
</head>

<body>

  <!-- Banner Section -->
  <section class="home" id="home">
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
          <img src="<?php echo $row1['img']; ?>" class="w-100 img-fluid" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5 style="color:#149279; font-size:30px;"><?php echo $row1['Title']; ?></h5>
            <p style="color: white;"><?php echo $row1['discription']; ?></p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img src="<?php echo $row2['img']; ?>" class=" w-100 img-fluid" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5 style="color:#149279; font-size:30px;"><?php echo $row2['Title']; ?></h5>
            <p style="color: white;"><?php echo $row2['discription']; ?></p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="<?php echo $row3['img']; ?>" class="h-80 img-fluid" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5 style="color:#149279; font-size:30px;"><?php echo $row3['Title']; ?></h5>
            <p style="color: white;"><?php echo $row3['discription']; ?></p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <a style="padding-top: 10px;margin-bottom:50px" href="#card" class="btnn">Explore Cars</a>

  </section>

  <!-- Icon Section -->

  <section class="Icon ">
    <div class="container">

      <div class="row card-group">
        <?PHP

        $con = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($con, 'carmax');

        $query = " SELECT  `icon`, `title`, `discription` FROM `hometopicon` order by id ASC";

        $queryfire = mysqli_query($con, $query);

        $num = mysqli_num_rows($queryfire);

        if ($num > 0) {
          while ($products = mysqli_fetch_array($queryfire)) {
        ?>
            <div class="col-lg-4 col-md-6  mb-5 ">

              <form>
                <div class="icon_box one">
                  <div class="icon">
                    <i class="<?php echo $products['icon']; ?>"></i>
                  </div>
                  <h4 class="Title" style="color: tomato;"><?php echo $products['title']; ?></h4>
                  <p class="discription"><?php echo $products['discription']; ?></p>
                </div>

              </form>

            </div>


        <?php

          }
        }

        ?>
      </div>
    </div>
  </section>





  <!-- Car model Section -->
  <section class="container ">

    <div class="title  d-flex justify-content-center" id="card">
      <h3 style="top: 20px;margin-top: 50px; color: #149279;font-weight:bold">ALL CAR MODELS</h3>
    </div>


    <div style="margin-top:100px ;" class="row cars">
      <?PHP
      $n = 3;
      $con = mysqli_connect('localhost', 'root', '');
      mysqli_select_db($con, 'carmax');

      $query = "  SELECT  * FROM `products` order by id ASC";

      $queryfire = mysqli_query($con, $query);

      $num = mysqli_num_rows($queryfire);

      if ($num > 0) {
        while ($n) {
          $products = mysqli_fetch_array($queryfire)
      ?>
          <div class="col col-lg-4 col-md-6 col-sm-12 mb-5 " style="width:300px;margin:auto;">

            <form action="" method="POST">

              <div class="card " style="width:325px;margin:auto">
                <img src="<?php echo $products['img']; ?>" class="card-img-top" alt="..." height="200px">
                <div class="card-body mt-5">
                  <h5 class="card-title"><?php echo $products['name']; ?></h5>
                  <p class="card-text" style="font-weight: bold;">Price : &#2547; <?php echo $products['price']; ?>

                  </p>
                  <button type="submit" class="btnn2" name="enter">Details</button>
                  <input type="hidden" name="_id" value="<?php echo $products['id']; ?>">
                  <input type="hidden" name="_tbl" value="<?php echo $products['tbl']; ?>">
                </div>
              </div>


            </form>

          </div>


      <?php
          $n--;
        }
      }

      ?>
    </div>

    <div class="container mt-5" style="padding-top: 10px;">
      <a style="padding-top: 10px;margin-bottom:50px" href="Cart.php" class="btnn3">See All Vehicles</a>
    </div>
  </section>

  <!-- Service Section -->
  <section class="services">
    <div class="container">
      <div class="heading mt-5">
        <h2>Our Services</h2>
      </div>

      <div class="row">
        <?PHP

        $con = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($con, 'carmax');

        $query = " SELECT  `icon`, `title`, `discription` FROM `servicesection` order by id ASC";

        $queryfire = mysqli_query($con, $query);

        $num = mysqli_num_rows($queryfire);

        if ($num > 0) {
          while ($products = mysqli_fetch_array($queryfire)) {
        ?>
            <div class="col-lg-4 col-md-6 d-flex align-item-center mb-5 mt-5">

              <form>
                <div class="icon_box one">
                  <div class="icon">
                    <i class="<?php echo $products['icon']; ?>"></i>
                  </div>
                  <h4 class="Title" style="color: tomato;"><?php echo $products['title']; ?></h4>
                  <p class="discription"><?php echo $products['discription']; ?></p>
                </div>

              </form>

            </div>


        <?php

          }
        }

        ?>

      </div>
    </div>
  </section>
  <!---Footer Section ----->
  <footer class="mt-5">
    <?php

    include 'footer.php';

    ?>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>