<?php
include "../database/DB.php";

if(isset($_POST['c_message'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sub = $_POST['sub'];
    $content = $_POST['content'];


    $DATABASE -> QUERY("INSERT INTO `contact_message` (`name`, `email`, `subject`, `message`) 
    VALUES ('$name', '$email', '$sub', '$content')");
    header("Location: ../page/contact");
}
