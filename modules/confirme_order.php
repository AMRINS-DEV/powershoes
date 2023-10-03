<?php
session_start();
include "../config/config.php";
include "../functions/Functions.php";
include "../database/DB.php";
?>

<?php
$cid = $_SESSION['customer_id'];
$check = $DATABASE->SELECT("SELECT * FROM adress WHERE customer_id='$cid'");
if (empty($check)) {
    header("Location: ../page/address");
    die();
}

$order_id = $_GET['confirme'];
$sql = "UPDATE orders SET confirmed=1 WHERE order_id=$order_id;";
$DATABASE->DELETE($sql);
header("Location: ../page/Cart");
die();
$DATABASE->CLOSE();
?>