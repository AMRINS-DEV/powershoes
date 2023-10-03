<?php
    session_start();

    include "../functions/Functions.php";

    unsetSession(
        ['customer_id', 'customer_name', 'customer_email', 'customer_password', 'customer_phone', 'customer_vector', 'customer_added',]
    );

    header("Location: ../page/Home");