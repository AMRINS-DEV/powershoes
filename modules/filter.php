<?php
session_start();

if(isset($_SESSION['order'])) {
    unset($_SESSION['order']);
}

if(isset($_POST['price'])) {

    if(!empty($_POST['price1'])) {
        $_SESSION['price1'] = $_POST['price1'];
    } else {
        $_SESSION['price1'] = 10;
    }

    if(!empty($_POST['price2'])) {
        $_SESSION['price2'] = $_POST['price2'];
    } else {
        $_SESSION['price2'] = 9999;
    }
}

if(isset($_POST['search_button'])) {
    unset($_SESSION['price1']);
    unset($_SESSION['price2']);
    unset($_SESSION['order']);
    unset($_SESSION['brand']);
    unset($_SESSION['color']);
    unset($_SESSION['category']);
    unset($_SESSION['size']);

    $_SESSION['name'] = $_POST['search_term'];
    if(!empty($_POST['categorys_Input'])) {
        if($_POST['categorys_Input'] != 'All') {
            $_SESSION['category'] = $_POST['categorys_Input'];
        }
    }
}

if(isset($_GET['order']) && !empty($_GET['order'])) {
    $_SESSION['order'] = $_GET['order'];
}

if(isset($_GET['brand']) && !empty($_GET['brand'])) {
    $_SESSION['brand'] = $_GET['brand'];
}

if(isset($_GET['category']) && !empty($_GET['category'])) {
    $_SESSION['category'] = $_GET['category'];
}


if(isset($_GET['color']) && !empty($_GET['color'])) {
    $_SESSION['color'] = $_GET['color'];
}
if(isset($_GET['size']) && !empty($_GET['size'])) {
    $_SESSION['size'] = $_GET['size'];
}
if(isset($_GET['size']) && !empty($_GET['size'])) {
    $_SESSION['size'] = $_GET['size'];
}
// remove filters
if(isset($_GET['clear']) && !empty($_GET['clear'])) {
    $sname = $_GET['clear'];
    unset($_SESSION[$sname]);
}

if(isset($_GET['clearp'])) {
    unset($_SESSION['price1']);
    unset($_SESSION['price2']);
}
if(isset($_GET['clear_all'])) {
    unset($_SESSION['price1']);
    unset($_SESSION['price2']);
    unset($_SESSION['order']);
    unset($_SESSION['brand']);
    unset($_SESSION['color']);
    unset($_SESSION['category']);
    unset($_SESSION['size']);
}

header("Location: ../page/Products");
