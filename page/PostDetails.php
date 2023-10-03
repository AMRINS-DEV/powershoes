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
    <link rel="stylesheet" href="../public/css/Post_Details.css">
</head>

<body>

    <?php include "../views/Nav.php"; ?>
    <?php include "../views/HeadLine.php";
    HeadLine("Blog Details"); ?>

    <?php
    $post_id = $_GET['post'];
    $result_main = $DATABASE->SELECT("SELECT * FROM `blog` WHERE post_id=$post_id");
    $result_subs = $DATABASE->SELECT("SELECT * FROM `blog` WHERE post_id != $post_id;");


    $img = $result_main[0]['post_image'];
    $date = $result_main[0]['added'];
    $postedby = $result_main[0]['posted_by'];
    $content = $result_main[0]['post_content'];
    $post_title = $result_main[0]['post_title'];
    ?>

    <div id="post_details">
        <div class="post">
            <img src="../uploads/blog/<?= $img ?>" alt="">
            <div class="info">
                <div class="date">
                    <i class="fa-light fa-calendar-days"></i>
                    <span><?= $date ?></span>
                </div>
                <div class="name">
                    <i class="fa-solid fa-user"></i>
                    <span><?= $postedby ?></span>
                </div>
            </div>
            <h1><?= $post_title ?></h1>
            <p>
                <?= $content ?>
            </p>
        </div>
    </div>

    <div class="sug_posts">
        <?php
        $result_subs = $DATABASE->SELECT("SELECT * FROM `blog` WHERE post_id != $post_id LIMIT 2;");

        foreach ($result_subs as $row) : ?>
            <a href="./PostDetails?post=<?= $row['post_id'] ?>" style="color: #222;">
                <div class="sug_p_w">
                    <img src="../uploads/blog/<?= $row['post_image'] ?>" alt="">
                    <div class="info" style="flex-direction: column; gap: 5px">
                        <div class="date">
                            <i class="fa-light fa-calendar-days"></i>
                            <span><?= $row['added'] ?></span>
                        </div>
                        <p style="font-size: 14px;font-weight: 600; margin-bottom: 0 !important;">
                            <?= limit_words($row['post_content'], 6) ?>
                        </p>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>

    <div id="comments">
        <h2>Comments</h2>
        <div class="comments">
            <?php
            $com_arr = $DATABASE->SELECT("SELECT * FROM `blog_comments` INNER JOIN customer ON customer.customer_id = blog_comments.customer_id && blog_comments.post_id=$post_id ORDER BY blog_comments.com_added DESC");
            foreach ($com_arr as $row) : ?>

                <div class="com_wrp">
                    <img src="../uploads/user/<?= $row['customer_vector'] ?>" alt="">
                    <div class="content">
                        <h4><?= $row['customer_name'] ?></h4>
                        <span><?= $row['com_added'] ?></span>
                        <p><?= $row['com_content'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <?php if (isset($_SESSION['customer_id'])) : ?>
        <div id="add_comment">
            <h2>Leave a Comment</h2>
            <form method="post" action="../modules/add_comment">
                <input type="hidden" value="<?= $post_id ?>" name="post_id">
                <textarea name="content" placeholder="Message"></textarea>
                <button type="submit" name="add_post">Add Comment</button>
            </form>
        </div>
    <?php endif; ?>
    <?php include "../views/Footer.php"; ?>

    <!-- javascript main file -->
    <script src="../libs/popper/popper.js"></script>
    <script src="../libs/jquery/jquery.js"></script>
    <script src="../libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/main.js"></script>
</body>

</html>