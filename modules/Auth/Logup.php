<?php
session_start();
include "../../config/config.php";
include "../../functions/Functions.php";
include "../../database/DB.php";
?>

<?php
if (isset($_POST['logup'])) {
    if (
        !empty($_POST['username']) &&
        !empty($_POST['email']) &&
        !empty($_POST['password'])
    ) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $check = $DATABASE->SELECT("SELECT * FROM customer WHERE customer_email='$email'");
        if (empty($check)) {
            $DATABASE->INSERT(
                    "customer",
                    "customer_name, customer_email, customer_password",
                    "'$username', '$email ', '$password'"
                );
            header("Location: ../../page/Login");
        } else {
            header("Location: ../../page/Logup?logup_err");
        }
        
    } else {
        header("Location: ../../page/Logup?logup_err");
    }
} else {
    header("Location: ../../page/Logup?logup_err");
}

?>