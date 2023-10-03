<?php
session_start();
include "../../config/config.php";
include "../../functions/Functions.php";
include "../../database/DB.php";
?>

<?php
    if(isset($_POST['login'])) {
        if(
            !empty($_POST['email']) &&
            !empty($_POST['password'])
        ) {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            $check = $DATABASE -> SELECT("SELECT * FROM `admin` WHERE admin_email='$email' AND admin_password='$password'");
            if(!empty($check)) {
                $data = $check[0];

                setSession(
                    ['admin_id', 'admin_name', 'admin_email', 'admin_password', 'admin_phone', 'admin_vector', 'admin_added',],
                    [$data['admin_id'],$data['admin_name'],$data['admin_email'],$data['admin_password'],$data['admin_phone'],$data['admin_vector'],$data['admin_added']]
                );
                header("Location: ../");
            } else {
                header("Location: ../login?login_err");
            }
        } else {
            header("Location: ../login?login_err");
        }
    } else {
        header("Location: ../login?login_err");
    }

?>