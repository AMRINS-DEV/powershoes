<?php
session_start();
include "../../database/DB.php";
include "../../functions/Functions.php";
include "../../config/config.php";


if (isset($_POST['add_post'])) {
    if (!empty($_POST['post_title']) && !empty($_POST['post_title']) && $_FILES['post_image']) {
        $post_title = addslashes($_POST['post_title']);
        $post_content = addslashes($_POST['post_content']);
        $posted_by = $_SESSION['admin_name'];

        $images_array = $_FILES['post_image'];
        $uploadsDir = "../../uploads/blog/";
        $fileName = $images_array['name'];
        $newFileName = "post_" . randomString() . "_" . $fileName;
        $fileData = $images_array['tmp_name'];
        move_uploaded_file($fileData, $uploadsDir.$newFileName);
        

        $DATABASE -> 
        INSERT(
            "`blog`", 
            "`post_title`, `post_content`, post_image, `posted_by`", 
            "'$post_title', '$post_content', '$newFileName', '$posted_by'"
        );
        header("Location: ../?add_post");
    } else {
        header("Location: ../");
    }
} else {
    header("Location: ../");
}
