<?php
session_start();
include "../config/config.php";
include "../functions/Functions.php";
include "../database/DB.php";
?>

<?php
    $order_id = $_GET['order'];
    $sql = "DELETE FROM orders WHERE order_id=$order_id;";
    $DATABASE -> DELETE($sql);
    header("Location: ../page/Cart");

?>