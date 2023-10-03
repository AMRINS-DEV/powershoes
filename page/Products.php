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
    <link rel="stylesheet" href="../public/css/Header.css">
    <link rel="stylesheet" href="../public/css/Hover.css">
    <link rel="stylesheet" href="../public/css/Queries.css">
</head>

<body>

</body>
<?php $cur_page = 'Products' ?>
<?php include "../views/Nav.php"; ?>
<?php
include "../views/HeadLine.php";
HeadLine("Products");
?>
<div id="Products_wrp">
    <div class="filters">
        <button class="toggle_filters">
            <i class="fa-regular fa-bars"></i>
        </button>
        <a href="../modules/filter?clear_all">Clear All Filters</a>
        <article>
            <h4>Top categorys</h4>
            <a href="../modules/filter?category=Shoes">Shoes</a>
            <a href="../modules/filter?category=Sports Shoes">Sports Shoes</a>
            <a href="../modules/filter?category=Electric Shoes">Electric Shoes</a>
            <a href="../modules/filter?category=Power Shoes">Power Shoes</a>
            <a href="../modules/filter?clear=category">Clear Filter</a>
        </article>
        <article>
            <h4>Price Filter</h4>
            <form action="../modules/filter" method="post">
                <div>
                    <input type="number" min='10' max='10000' name="price1">
                    <input type="number" min='10' max='10000' name="price2">
                </div>
                <button type="submit" name="price">Apply</button>
            </form>
            <a href="../modules/filter?clearp">Clear Filter</a>
        </article>
        <article>
            <h4>Color Filter</h4>
            <div class="add_color w-100">
                <div class="mb-3 w-100 d-flex p-1  color-input-wrp gap-1 flex-wrap justify-content-evenly">
                    <?php foreach (COLOR as $value) { ?>
                        <a style="width: fit-content;" href="../modules/filter?color=<?= $value["code"] ?>">
                            <div class="color__input_label form-check-label rounded-1 border" style="width: 28px; height: 28px; background-color: #<?= $value["code"] ?>;">
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
            <a href="../modules/filter?clear=color">Clear Filter</a>
        </article>
        <article class="f_size">
            <h4>Size Filter</h4>
            <div>
                <a href="../modules/filter?size=4">4</a>
                <a href="../modules/filter?size=4.5">4.5</a>
                <a href="../modules/filter?size=5">5</a>
                <a href="../modules/filter?size=5.5">5.5</a>
                <a href="../modules/filter?size=6">6</a>
                <a href="../modules/filter?size=6.5">6.5</a>
                <a href="../modules/filter?size=7">7</a>
                <a href="../modules/filter?size=7.5">7.5</a>
                <a href="../modules/filter?size=8">8</a>
                <a href="../modules/filter?size=8.5">8.5</a>
                <a href="../modules/filter?size=9">9</a>
                <a href="../modules/filter?size=9.5">9.5</a>
                <a href="../modules/filter?size=10">10</a>
                <a href="../modules/filter?size=10.5">10.5</a>
            </div>
            <a href="../modules/filter?clear=size">Clear Filter</a>
        </article>
        <article>
            <h4>Top Brands</h4>
            <a href="../modules/filter?brad=Shoes">Shoes</a>
            <a href="../modules/filter?brand=Hoka">Hoka</a>
            <a href="../modules/filter?brand=Nike">Nike</a>
            <a href="../modules/filter?brand=Power Shose">Power Shose</a>
            <a href="../modules/filter?clear=brand">Clear Filter</a>
        </article>
    </div>

    <div>
        <?php
        $filters = "";
        if (!empty($_SESSION['name'])) {
            $name = $_SESSION['name'];
            $name = " AND name LIKE '%$name%' ";
        } else {
            $name = '';
        }
        if (isset($_SESSION['brand'])) {
            $brand = $_SESSION['brand'];
            $brand = " AND brand='$brand' ";
        } else {
            $brand = '';
        }

        if (isset($_SESSION['category'])) {
            $category = $_SESSION['category'];
            $category = " AND category='$category' ";
        } else {
            $category = '';
        }


        if (isset($_SESSION['color'])) {
            $color = $_SESSION['color'];
            $color = " AND varient='$color' ";
        } else {
            $color = '';
        }

        if (isset($_SESSION['price1']) && isset($_SESSION['price2'])) {
            $price1 = $_SESSION['price1'];
            $price2 = $_SESSION['price2'];
            $price = " AND price BETWEEN  $price1  AND $price2";
        } else {
            $price = '';
        }

        $order = 'ORDER BY name ASC;';
        if (isset($_SESSION['order'])) {
            $ord = $_SESSION['order'];
            if ($ord == 'A-z') $order = " ORDER BY name ASC";
            if ($ord == 'Z-a') $order = " ORDER BY name DESC";
            if ($ord == 'Prix ASC') $order = " ORDER BY price ASC";
            if ($ord == 'Prix DESC') $order = " ORDER BY price DESC";
        } else {
            $order = '';
        }

        $filters .= $category . $name . $color . $brand . $price;
        if (!empty($filters)) $filters = "WHERE " . $filters;
        $filters = preg_replace('/AND/', '', $filters, 1);

        $sql = "SELECT * FROM product $filters $order";
        $products = $DATABASE->SELECT($sql);
        ?>
    </div>
    <?php
    ?>
    <div class="products_cards_container">
        <div class="controles">
            <h4><span class="products_count" style="color: #cc7777;"></span> Products Found</h4>
            <div class="sort">
                <?php
                if (isset($_SESSION['order'])) {
                    if ($_SESSION['order'] == 'A-z') $az = 'selected';
                    else $az = "";
                    if ($_SESSION['order'] == 'Z-a') $za = 'selected';
                    else $za = "";
                    if ($_SESSION['order'] == 'Prix ASC') $pa = 'selected';
                    else $pa = "";
                    if ($_SESSION['order'] == 'Prix DESC') $pe = 'selected';
                    else $pe = "";
                } else {
                    $az = "";
                    $za = "";
                    $pa = "";
                    $pe = "";
                }
                ?>
                <span>Sort By: </span>
                <select name="" id="sort_input">
                    <option selected value="default">Default</option>
                    <option <?= $az ?> value="A-z">A-z</option>
                    <option <?= $za ?> value="Z-a">Z-a</option>
                    <option <?= $pa ?> value="Prix ASC">ASC</option>
                    <option <?= $pe ?> value="Prix DESC">DESC</option>
                </select>
                <script>
                    const select = document.querySelector('#sort_input')
                    select.addEventListener('change', function() {
                        if (select.value != 'default') {
                            location.href = `../modules/filter?order=${this.value}`;
                        }
                    })
                </script>
            </div>
        </div>
        <div class="products">
            <?php
            if (!empty($products)) : ?>
                <?php
                $products_count = 0;
                $chunk_num = 1;
                $chunks = array_chunk($products, 12);
                $counter = 0;
                if (isset($_GET['page']) && !empty($_GET['page'])) {
                    if ($_GET['page'] > count($chunks)) {
                        $chunk_num = 1;
                    } else {
                        $chunk_num = $_GET['page'];
                    }
                }
                foreach ($chunks[$chunk_num - 1] as $row) {
                    $product_id = $row['product_id'];
                    $count_products = 0;
                    $sql = "SELECT * FROM product_image WHERE product_id = $product_id ;";
                    $images = $DATABASE->SELECT($sql);

                    $sql = "SELECT * FROM product_size WHERE product_id = $product_id";
                    $sizes = $DATABASE->SELECT($sql);
                    if (isset($_SESSION['size'])) {
                        $size = $_SESSION['size'];
                        foreach ($sizes as $v) {
                            if ($v['size'] == $size) {
                                $counter++;
                                $products_count++;
                                echo "<div>";
                                ProductCard(
                                    $product_id,
                                    $images[0]['product_image'],
                                    $row['name'],
                                    $row['brand'],
                                    $row['price'],
                                    $row['category'],
                                );
                                echo "</div>";
                                if ($counter == 3) {
                                    echo '<div class="row_p" style="flex-basis: 100%"></div>';
                                    $counter = 0;
                                }
                            }
                        }
                    } else {
                        $products_count++;
                                ProductCard(
                                    $product_id,
                                    $images[0]['product_image'],
                                    $row['name'],
                                    $row['brand'],
                                    $row['price'],
                                    $row['category'],
                                );
                        $counter++;
                        if ($counter == 3) {
                            echo '<div class="row_p" style="flex-basis: 100%"></div>';
                            $counter = 0;
                        }
                    }
                }
                ?>
        </div>
        <div class="pagination">
            <?php for ($i = 0; $i < count($chunks); $i++) : ?>
                <a href="./Products?page=<?= $i + 1 ?>"><?= $i + 1 ?></a>
            <?php endfor; ?>
        <?php endif; ?>
        </div>
    </div>
</div>

<?php include "../views/Footer.php"; ?>





<!-- javascript main file -->
<script src="../libs/popper/popper.js"></script>
<script src="../libs/jquery/jquery.js"></script>
<script src="../libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../public/js/main.js"></script>
<script>
    window.onload = function() {
        document.querySelector('.products_count')
            .innerHTML = <?= $products_count; ?>
    }
</script>
</body>

</html>