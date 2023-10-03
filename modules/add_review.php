<?php
session_start();
include "../config/config.php";
include "../functions/Functions.php";
include "../database/DB.php";
include "../views/Post_Card.php";

if (isset($_POST['add_comment'])) {
    $content = $_POST['content'];
    $customer_id = $_SESSION['customer_id'];
    $product_id = $_POST['product_id'];


    $DATABASE->INSERT(
        "`product_reviews`",
        "`customer_id`, `product_id`, `rev_comment`",
        "'$customer_id', '$product_id', '$content'"
    );

    header("Location: ../page/Details?product=$product_id#comments");
} else {
    header("Location: ../page/Products");
}
