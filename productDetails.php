<?php
include 'nav.php';



$id = $_SESSION['p_id'];
$tbl =  $_SESSION['t_id'];

if ($_SESSION['t_id'] == 'normal') {
    $sql = "select *from products where id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if (isset($_POST['submit_car'])) {
        if (!isset($_SESSION['user_id'])) {
            echo "<script>alert('Please login first');location.href='login.php';</script";
        } else {

            $uId = $_SESSION['user_id'];
            $uEmail = $_SESSION['user_email'];
            $uPhone = $_SESSION['user_phone'];
            $carName = $row['name'];

            $carPrice = $row['price'];


            $sqlInsert = "insert into order_cars (user_id,email,phone,car_id,car_name,car_price) values('$uId','$uEmail',' $uPhone','$id','$carName','$carPrice')";
            $resultIns = mysqli_query($conn, $sqlInsert);
            if ($resultIns) {
                echo "<script>alert('your data has been stored. We will contact with you soon. Thanks for being with us.');location.href='productDetails.php';</script";
            } else {
                echo "<script>alert('Something went wrong!')</script>";
            }
        }
    }
}
if ($_SESSION['t_id'] == 'private') {
    $sql = "select *from products2 where id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $uPrice = $_SESSION['updated_price'];

    if (isset($_POST['submit_car'])) {
        if (!isset($_SESSION['user_id'])) {
            echo "<script>alert('Please login first');location.href='login.php';</script";
        } else {

            $uId = $_SESSION['user_id'];
            $uEmail = $_SESSION['user_email'];
            $uPhone = $_SESSION['user_phone'];
            $carName = $row['name'];

            $carPrice = $_SESSION['updated_price'];


            $sqlInsert = "insert into order_cars (user_id,email,phone,car_id,car_name,car_price) values('$uId','$uEmail',' $uPhone','$id','$carName','$carPrice')";
            $resultIns = mysqli_query($conn, $sqlInsert);
            if ($resultIns) {
                echo "<script>alert('Your data has been stored. We will contact with you soon. Thanks for being with us.');location.href='productDetails.php';</script";
            } else {
                echo "<script>alert('Something went wrong!')</script>";
            }
        }
    }
}






?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/reg.css">


    <title>Login</title>
</head>

<body>
    <!--Product Details Section -->
    <div class="container" style="margin-top: 80px;margin-bottom:80px;box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);border-radius:5px;">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-6">
                    <img class="card-img" src="<?php echo $row['img'] ?>" alt="Card image" style="padding-left:10px;padding-right:10px;" height="430px">

                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h3 class="card-title" style="text-align: center;"><?php echo $row['name'] ?></h3>
                        <ul class="list-group list-group-flush" style="margin-top: 30px;">
                            <li class="list-group-item d-inline-flex">
                                <p class="card-text" style="font-size:20px;font-weight:bolder;margin-right:50px;">Brand:</p>
                                <p class="card-text" style="font-size:20px;"><?php echo $row['brand'] ?></p>
                            </li>
                            <li class="list-group-item d-inline-flex">
                                <p class="card-text" style="font-size:20px;font-weight:bolder;margin-right:46px;">Model:</p>
                                <p class="card-text" style="font-size:20px;"><?php echo $row['model'] ?></p>
                            </li>
                            <li class="list-group-item d-inline-flex">
                                <p class="card-text" style="font-size:20px;font-weight:bolder;margin-right:66px;">Year:</p>
                                <p class="card-text" style="font-size:20px;"><?php echo $row['year'] ?></p>
                            </li>

                            <li class="list-group-item d-inline-flex">
                                <p class="card-text" style="font-size:20px;font-weight:bolder;margin-right:60px;">Price:</p>

                                <?php
                                if ($tbl == 'normal') {

                                ?>
                                    <p class="card-text" style="font-size:20px;font-weight: bold;color:red;"><?php echo $row['price'] ?> tk</p>
                                <?php

                                }
                                if ($tbl == 'private') {

                                ?>
                                    <p class="card-text" style="font-size:20px;margin-right:10px;font-weight: bold;text-decoration: line-through;"><?php echo $row['price'] ?> tk</p>
                                    <p class="card-text" style="font-size:20px;font-weight: bold;color:red;"><?php echo $uPrice ?> tk</p>
                                <?php

                                }
                                ?>

                            </li>
                        </ul>



                        <form action="" method="POST" class="">
                            <div class="input-group d-flex justify-content-center" style="margin-top: 30px;">
                                <button name="submit_car" class="btn btn-success btn-lg" style="width: 390px;">Buy Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" style="text-align: center;font-size:20px;font-weight:bold;">
                About This Car
            </div>
            <ul class="list-group list-group-flush" style="font-size:20px;">
                <li class="list-group-item d-inline-flex" style="text-align: center;">

                    <label style="margin-right: 130px;font-weight:bolder;">Max Power</label>
                    <p><?php echo $row['Max Power'] ?></p>

                </li>
                <li class="list-group-item d-inline-flex" style="text-align: center;">

                    <label style="margin-right: 80px;font-weight:bolder;">Seating Capacity</label>
                    <p><?php echo $row['Seating Capacity'] ?></p>

                </li>
                <li class="list-group-item d-inline-flex" style="text-align: center;">

                    <label style="margin-right: 140px;font-weight:bolder;">Body Type</label>
                    <p><?php echo $row['Body Type'] ?></p>

                </li>
                <li class="list-group-item d-inline-flex" style="text-align: center;">

                    <label style="margin-right: 150px;font-weight:bolder;">Fuel Type</label>
                    <p><?php echo $row['Fuel Type'] ?></p>

                </li>
                <li class="list-group-item d-inline-flex" style="text-align: center;">

                    <label style="margin-right: 99px;font-weight:bolder;">No. of Cylinder</label>
                    <p><?php echo $row['No. of Cylinder'] ?></p>

                </li>
                <li class="list-group-item d-inline-flex" style="text-align: center;">

                    <label style="margin-right: 192px;font-weight:bolder;">Color</label>
                    <p><?php echo $row['Color'] ?></p>

                </li>
                <li class="list-group-item d-inline-flex" style="text-align: center;">

                    <label style="margin-right: 129px;font-weight:bolder;">Engine Type</label>
                    <p><?php echo $row['Engine Type'] ?></p>

                </li>
                <li class="list-group-item d-inline-flex" style="text-align: center;">

                    <label style="margin-right: 46px;font-weight:bolder;">Engine Displacement</label>
                    <p><?php echo $row['Engine Displacement'] ?></p>

                </li>
            </ul>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>
<!-- Footer Section -->
<?php
include 'footer.php';
?>