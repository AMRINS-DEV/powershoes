<?php
session_start();
include "../../config/config.php";
include "../../functions/Functions.php";
include "../../database/DB.php";
?>

<?php
if (isset($_POST['login'])) {
    if (
        !empty($_POST['email']) &&
        !empty($_POST['password'])
    ) {
        $email = trim($_POST['email']);
        $password = trim(md5($_POST['password']));

        $check = $DATABASE->SELECT("SELECT * FROM customer WHERE customer_email='$email' AND customer_password='$password'");
        if (!empty($check)) {
            $data = $check[0];

            setSession(
                ['customer_id', 'customer_name', 'customer_email', 'customer_password', 'customer_phone', 'customer_vector', 'customer_added',],
                [$data['customer_id'],$data['customer_name'],$data['customer_email'],$data['customer_password'],$data['customer_phone'],$data['customer_vector'],$data['customer_added']]
            );
            header("Location: ../../page/Home");
        } else {
            header("Location: ../../page/login?login_err");
        }
    } else {
        header("Location: ../../page/login?login_err");
    }
} else {
    header("Location: ../../page/login?login_err");
}

?>