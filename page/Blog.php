<?php
session_start();
include "../config/config.php";
include "../functions/Functions.php";
include "../database/DB.php";
include "../views/Post_Card.php";
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
    <!-- swiper -->
    <link rel="stylesheet" href="../libs/swiper/swiper.css">
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
    <link rel="stylesheet" href="../public/css/About.css">
</head>

<body>

    <?php include "../views/Nav.php"; ?>
    <?php include "../views/HeadLine.php";
    HeadLine("The Blog"); ?>


    <div id="blog_posts" class="mb-5 mt-5">
        <div id="container" style="display: flex; gap: 30px; justify-content: center; flex-wrap: wrap;">
            <?php
            $result = $DATABASE->SELECT("SELECT * FROM `blog` ORDER BY added DESC;");
            $count = 1;
            for($i = 0; $i < count($result); $i++) {
                Post_Card(
                    $result[$i]['post_image'],
                    $result[$i]['added'],
                    $result[$i]['posted_by'],
                    limit_words($result[$i]['post_content'], 20),
                    $result[$i]['post_id'],
                );
                if($count == 3) {
                    echo "<div style='flex-basis: 100%'></div>";
                    $count = 1;
                } else {
                    $count++;
                }
            }
            ?>
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