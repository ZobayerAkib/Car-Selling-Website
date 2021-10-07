<?php
include("connect.php");
include 'nav.php';
extract($_POST);
if (isset($_POST['submit'])) {
    $query = "INSERT INTO `contactus`( `name`, `email`, `message`)  VALUES ('" . $name . "','" . $email . "','" . $message . "')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Mail Send.');location.href='contactUs.php';</script>";
    } else {
        echo "<script>alert('Mail Not Send.');location.href='contactUs.php';</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/contactStyle.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <section class="contact" style="background-image: url(images/backg.jpg);">
        <div class="content">
            <h2><b>Contact Us</b></h2>

        </div>
        <div class="container">
            <!--Contact Info Section -->
            <div class="contactinfo">
                <div class="box">
                    <div class="icon">
                        <i class="far fa-address-card"></i>
                    </div>
                    <div class="text">
                        <h3>Address</h3>
                        <p>215/4/A Rampura Road, <br>Rampura,Dhaka-1219</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>Example@gmail.com</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <div class="text">
                        <h3>Phone</h3>
                        <p>01765243765</p>
                    </div>
                </div>

                <div class="social-media">
                    <p>Connect with us :</p>
                    <div class="social-icons">
                        <a target="_blank" href="#https://www.facebook.com/">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a target="_blank" href="#https://twitter.com/i/flow/login?input_flow_data=%7B%22requested_variant%22%3A%22eyJsYW5nIjoiZW4ifQ%3D%3D%22%7D">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a target="_blank" href="#https://www.instagram.com/accounts/login/">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a target="_blank" href="#https://www.linkedin.com/login">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!--Contact Form Section -->
            <div class="contactform">

                <form action="" method="post" autocomplete="off">
                    <h2 class="title">Send us Message</h2>
                    <div class="input-container">
                        <input type="text" name="name" class="input" />

                        <span><b style="color: red;">*</b>Username :</span>
                    </div>
                    <div class="input-container">
                        <input type="email" name="email" class="input" />

                        <span><b style="color: red;">*</b>Email :</span>
                    </div>

                    <div class="input-container textarea">
                        <textarea rows="6" name="message" class="input"></textarea>

                        <span>Type a Message :</span>
                    </div>
                    <div class="input-container textarea" id="SendBtn">
                        <input style="width: 50%;" type="submit" name="submit" value="Send" class="btn" />
                    </div>

                </form>
            </div>
        </div>

    </section>
    <section>

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.5386203568683!2d90.40448511429722!3d23.763826894181662!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c77decb5f845%3A0xc2eadd2f3b867792!2sAhsanullah%20University%20of%20Science%20and%20Technology!5e0!3m2!1sen!2sbd!4v1633416800163!5m2!1sen!2sbd" width="100%" height="320" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </section>
    <!--Footer Section -->
    <footer>
        <?php

        include 'footer.php';

        ?>
    </footer>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>