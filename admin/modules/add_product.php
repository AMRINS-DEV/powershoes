<?php
session_start();
include "../../database/DB.php";
include "../../functions/Functions.php";
include "../../config/config.php";

$product_name = addslashes($_POST['product_name']);
$product_brand = addslashes($_POST['product_brand']);
$product_category = addslashes($_POST['product_category']);
$product_description = addslashes($_POST['product_description']);
$product_price = $_POST['product_price'];
$product_discount = $_POST['product_discount'];
$color = $_POST['color'];

$product_size = $_POST['product_size'];
$product_stock = $_POST['product_stock'];


$DATABASE->INSERT(
    "`product`",
    "`name`, `price`, `discount`, `description`, `varient`, `brand`, `category`",
    "'$product_name', '$product_price', '$product_discount', '$product_description','$color', '$product_brand', '$product_category'"
);

$product_id = $DATABASE->ID();

// Add Size And Quantity
for ($i = 0; $i < count($product_size); $i++) {
    $size = $product_size[$i];
    $quantity = $product_stock[$i];
    $DATABASE -> INSERT(
        "`product_size`", 
        "`product_id`, `size`, `quantity`",
        "'$product_id', '$size', '$quantity'"
    );
}


// Add size and quantity
$images_array = $_FILES['product_image'];
$uploadsDir = "../../uploads/products/";

for ($i = 0; $i < count($images_array['tmp_name']); $i++) {
    $newFileName = "product_".$product_id ."_" . $images_array['name'][$i];
    $tmpName = $images_array['tmp_name'][$i];
    move_uploaded_file($tmpName, $uploadsDir . $newFileName);

    $DATABASE->INSERT(
        "`product_image`",
        "`product_id`, `product_image`",  
        "'$product_id', '$newFileName'"
    );
}
$DATABASE -> CLOSE();
header("Location: ../?add_product");
die();

?>