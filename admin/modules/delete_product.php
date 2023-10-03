<?php
include "../../database/DB.php";

if (isset($_GET['product'])) {
    $product_id = trim($_GET['product']);
    $sql = "DELETE FROM product WHERE product_id='$product_id';";
    $DATABASE -> DELETE($sql);

    $sql = "DELETE FROM product_size WHERE product_id='$product_id';";
    $DATABASE -> DELETE($sql);

    $sql = "DELETE FROM product_image WHERE product_id='$product_id';";
    $DATABASE->DELETE($sql);

    echo '200';
}
?>