<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/footerstyle.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="css/all.min.css">
</head>

<body>


    <footer class="footer">
    <div class="l-footer">
            <h1>
                <img src="Images/logo.png" class="img-fluid rounded " style="max-width:20%;" alt="">
            </h1>
            <p><b style="color: red;">CarMax</b> is a family company, one that spans the globe and has shared ideals. We value service to each other and the world as much as to our customers.</p>
        </div>
    
        <ul class="r-footer">
            <li>
                <h2>Follow Us</h2>
                <ul class="box">
                    <li><a target="_blank" href=""><i style="color:  #149279;" class="fab fa-facebook-f"></i> Facebook</a></li>
                    <li><a target="_blank" href=""><i style="color:  #149279;" class="fab fa-twitter"></i> Twitter</a></li>
                    <li><a target="_blank" href=""><i style="color:  #149279;" class="fab fa-instagram"></i> Instagram</a></li>
                    <li><a target="_blank"href=""><i style="color:  #149279;" class="fab fa-linkedin-in"></i> Linkedin</a></li>
                </ul>
            </li>
            <li class="features">
                <h2>
                    Quick Links</h2>
                <ul class="box h-box">
                    <?PHP

                    $con = mysqli_connect('localhost', 'root', '');
                    mysqli_select_db($con, 'carmax');

                    $query = " SELECT  `QuickLinks`, `ref`, `year` FROM `footermenus` order by id ASC";

                    $queryfire = mysqli_query($con, $query);

                    $num = mysqli_num_rows($queryfire);

                    if ($num > 0) {
                        while ($products = mysqli_fetch_array($queryfire)) {
                    ?>


                            <form>

                                <li><a href="<?php echo $products['ref']; ?>"><?php echo $products['QuickLinks']; ?></a></li>

                            </form>

                           


                    <?php

                        }
                    }

                    ?>

</ul>
                
            </li>
        </ul>
      
        <div class="b-footer">

            <?PHP

            $con = mysqli_connect('localhost', 'root', '');
            mysqli_select_db($con, 'carmax');

            $query = " SELECT  `year` FROM `footermenus`  WHERE id=1";

            $queryfire = mysqli_query($con, $query);

            $num = mysqli_num_rows($queryfire);

            if ($num > 0) {

                while ($Year = mysqli_fetch_array($queryfire)) {
            ?>
                    <form>

                        <p>All rights reserved by <span><b style="color: red;">©CarMax </b></span> <?php echo $Year['year'] ?></p>

                    </form>

        


<?php

                }
            }


?>

        </div>    

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>