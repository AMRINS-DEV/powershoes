<?php
session_start();
include "../config/config.php";
include "../functions/Functions.php";
include "../database/DB.php";
include "../constants/Global.php";
include "../constants/Icons.php";
if (!isset($_SESSION['customer_id'])) {
    header("Location: ../page/login");
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
    HeadLine("Cart");
    ?>

    <div id="cart_container">

        <?php
        $customer_id = $_SESSION['customer_id'];
        $orders = $DATABASE->SELECT("SELECT * FROM `orders` INNER JOIN product ON product.product_id = orders.product_id AND orders.customer_id=$customer_id;");
        foreach ($orders as $row) :
            $product_id = $row['product_id'];
            $result_image = $DATABASE->SELECT("SELECT product_image FROM `product_image` WHERE product_id=$product_id LIMIT 1 ");
            $result_image = $result_image[0];
            $con_bg = $row['confirmed'] ? "background: green;" : "";
        ?>
            <div class="card_m2">
                <img src="../uploads/products/<?= $result_image['product_image'] ?>" alt="">
                <div class="cont">
                    <h4><?= $row['brand'] ?></h4>
                    <div>
                        <h3><?= $row['name'] ?></h3>
                        <h3 class="price"><?php echo $row['price'] - ($row['price'] * $row['discount']) ?> DH</h3>
                    </div>
                    <p><?= limit_words($row['description'], 20) ?></p>
                    <div>
                        <a href="../modules/delete_order?order=<?= $row['order_id'] ?>">Delete</a>
                        <a style="<?= $con_bg ?>" href="../modules/confirme_order?confirme=<?= $row['order_id'] ?>">
                            <i class="fa-regular fa-check-double"></i>
                        </a>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
        ?>

    </div>





    <?php include "../views/Footer.php"; ?>

    <!-- javascript main file -->
    <script src="../libs/popper/popper.js"></script>
    <script src="../libs/jquery/jquery.js"></script>
    <script src="../libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/main.js"></script>
</body>

</html>