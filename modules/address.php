<?php
session_start();
include "../config/config.php";
include "../functions/Functions.php";
include "../database/DB.php";
?>

<?php
if (isset($_POST['logup'])) {
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $zipcode = $_POST['zipcode'];
    $customer_id = $_SESSION['customer_id'];

    $DATABASE->
    INSERT("`adress`",
    "`customer_id`, `city`, `province`, `zipcode`, `adress`",
    "'$customer_id', '$city', '$province', '$zipcode', '$address'"
);

    $DATABASE -> UPDATE("UPDATE customer SET customer_phone='$phone' WHERE customer_id='$customer_id'");
    header("Location: ../page/Cart");
}

?>