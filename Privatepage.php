<?php
include 'nav.php';
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('You need to be logged in to view this page!');location.href='login.php';</script>";
}
if (isset($_POST['enter'])) {
    $_SESSION['p_id'] = $_POST['_id'];
    $_SESSION['t_id'] = $_POST['_tbl'];
    $_SESSION['updated_price'] = $_POST['_dis'];
    header("Location:productDetails.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/cartstyle.css">

</head>

<body>

    <section class="container">
        <!-- Special Offers Section -->
        <div style="margin-top:100px ;" class="row ">
            <?PHP

            $con = mysqli_connect('localhost', 'root', '');
            mysqli_select_db($con, 'carmax');

            $query = "  SELECT  * FROM `products2` order by id ASC";

            $queryfire = mysqli_query($con, $query);

            $num = mysqli_num_rows($queryfire);

            if ($num > 0) {
                while ($products = mysqli_fetch_array($queryfire)) {
                    $n = $products['price'];
                    $d = $products['discount'];
                    $np = $n - ($n * ($d / 100));
            ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-5">

                        <form action="" method="POST">

                            <div class="card" style="width: 18rem; margin:auto;">
                                <img src="<?php echo $products['img']; ?>" class="card-img-top" alt="..." height="200px">
                                <div class="card-body mt-5">
                                    <h5 class="card-title"><?php echo $products['name']; ?></h5>
                                    <p class="card-text" style="font-weight: bold;">Price :<span style="font-weight: bold; text-decoration: line-through;">&#2547; <?php echo $products['price']; ?></span>
                                        <span style="color: red;">(<?php echo $products['discount']; ?>% off)</span>
                                    </p>
                                    <p class="card-text" style="font-weight: bold;">New Price : <span style="color: red;">&#2547; <?php echo $np; ?></span> </p>
                                    </p>
                                    <button type="submit" class="btnn2" name="enter" style="width: 100%;">Details</button>
                                    <input type="hidden" name="_id" value="<?php echo $products['id']; ?>">
                                    <input type="hidden" name="_tbl" value="<?php echo $products['tbl']; ?>">
                                    <input type="hidden" name="_dis" value="<?php echo $np; ?>">
                                </div>
                            </div>


                        </form>

                    </div>


            <?php

                }
            }

            ?>

        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
<!-- Footer Section -->
<footer>
    <?php

    include 'footer.php';

    ?>
</footer>

</html>