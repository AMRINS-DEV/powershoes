<?php
session_start();
include "../config/config.php";
include "../functions/Functions.php";
include "../database/DB.php";
include "../views/Product_Card.php";
include "../constants/Global.php";
include "../constants/Icons.php";
include "../views/Nav.php";
include "../views/Header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="title" content="power shoes new future shoes technology that will make your life easy.">
    <meta name="description" content="power shoes new future shoes technology that will make your life easier and you phone chargable in any where and any time with fast charge tecnologie.">
    <meta name="keywords" content="shoes, pwershoes, battery">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="revisit-after" content="1 days">
    <meta name="author" content="Jamal Amrins">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PowerShoes</title>
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
    <link rel="stylesheet" href="../public/css/products.css">
    <link rel="stylesheet" href="../public/css/Post_Details.css">
</head>
<body>

<section id="Service_Aspects" class="m-5 d-flex justify-content-evenly align-items-center gap-5 flex-wrap">
    <article class="d-flex gap-2">
        <div>
            <i class="fa-regular fa-truck-fast border border-2 border-dark rounded-3 p-2 fs-1"></i>
        </div>
        <div>
            <h4 class="p-0 m-0"><span class="link-underline-dark">FREE</span> SHIPPIN</h4>
            <p class="p-0 m-0 lh-sm fs-6">
                lorem ipsum dolor sit amet, <br>
                consectuer adipiscing elit.
            </p>
        </div>
    </article>
    <article class="d-flex gap-2">
        <div>
            <i class="fa-regular fa-rotate-left border border-2 border-dark rounded-3 p-2 fs-1"></i>
        </div>
        <div>
            <h4 class="p-0 m-0"><span class="link-underline-dark">FREE</span> RETURN</h4>
            <p class="p-0 m-0 lh-sm fs-6">
                lorem ipsum dolor sit amet, <br>
                consectuer adipiscing elit.
            </p>
        </div>
    </article>
    <article class="d-flex gap-2">
        <div>
            <i class="fa-regular fa-clock border border-2 border-dark rounded-3 p-2 fs-1"></i>
        </div>
        <div>
            <h4 class="p-0 m-0"><span class="link-underline-dark">SUPP</span>ORT 24/7</h4>
            <p class="p-0 m-0 lh-sm fs-6">
                lorem ipsum dolor sit amet, <br>
                consectuer adipiscing elit.
            </p>
        </div>
    </article>
</section>




<section id="ProductsSlider" class="PS1 d-flex align-items-center justify-content-center">
    <div id="ProductsSlider_Wrp" class="w-100 position-relative">
        <div id="Controles" class="d-flex align-items-center justify-content-between p-3">
            <div>
                <h5>/ BEST SELLER!</h5>
            </div>
            <div class="d-flex gap-3">
                <i id="Left" class="fa-solid fa-angle-left"></i>
                <i id="Right" class="fa-solid fa-angle-right"></i>
            </div>
        </div>
        <div id="Carousel" class="d-grid">
            <?php
            $products = $DATABASE->SELECT("SELECT * FROM `product` ORDER BY product_added DESC LIMIT 5");
            foreach ($products as $row) :
                $product_id = $row['product_id'];
                $result_image = $DATABASE->SELECT("SELECT product_image FROM `product_image` WHERE product_id=$product_id");
                $result_image = $result_image[0];
            ?>
                <article id="Card" style="height: 234px" class="overflow-hidden d-flex flex-column align-items-center position-relative rounded-2">
                    <?php if ($row['category'] == 'Power Shoes') : ?>
                        <i class="fa-solid fa-battery-three-quarters battery position-absolute" style="left: 10px; top: 10px; color: red; z-index: 22;"></i>
                    <?php endif; ?>
                    <a href="../page/Details?product=<?= $row['product_id'] ?>">
                        <div id="Img" class="position-relative">
                            <img src="../uploads/products/<?= $result_image['product_image'] ?>" />
                        </div>
                    </a>
                    <div id="Content" class="mt-2">
                        <h4 class="m-0 p-0"><?= $row['brand'] ?></h4>
                        <h3><?= $row['name'] ?></h3>
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <div id="Price">
                                <span><?= $row['price'] ?> DH</span>
                            </div>
                            <div id="Stars" class="d-flex">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>






<section id="Gallery">
    <div id="Img1">
        <img src="../public/image/4.webp" alt="">
    </div>
    <div id="Img2">
        <img src="../public/image/10.webp" alt="">
    </div>
    <div id="Img3" class="d-flex gap-1">
        <img src="../public/image/6.webp" alt="">
        <img src="../public/image/7.webp" alt="">
    </div>
</section>

