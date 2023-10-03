<?php
    session_start();

    include "../../functions/Functions.php";

    unsetSession(
        ['admin_id', 'admin_name', 'admin_email', 'admin_password', 'admin_phone', 'admin_vector', 'admin_added',]
    );

    header("Location: ../");