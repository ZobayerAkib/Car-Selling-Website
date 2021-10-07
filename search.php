<?php
include 'nav.php';
include 'connect.php';
$text =  $_SESSION['_search'];
$sql0 = "select *from products where name like '%$text%'";
$result0 = mysqli_query($conn, $sql0);
$count = $result0->num_rows;
if (isset($_SESSION['user_id'])) {
    $sql1 = "select *from products2 where name like '%$text%'";
    $result1 = mysqli_query($conn, $sql1);
    $count1 = $result1->num_rows;
    $count = $count + $count1;
}

if (isset($_POST['enter_search'])) {
    $_SESSION['p_id'] = $_POST['_id'];
    $_SESSION['t_id'] = $_POST['_tbl'];
    $_SESSION['updated_price'] = $_POST['_dis'];
    header("Location:productDetails.php");
}

$n = 1;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/searchstyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">



    <title>Search</title>
</head>

<body>
    <!-- Search Section -->
    <section class="container">
        <p class="mt-5" style="font-size: 20px;font-weight:bold;text-align: center;color:red;">There is <?php echo $count ?> results of your search</p>

        <div style="margin-top:100px ;" class="row">
            <!-- Search for all model car section -->

            <?php
            $sql = "select *from products where name like '%$text%'";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($result)) {


            ?>

                <div class="col-lg-4 col-md-6 col-sm-12 mb-5">

                    <form action="" method="POST">

                        <div class="card " style="width: 18rem;margin:auto;">
                            <img src="<?php echo $row['img']; ?>" class="card-img-top" alt="..." height="200px">
                            <div class="card-body mt-5">
                                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                <p class="card-text" style="font-weight: bold;">Price : <b>&#2547;</b> <?php echo $row['price']; ?>

                                </p>


                                <button type="submit" class="btnn2" name="enter_search" style="width: 100%;">Details</button>
                                <input type="hidden" name="_id" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name="_tbl" value="<?php echo $row['tbl']; ?>">
                            </div>
                        </div>


                    </form>

                </div>


            <?php



            }

            ?>



            <!-- Search for Special offers car section -->
            <?php
            if (isset($_SESSION['user_id'])) {

                $sql = "select *from products2 where name like '%$text%'";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($result)) {
                    $n = $row['price'];
                    $d = $row['discount'];
                    $np = $n - ($n * ($d / 100));

            ?>

                    <div class="col-lg-4 col-md-6 col-sm-12 mb-5">

                        <form action="" method="POST">

                            <div class="card" style="width: 18rem;margin:auto;">
                                <img src="<?php echo $row['img']; ?>" class="card-img-top" alt="..." height="200px">
                                <div class="card-body mt-5">
                                    <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                    <p class="card-text" style="font-weight: bold;">Price :<span style="font-weight: bold; text-decoration: line-through;color:red">&#2547; <?php echo $row['price']; ?></span>
                                        <span>(<?php echo $row['discount']; ?>% off)</span>
                                    </p>
                                    <p class="card-text" style="font-weight: bold;">New Price : <span>&#2547; <?php echo $np; ?></span> </p>
                                    </p>
                                    <button type="submit" class="btnn2" name="enter_search" style="width: 100%;">Details</button>
                                    <input type="hidden" name="_id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="_tbl" value="<?php echo $row['tbl']; ?>">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>