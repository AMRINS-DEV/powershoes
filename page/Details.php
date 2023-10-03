<?php
session_start();
include "../config/config.php";
include "../functions/Functions.php";
include "../database/DB.php";
include "../views/Product_Card.php";
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
    <link rel="stylesheet" href="../public/css/products.css">
    <link rel="stylesheet" href="../public/css/TopNav.css">
    <link rel="stylesheet" href="../public/css/Details.css">
    <link rel="stylesheet" href="../public/css/Header.css">
    <link rel="stylesheet" href="../public/css/Hover.css">
    <link rel="stylesheet" href="../public/css/Queries.css">
    <link rel="stylesheet" href="../public/css/Post_Details.css">
</head>

<body>


    <?php include "../views/Nav.php"; ?>

    <?php
    $product_id = $_GET['product'];
    $result_product = $DATABASE->SELECT("SELECT * FROM `product` WHERE product_id=$product_id");
    $result_product = $result_product[0];

    $result_size = $DATABASE->SELECT("SELECT * FROM `product_size` WHERE product_id=$product_id AND quantity > 0");
    $result_image = $DATABASE->SELECT("SELECT * FROM `product_image` WHERE product_id=$product_id");
    ?>
    <section id="details_container">
        <div id="details_images">
            <div class="main_image">
                <img src="../uploads/products/<?= $result_image[0]['product_image'] ?>" alt="">
            </div>
            <div class="sub_images">
                <div class="img active_border">
                    <img src="../uploads/products/<?= $result_image[0]['product_image'] ?>" alt="">
                </div>
                <div class="img">
                    <img src="../uploads/products/<?= $result_image[1]['product_image'] ?>" alt="">
                </div>
                <div class="img">
                    <img src="../uploads/products/<?= $result_image[2]['product_image'] ?>" alt="">
                </div>
                <div class="img">
                    <img src="../uploads/products/<?= $result_image[3]['product_image'] ?>" alt="">
                </div>
            </div>
        </div>
        <div id="details_content">
            <div class="brand"><?= $result_product['brand'] ?></div>
            <div class="title"><?= $result_product['name'] ?></div>
            <div class="price"><?= $result_product['price'] ?> DH</div>
            <div class="reviews">
                <div class="stars">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <span>(10 Customers Reviews)</span>
            </div>
            <div class="description">
                <?= limit_words($result_product['description'], 20) ?>
            </div>
            <div class="colors">
                <div>Color </div>
                <span class="color" style="background-color: #<?= $result_product['varient'] ?>"></span>
            </div>
            <form action="../modules/Add_To_Cart" method="post">
                <div class="sizes">
                    <div>Size </div>
                    <article>
                        <?php foreach ($result_size as $index => $value) : ?>
                            <input type="radio" required value="<?= $value['size']; ?>" name="selected_size" id="s<?= $index + 1 ?>">
                            <label for="s<?= $index + 1 ?>" class="size"><?= $value['size']; ?></label>
                        <?php endforeach; ?>
                    </article>
                </div>
                <div class="count_add">
                    <div>
                        <input type="hidden" name="product_id" value="<?= $product_id; ?>">
                        <input type="text" name="count" id="add_count">
                        <div>
                            <span class="sub">-</span>
                            <span class="add">+</span>
                        </div>
                    </div>
                    <button type="submit" name="add_to_card">Add to Card</button>
                </div>
            </form>
        </div>
    </section>

    <div id="more_details">
        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'Description')">Description</button>
            <button class="tablinks" onclick="openCity(event, 'Reviwes')">Reviwes</button>
        </div>
        <div id="Description" class="tabcontent" style="display: block;">
            <p><?= $result_product['description'] ?></p>
        </div>

        <div id="Reviwes" class="tabcontent">
            <div id="comments">
                <div class="comments">
                    <?php
                    $post_id = $_GET['product'];
                    $com_arr = $DATABASE->SELECT(
                        "SELECT * FROM 
                `product_reviews` 
                INNER JOIN 
                customer 
                ON customer.customer_id = product_reviews.customer_id && product_reviews.product_id=$product_id 
                ORDER BY product_reviews.rev_added DESC"
                    );
                    foreach ($com_arr as $row) : ?>

                        <div class="com_wrp">
                            <img src="<?= trim($row['customer_vector'], "'") ?>" alt="">
                            <div class="content">
                                <h4><?= $row['customer_name'] ?></h4>
                                <span><?= $row['rev_added'] ?></span>
                                <p><?= $row['rev_comment'] ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php if (isset($_SESSION['customer_id'])) : ?>
                <div id="add_comment">
                    <h2>Leave a Comment</h2>
                    <form method="post" action="../modules/add_review">
                        <input type="hidden" value="<?= $product_id ?>" name="product_id">
                        <textarea name="content" placeholder="Message"></textarea>
                        <button type="submit" name="add_comment">Add Comment</button>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <section id="ProductsSlider" style="margin: 100px 0;" class="PS1 d-flex align-items-center justify-content-center">
        <div id="ProductsSlider_Wrp" class="w-100 position-relative">
            <div id="Controles" class="d-flex align-items-center justify-content-between p-3">
                <div>
                    <h5>/ Customers Also Likes</h5>
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
                            <i class="fa-solid fa-battery-three-quarters battery position-absolute" 
                            style="left: 10px; top: 10px; color: red; z-index: 22;"></i>
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


    <?php include "../views/Footer.php"; ?>

    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        const add_count = document.querySelector('#add_count')
        const add = document.querySelector('.add')
        const sub = document.querySelector('.sub')

        add_count.value = 1
        add.addEventListener('click', function() {
            let num = Number(add_count.value)
            add_count.value = num + 1
            if (num >= 10) {
                add_count.value = 10
            } else {
                add_count.value = num + 1
            }

        })
        sub.addEventListener('click', function() {
            let num = Number(add_count.value)
            if (num <= 1) {
                add_count.value = 1
            } else {
                add_count.value = num - 1
            }
        })


        const main_image = document.querySelector('.main_image img')
        const [...sub_images] = document.querySelectorAll('.sub_images .img')

        sub_images.forEach(function(element, index) {
            element.addEventListener('click', function() {
                for (let elm of sub_images) {
                    elm.classList.remove("active_border")
                }
                main_image.src = this.children[0].src
                this.classList.add("active_border")

                console.log(this.children[0].src);
            })
        })
    </script>
    <!-- javascript main file -->
    <script src="../libs/popper/popper.js"></script>
    <script src="../libs/jquery/jquery.js"></script>
    <script src="../libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/main.js"></script>

</body>

</html>