<?php
session_start();
include "../config/config.php";
include "../functions/Functions.php";
include "../database/DB.php";
include "../views/Post_Card.php";
include "../constants/About.php";
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
    HeadLine("About us"); ?>

    <section id="power_add">
        <div class="left">
            <img src="../public/image/5.webp" alt="">
        </div>
        <div class="right">
            <h3><?= HEADING_1 ?></h3>
            <h1><?= HEADING_2 ?></h1>
            <p><?= TEXT ?></p>
            <a href="./Contact">Contact us</a>
        </div>
    </section>


    <?php include "../views/Promo.php"; ?>

    <section id="team">
        <h2>Our Team</h2>
        <div class="centent">
            <div class="c">
                <img src="../public/image/hicham.webp" alt="">
                <h4><?= MUMBER_1[0] ?></h4>
                <h5><?= MUMBER_1[1] ?></h5>
            </div>
            <div class="c">
                <img src="../public/image/user_1.webp" alt="">
                <h4><?= MUMBER_2[0] ?></h4>
                <h5><?= MUMBER_2[1] ?></h5>
            </div>

            <div class="c">
                <img src="../public/image/yhia.webp" alt="">
                <h4><?= MUMBER_3[0] ?></h4>
                <h5><?= MUMBER_3[1] ?></h5>
            </div>
        </div>
    </section>

    <div id="feedback">
        <div class="shap1"></div>
        <div class="shap2"></div>
        <div class="shap3"></div>
        <h2>Client Feedback</h2>
        <div class="swiper feedbackSwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="client_card">
                        <img src="../uploads/user/u1.webp" alt="">
                        <p>
                            <i class="fa-duotone fa-quote-right"></i>
                            <span><?= FEEDBACK_TEXT ?></span>
                        </p>
                    </div>
                    <div class="client_card">
                        <img src="../uploads/user/u2.webp" alt="">
                        <p>
                            <i class="fa-duotone fa-quote-right"></i>
                            <span><?= FEEDBACK_TEXT ?></span>
                        </p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="client_card">
                        <img src="../uploads/user/u3.webp" alt="">
                        <p>
                            <i class="fa-duotone fa-quote-right"></i>
                            <span><?= FEEDBACK_TEXT ?></span>
                        </p>
                    </div>
                    <div class="client_card">
                        <img src="../uploads/user/u4.webp" alt="">
                        <p>
                            <i class="fa-duotone fa-quote-right"></i>
                            <span><?= FEEDBACK_TEXT ?></span>
                        </p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="client_card">
                        <img src="../uploads/user/u5.webp" alt="">
                        <p>
                            <i class="fa-duotone fa-quote-right"></i>
                            <span><?= FEEDBACK_TEXT ?></span>
                        </p>
                    </div>
                    <div class="client_card">
                        <img src="../uploads/user/u6.webp" alt="">
                        <p>
                            <i class="fa-duotone fa-quote-right"></i>
                            <span><?= FEEDBACK_TEXT ?></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="blog_posts" class="mb-5">
        <h2>Latest Blog Posts</h2>
        <div id="container" style="display: flex; gap: 30px; justify-content: center; flex-wrap: wrap;">
            <?php
            $result = $DATABASE->SELECT("SELECT * FROM `blog` ORDER BY added DESC LIMIT 3;");
            foreach ($result as $row) {
                Post_Card(
                    $row['post_image'],
                    $row['added'],
                    $row['posted_by'],
                    limit_words($row['post_content'], 20),
                    $row['post_id'],
                );
            }
            ?>
        </div>

    </div>
    <!-- --------------- -->
    <!-- FOOTER SECTION  -->
    <?php include "../views/Footer.php"; ?>
    <!-- --------------- -->
    <!-- --------------- -->

    <script src="../libs/swiper/swiper.js"></script>
    <script>
        var swiper = new Swiper(".feedbackSwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 5000,
            },
        });
    </script>
    <!-- javascript main file -->
    <script src="../libs/popper/popper.js"></script>
    <script src="../libs/jquery/jquery.js"></script>
    <script src="../libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/main.js"></script>
</body>

</html>