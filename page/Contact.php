<?php
session_start();
include "../config/config.php";
include "../functions/Functions.php";
include "../database/DB.php";
include "../constants/Global.php";
include "../constants/Icons.php";
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
HeadLine("Contact"); ?>

<div id="Contact">
    <div class="form">
        <h1>We Are Here! <br> Please Send A Quest</h1>
        <form action="../modules/Contact" method="post">
            <div class="input">
                <input type="text" required name="name" placeholder="Name">
                <input type="text" required name="email" placeholder="Email">
            </div>
            <input type="text" name="sub" placeholder="Subject (Optional)" >
            <textarea name="content" required placeholder="Message"></textarea>
            <button type="submit" name="c_message">Send a Message</button>
        </form>
    </div>
    <div class="info">
        <div class="infocard">
            <i class="fa-regular fa-house"></i>
            <h4>Address</h4>
            <p>
                Your address goes here <br> 123 Your Location
            </p>
        </div>
        <div class="infocard">
        <i class="fa-regular fa-phone-volume"></i>
            <h4>Phone</h4>
            <p>
                +001252146398 <br> +00569874523
            </p>
        </div>
        <div class="infocard">
            <i class="fa-regular fa-envelope-open"></i>
            <h4>Email / Web</h4>
            <p>
                power@shoes.com <br> power@shoes.com 
            </p>
        </div>
    </div>
</div>


<?php include "../views/Footer.php"; ?>
<!-- javascript main file -->
<script src="../libs/popper/popper.js"></script>
<script src="../libs/jquery/jquery.js"></script>
<script src="../libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../public/js/main.js"></script>
</body>

</html>