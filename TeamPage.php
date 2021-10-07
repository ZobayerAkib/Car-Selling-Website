<?php
include 'nav.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Team Page</title>
  <link rel="stylesheet" href="css/teamPage.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">




</head>

<body>
  <!-- Team page section -->
  <section class="container">

    <div class="title  d-flex justify-content-center">
      <h3 style="top: 20px;margin-top: 50px; color: cornflowerblue;">Meet Our</h3>
    </div>

    <div class="title-name d-flex justify-content-center">
      <h1 style="left:10px ;text-decoration: underline cornflowerblue;"><b style="color: cornflowerblue;">TEAM</b></h1>
    </div>

  </section>

  <div style="margin-top:100px ;" class="row ">

    <?PHP

    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'carmax');


    $query = "SELECT  `name`, `images`, `title`, `email`, `link1`, `link2` FROM `teammembers` order by id ASC";

    $queryfire = mysqli_query($con, $query);

    $num = mysqli_num_rows($queryfire);

    if ($num > 0) {
      while ($products = mysqli_fetch_array($queryfire)) {
    ?>
        <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center mb-5">

          <form>

            <!-- Team Members Card Section -->
            <div class="card " id="cards" style="width: 350px;">
              <img src="<?php echo $products['images']; ?>" class="card-img-top img-fluid" alt="...">

              <div class="card-body">
                <h5 class="card-title " style="color: black;"><?php echo $products['name']; ?></h5>
                <p class="card-text"><?php echo $products['title']; ?> </p>
                <p>Email: <b><?php echo $products['email']; ?></b></p>
              </div>
              <div class="card-footer">
                <div class="row justify-content-center">
                  <div class="col-3 d-flex justify-content-center">
                    <a target="_blank" href="<?php echo $products['link1']; ?>"><span style="font-size: 25px;"><i class="fab fa-facebook"></i></span></a>
                  </div>
                  <div class="col-3 d-flex justify-content-center ">
                    <a target="_blank" href="<?php echo $products['link2']; ?>"><span style="font-size: 25px;"><i class="fab fa-linkedin"></i></span></a>
                  </div>
                </div>
              </div>
            </div>



          </form>

        </div>


    <?php

      }
    }

    ?>

  </div>



  <!-- Footer Section -->
  <footer>
    <?php

    include 'footer.php';

    ?>
  </footer>





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>