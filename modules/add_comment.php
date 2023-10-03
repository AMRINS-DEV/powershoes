<?php
session_start();
include "../config/config.php";
include "../functions/Functions.php";
include "../database/DB.php";
include "../views/Post_Card.php";

if (isset($_POST['add_post'])) {
    $content = $_POST['content'];
    $customer_id = $_SESSION['customer_id'];
    $post_id = $_POST['post_id'];

    $DATABASE->
    QUERY("INSERT INTO `blog_comments` (`customer_id`, `post_id`, `com_content`)
            values ('$customer_id', '$post_id', '$content')");

    header("Location: ../page/PostDetails?post=$post_id#comments");
} else {
    header("Location: ../page/Blog");
}
