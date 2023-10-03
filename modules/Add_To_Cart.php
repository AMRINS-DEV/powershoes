<?php
session_start();
include "../config/config.php";
include "../functions/Functions.php";
include "../database/DB.php";
?>

<?php
    if(isset($_POST['add_to_card']) && isset($_SESSION['customer_id'])) {
        if(
            !empty($_POST['selected_size']) &&
            !empty($_POST['product_id']) &&
            !empty($_POST['count'])
        ) {
            $product_id = $_POST['product_id'];
            $customer_id = $_SESSION['customer_id'];
            $size_id = $_POST['selected_size'];
            $count = $_POST['count'];
            
            $DATABASE -> 
                INSERT(
                    "orders",
                    "`customer_id`, `product_id`, `size_id`, `count`",
                    "'$customer_id', '$product_id', '$size_id', '$count'"
                );
            header("Location: ../page/Cart");
        }
    } else {
        header("Location: ../page/Login");
    }

?>