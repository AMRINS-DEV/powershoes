<?php
session_start();

include "../config/config.php";
include "../database/DB.php";
include "../functions/Functions.php";
include "../views/product_card_v2.php";

if (!isset($_SESSION['admin_id'])) {
    header("Location: ./Login");
}
$active_option = "dashboard";
switch (true) {
    case isset($_GET['dashboard']):
        $active_option = "dashboard";
        break;
    case isset($_GET['products']):
        $active_option = "products";
        break;
    case isset($_GET['add_product']):
        $active_option = "add_product";
        break;
    case isset($_GET['add_post']):
        $active_option = "add_post";
        break;
    case isset($_GET['customers']):
        $active_option = "customers";
        break;
    case isset($_GET['orders']):
        $active_option = "orders";
        break;
    case isset($_GET['chat']):
        $active_option = "chat";
        break;
    case isset($_GET['settings']):
        $active_option = "settings";
        break;
    default:
        $active_option = "dashboard";
        break;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

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
        <link rel="stylesheet" href="../public/css/style.css">
        <link rel="stylesheet" href="../public/css/Default.css">
        <link rel="stylesheet" href="../public/css/Admin.css">
        <link rel="stylesheet" href="../public/css/Add_Product.css">
        <link rel="stylesheet" href="../public/css/Hover.css">
        <link rel="stylesheet" href="../public/css/Queries.css">
        <link rel="stylesheet" href="../public/css/products.css">
    </head>
</head>

<body>
    <aside id="ADMIN_ASIDE">
        <div class="logo">
            <a href="./?dashboard">
                <img src="../public/image/powershoes_logo.svg" alt="">
            </a>
        </div>

        <div class="list">
            <a href="./?dashboard" class="<?= ($active_option == "dashboard") ? 'active_option_link' : 'list_link_hover' ?>">
                <i class="fa-light fa-bars-progress"></i>
                <span>Dashboard</span>
            </a>
            <a href="./?products" class="<?= ($active_option == "products") ? 'active_option_link' : 'list_link_hover' ?>">
                <i class="fa-light fa-boxes-stacked"></i>
                <span>Products</span>
            </a>
            <a href="./?add_product" class="<?= ($active_option == "add_product") ? 'active_option_link' : 'list_link_hover' ?>">
                <i class="fa-light fa-box"></i>
                <span>Add Product</span>
            </a>
            <!-- <a href="./?customers" class="<?= ""//($active_option == "customers") ? 'active_option_link' : 'list_link_hover' ?>">
                <i class="fa-light fa-user"></i>
                <span>Customers</span>
            </a> -->
            <a href="./?add_post" class="<?= ($active_option == "add_post") ? 'active_option_link' : 'list_link_hover' ?>">
                <i class="fa-light fa-user"></i>
                <span>Add Post</span>
            </a>
            <!-- <a href="./?orders" class="<?= "" //($active_option == "orders") ? 'active_option_link' : 'list_link_hover' ?>">
                <i class="fa-light fa-cart-shopping"></i>
                <span>Orders</span>
            </a>
            <a href="./?chat" class="<?= ""//($active_option == "chat") ? 'active_option_link' : 'list_link_hover' ?>">
                <i class="fa-light fa-messages"></i>
                <span>Chat</span>
            </a> -->
        </div>
        <div class="settings">
            <a href="./modules/admin_logout.php" class="list_link_hover">
                <i class="fa-light fa-right-from-bracket"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <main id="ADMIN_MIN">
        <nav id="ADMIN_NAVIGATION">
            <button type="submit" class="search_toggle" onclick="
                let elm = document.querySelector('#ADMIN_NAVIGATION .search_container_hidden')
                elm.style.display = 'flex'
            ">
                <i class="fa-regular fa-magnifying-glass"></i>
            </button>
            <div class="search_container_hidden">
                <i class="fa-duotone fa-circle-xmark close_search_container_hidden" onclick="
                    this.parentElement.style.display = 'none';
                "></i>
                <div class="search_wrp_hidden">
                    <button type="submit" name="search">
                        <i class="fa-regular fa-magnifying-glass"></i>
                    </button>
                    <input type="text" name="search_term" placeholder="Search something here">
                </div>
            </div>
            <div class="search_wrp">
                <button type="submit" name="search">
                    <i class="fa-regular fa-magnifying-glass"></i>
                </button>
                <input type="text" name="search_term" placeholder="Search something here">
            </div>
            <div class="account">
                <button class="bell">
                    <?php
                        $result_count = $DATABASE->SELECT("SELECT COUNT(id) As total FROM contact_message");
                    ?>
                    <span><?= $result_count[0]['total'] ?></span>
                    <i class="fa-light fa-bell"></i>
                </button>
                <div class="user_button">
                    <img src="../uploads/user/<?= $_SESSION['admin_vector']; ?>" alt="">
                    <div class="content">
                        <h4><?= $_SESSION['admin_name'] ?></h4>
                        <span><?= $_SESSION['admin_email'] ?></span>
                    </div>
                </div>
            </div>
        </nav>
        <section id="SECTION">
            <?php include "./src/$active_option.php"  ?>
        </section>
    </main>




    <!-- javascript -->
    <!-- <script src="../libs/popper/popper.js"></script> -->
    <script src="../libs/jquery/jquery.js"></script>
    <script src="../libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./js/main.js"></script>
</body>

</html>