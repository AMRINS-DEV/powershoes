<?php
 session_start();
 include "../config/config.php";
 include "../functions/Functions.php";
 include "../database/DB.php";
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

    <?php include "../views/HeadLine.php";
    HeadLine("Login"); ?>
    <div id="LL" class="position-relative">
        <?php if (isset($_GET['login_err'])) : ?>
            <h4 style="padding: 20px 40px; background-color: red; position: absolute; top: 50px; left: 50%; transform: translateX(-50%); color: #fff; border-radius: 10px; z-index: 333;">
                Something Goes Wrong!!!
            </h4>
        <?php endif; ?>
        <h1>Login</h1>
        <form action="./modules/Login" method="post">
            <div class="input">
                <label for="email">Email Address <i class="fa-regular fa-asterisk"></i></label>
                <input type="text" required name="email" id="email">
            </div>
            <div class="input">
                <label for="password">Password <i class="fa-regular fa-asterisk"></i></label>
                <input type="text" required name="password" id="password">
            </div>
            <button type="submit" name="login">LOGIN</button>
            <div style="width: 100%;" class="d-flex justify-content-between">
                <div class="r_me d-flex gap-2">
                    <input type="radio" name="r_me" id="r_me">
                    <label for="r_me"></label>
                    <span>Remember me</span>
                </div>
                <span>Lost your password?</span>
            </div>
        </form>
    </div>


    <!-- javascript main file -->
    <script src="../libs/popper/popper.js"></script>
    <script src="../libs/jquery/jquery.js"></script>
    <script src="../libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/main.js"></script>
</body>

</html>