<section id="ProductsSlider" class="PS2 d-flex align-items-center justify-content-center">
    <div id="ProductsSlider_Wrp" class="w-100 position-relative">
        <div id="Controles" class="d-flex align-items-center justify-content-between p-3">
            <div>
                <h5>/ FEATURED PRODUCTS</h5>
            </div>
            <div class="d-flex gap-3">
                <i id="Left" class="fa-solid fa-angle-left"></i>
                <i id="Right" class="fa-solid fa-angle-right"></i>
            </div>
        </div>
        <div id="Carousel" class="d-grid">
            <?php
            $products = $DATABASE->SELECT("SELECT * FROM `product` ORDER BY product_added LIMIT 10");
            foreach ($products as $row) :
                $product_id = $row['product_id'];
                $result_image = $DATABASE->SELECT("SELECT product_image FROM `product_image` WHERE product_id=$product_id");
                $result_image = $result_image[0];
            ?>
                <article id="Card" class="overflow-hidden d-flex flex-column align-items-center position-relative rounded-2">
                    <?php if ($row['category'] == 'Power Shoes') : ?>
                        <i class="fa-solid fa-battery-three-quarters battery position-absolute" style="left: 10px; top: 10px; color: red; z-index: 22;"></i>
                    <?php endif; ?>
                    <div id="Img" class="position-relative">
                        <img src="../uploads/products/<?= $result_image['product_image'] ?>" />
                    </div>
                    <div id="Content" class="mt-2">
                        <h4 class="m-0 p-0"><?= $row['brand'] ?></h4>
                        <h3><?= $row['name'] ?></h3>

                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <div id="Price">
                                <span><?= $row['price'] ?> DH</span>
                            </div>
                            <div id="Stars" class="d-flex">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <a href="../page/Details?product=<?= $row['product_id'] ?>" id="Add_To_Card" class="border-0 text-light position-absolute d-flex align-items-center justify-content-center">
                        <i class="fa-light fa-cart-plus"></i>
                        <span>Add To Cart</span>
                    </a>
                </article>

            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- promo section -->
<?php include "../views/Promo.php"; ?>
<!-- ------------- -->

<section id="ProductsSlider" class="PS3 d-flex align-items-center justify-content-center">
    <div id="ProductsSlider_Wrp" class="w-100 position-relative">
        <div id="Controles" class="d-flex align-items-center justify-content-between p-3">
            <div>
                <h5>/ NEW PRODUCTS</h5>
            </div>
            <div class="d-flex gap-3">
                <i id="Left" class="fa-solid fa-angle-left"></i>
                <i id="Right" class="fa-solid fa-angle-right"></i>
            </div>
        </div>
        <div id="Carousel" class="d-grid">
            <?php
            $products = $DATABASE->SELECT("SELECT * FROM `product` ORDER BY product_added DESC LIMIT 10");
            foreach ($products as $row) :
                $product_id = $row['product_id'];
                $result_image = $DATABASE->SELECT("SELECT product_image FROM `product_image` WHERE product_id=$product_id");
                $result_image = $result_image[0];
            ?>
                <article id="Card" class="overflow-hidden d-flex flex-column align-items-center position-relative rounded-2">
                    <?php if ($row['category'] == 'Power Shoes') : ?>
                        <i class="fa-solid fa-battery-three-quarters battery position-absolute" style="left: 10px; top: 10px; color: red; z-index: 22;"></i>
                    <?php endif; ?>
                    <div id="Img" class="position-relative">
                        <img src="../uploads/products/<?= $result_image['product_image'] ?>" />
                    </div>
                    <div id="Content" class="mt-2">
                        <h4 class="m-0 p-0"><?= $row['brand'] ?></h4>
                        <h3><?= $row['name'] ?></h3>

                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <div id="Price">
                                <span><?= $row['price'] ?> DH</span>
                            </div>
                            <div id="Stars" class="d-flex">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <a href="../page/Details?product=<?= $row['product_id'] ?>" id="Add_To_Card" class="border-0 text-light position-absolute d-flex align-items-center justify-content-center">
                        <i class="fa-light fa-cart-plus"></i>
                        <span>Add To Cart</span>
                    </a>
                </article>

            <?php endforeach; ?>
        </div>
    </div>
</section>

<section id="S_Slider" class="d-flex align-items-center justify-content-center bg-light">
    <img src="../public/image/Comp-1_1.gif" alt="">
</section>

<section id="BlogSection">
    <h2>FROM</h2>
    <h1>THE BLOG</h1>
    <div class="Content">
        <?php
        $result = $DATABASE->SELECT("SELECT * FROM `blog` ORDER BY added DESC LIMIT 4;");
        foreach ($result as $row) : ?>
            <article>
                <div class="img">
                    <img src="../uploads/blog/<?= $row['post_image'] ?>" alt="">
                </div>
                <div class="article">
                    <h3><?= $row['post_title'] ?></h3>
                    <p><?= limit_words($row['post_content'], 20) ?></p>
                    <a href="../page/PostDetails?post=<?= $row['post_id'] ?>">READ MORE</a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<?php include "../views/Footer.php"; ?>
<!-- javascript main file -->
<script src="../libs/popper/popper.js"></script>
<script src="../libs/jquery/jquery.js"></script>
<script src="../libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../public/js/main.js"></script>
</body>

</html>