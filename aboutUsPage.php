<?php
include 'nav.php';

include "connect.php";
$sql = "SELECT `img` FROM `banner` where id=5  ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>

  <link rel="stylesheet" href="css/aboutuspage.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

  <!--Banner Section -->
  <section class="home">
    <img src="<?php echo $row['img']; ?>" class="img-fluid" alt="...">

  </section>

  <!--About Us Section -->
  <section class="container">
    <div class="about-us">
      <h1 class="title">About Us</h1>
    </div>
    <div class="row">
      <div class="col-12 col-md-6  text">
        <h5><b style="color: red;">CarMax</b> is a family company, one that spans the globe and has shared ideals. We
          value service to each other and the world as much as to our customers. Generations have made their memories
          with us and included us in their hopes and dreams. After 117 years, we’re used to adapting to and leading
          change. That’s why we’re evolving to focus on services, experiences and software as well as vehicles.</h5>
      </div>
      <div class="col-6 col-md-4"></div>
    </div>

  </section>

  <!--Our Purpose Section -->
  <section class="ourpurpose container">
    <div class="row g-0">
      <div class="ourpurpose col-md-5 col-sm-12 ">
        <img class="car-img img-fluid img-responsive" src="images/2nd.jpeg" alt="">
      </div>


      <div class="col-md-7 col-sm-12">
        <div style="margin-top: 50px;">

          <div class="title" style="color: gray;">
            <h1>Our Purpose</h1>
          </div>

          <div class="text">
            <h5>We are here for one purpose, to help build a better world, where every person is free to move and pursue
              their dreams. To help build a better world, where every person is free to move and pursue their dreams.We believe in the power of creating a world with fewer obstacles and limits. </h5>
          </div>
        </div>
      </div>
    </div>

  </section>
  <!--Our Leadership Section -->
  <section class="container">
    <div class="row g-0">

      <div class=" col-md-6 col-sm-12 ">
        <div style="margin-top: 50px;">

          <div class="title" style="color: gray;">
            <h1>OUR LEADERSHIP</h1>
          </div>

          <div class="text">
            <h5>With the people of Ford around the world, our leadership is committed to serving all of our stakeholder
              groups. Like generations of leaders before them, they understand that by helping to create a world with
              fewer obstacles and limits, we help people to move forward and upward. </h5>
          </div>
        </div>
      </div>

      <div class="ourpurpose col-md-6 col-sm-12 " style="margin-top: 50px;">
        <img class="img-fluid" src="images/leaqder.jpeg" alt="">
      </div>
    </div>

  </section>


  <!--Our Culture Section -->
  <section class="ourpurpose container">
    <div class="row g-0">
      <div class="ourpurpose col-md-5 col-sm-12">
        <img class="img-fluid" src="images/ourculture.jpg" alt="">
      </div>


      <div class="col-md-7 col-sm-12 ">
        <div style="margin-top: 50px;">

          <div class="title" style="color: gray;">
            <h1>OUR CULTURE</h1>
          </div>

          <div class="text">
            <h5>Ford is a family company in more ways than one. The culture is anchored in shared beliefs and ideals,
              acting for the common good. As an organization, Ford believes everyone should have the freedom to move and
              pursue their dreams, and seeks to create a culture of belonging for every employee.

            </h5>
          </div>
        </div>
      </div>
    </div>

  </section>



  <div>

  </div>
  <!--Footer Section-->
  <footer>
    <?php

    include 'footer.php';

    ?>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>