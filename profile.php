<?php

include 'nav.php';
include 'connect.php';
if (!isset($_SESSION['user_id'])) {
    header("Location:login.php");
}
$id = $_SESSION['user_id'];
$sql = "select *from login where id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$uname = $row['username'];
$eml = $row['email'];
$phn = $row['phone'];

if (isset($_POST['edit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $cpassword = md5($_POST['cpassword']);
    $npassword = md5($_POST['npassword']);

    $sqlChk = "select *from login where id='$id' and password='$cpassword'";
    $resutlChk = mysqli_query($conn, $sqlChk);
    if ($resutlChk->num_rows > 0) {
        if ($npassword == 'd41d8cd98f00b204e9800998ecf8427e') {
            $sql = "update login set username='$username',email='$email',phone='$phone',password='$cpassword' where id='$id'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Updated');location.href='profile.php';</script";
            }
        } else {

            $sql = "update login set username='$username',email='$email',phone='$phone',password='$npassword' where id='$id'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Updated');location.href='profile.php';</script";
            }
        }
    } else {

        echo "<script>alert('password is incorrect')</script";
    }
}
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
}

?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/reg.css">
    <title>User Profile</title>
</head>
<!-- User Profile Section -->

<body style="background-image: url(images/bg1.jpg);">
    <form action="" method="POST">
        <div class="input-group d-flex flex-row-reverse" style="margin-top: 15px;margin-left:-15px;">
            <button name="logout" class="btn btn-secondary">Log out</button>
        </div>

    </form>

    <div class="container" style="width: 450px;text-align: center;margin-top:95px;margin-bottom:95px;height:570px;background-color:white;box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);border-radius:5px;">
        <!-- User Profile Card Section -->
        <div class="card">
            <form action="" method="POST" class="">
                <p class="login-text" style="font-size: 2rem; font-weight: 800;margin-top:20px;margin-bottom:55px;">User Profile </p>
                <div class="input-group" style="margin-bottom: 30px;">
                    <label style="margin-right: 76px;margin-left:20px;font-size:20px;font-weight:bold;">Username<b style="color: red;">*</b></label>
                    <input style="border-radius: 5px;font-size:15px;font-weight:bold;" type="text" placeholder="Username" name="username" value="<?php echo $uname ?>" required>
                </div>
                <div class="input-group" style="margin-bottom: 30px;">
                    <label style="margin-right: 119px;margin-left:20px;font-size:20px;font-weight:bold;">Email<b style="color: red;">*</b></label>
                    <input style="border-radius: 5px;font-size:15px;font-weight:bold;" type="email" placeholder="Email" name="email" value="<?php echo $eml ?>" required>
                </div>
                <div class="input-group" style="margin-bottom: 30px;">
                    <label style="margin-right: 110px;margin-left:20px;font-size:20px;font-weight:bold;">Phone<b style="color: red;">*</b></label>
                    <input style="border-radius: 5px;font-size:15px;font-weight:bold;" type="text" placeholder="Phone" name="phone" value="<?php echo $phn ?>" required>
                </div>
                <div class="input-group" style="margin-bottom: 30px;">
                    <label style="margin-right: 5px;margin-left:20px;font-size:20px;font-weight:bold;">Current Password<b style="color: red;">*</b></label>
                    <input style="border-radius: 5px;font-size:15px;font-weight:bold;" type="password" placeholder="Password" name="cpassword" value="" required>
                </div>
                <div class="input-group" style="margin-bottom: 30px;">
                    <label style="margin-right: 40px;margin-left:20px;font-size:20px;font-weight:bold;">New Password</label>
                    <input style="border-radius: 5px;font-size:15px;font-weight:bold;" type="password" placeholder="New Password" name="npassword" value="">
                </div>
                <div class="input-group d-flex justify-content-center" style="margin-top: 55px;">
                    <button name="edit" class="btn btn-success btn-lg btn-block">Edit</button>
                </div>

            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>
<!-- Footer Section -->
<?php
include 'footer.php';
?>