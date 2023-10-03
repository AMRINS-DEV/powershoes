<?php
session_start();
include "../config/config.php";
include "../functions/Functions.php";
include "../database/DB.php";
include "../constants/Global.php";
include "../constants/Icons.php";
if(!isset($_SESSION['customer_id']))
{
    header("Location: ../page/Home");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PowerShoes</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../public/image/powershoes_logo.svg" type="image/x-icon">
    <!-- fontawesome-->
    <link rel="stylesheet" href="../libs/fontawesome/css/all.css">
    <!-- bootstarp -->
    <link rel="stylesheet" href="../libs/bootstrap/css/bootstrap.min.css">
    <!-- styling -->
    <link rel="stylesheet" href="../public/css/Default.css">
    <link rel="stylesheet" href="../public/css/Style.css">
    <link rel="stylesheet" href="../public/css/Footer.css">

    <link rel="stylesheet" href="../public/css/TopNav.css">
    <link rel="stylesheet" href="../public/css/Header.css">
    <link rel="stylesheet" href="../public/css/Hover.css">
    <link rel="stylesheet" href="../public/css/Queries.css">
</head>

<body>
    <?php include "../views/Nav.php"; ?>
    <?php include "../views/HeadLine.php";
    HeadLine("Address");
    ?>
    <div id="LL" class="position-relative">
        <?php if (isset($_GET['logup_err'])) : ?>
            <h4 style="padding: 20px 40px; background-color: red; position: absolute; top: 50px; left: 50%; transform: translateX(-50%); color: #fff; border-radius: 10px; z-index: 333;">
                Something Goes Wrong!!!
            </h4>
        <?php endif; ?>
        <h1>Address</h1>
        <form action="../modules/address" method="post">
            <div class="input">
                <label for="address">Address <i class="fa-regular fa-asterisk"></i></label>
                <input type="text" required name="address" id="address">
            </div>
            <div class="input">
                <label for="Phone">Phone <i class="fa-regular fa-asterisk"></i></label>
                <input type="text" required name="phone" id="Phone">
            </div>
            <div class="input">
                <label for="city">city <i class="fa-regular fa-asterisk"></i></label>
                <input type="text" required name="city" id="city">
            </div>
            <div class="input">
                <label for="province">Province<i class="fa-regular fa-asterisk"></i></label>
                <input type="text" required name="province" id="province">
            </div>
            <div class="input">
                <label for="zipcode">Zipcode <i class="fa-regular fa-asterisk"></i></label>
                <input type="text" required name="zipcode" id="zipcode">
            </div>
            <button type="submit" name="logup">LOGUP</button>
        </form>
    </div>


    <?php include "../views/Footer.php"; ?>
    <!-- javascript main file -->
    <script src="../libs/popper/popper.js"></script>
    <script src="../libs/jquery/jquery.js"></script>
    <script src="../libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/main.js"></script>
</body>

</html>