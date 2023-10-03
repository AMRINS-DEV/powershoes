<div id="cart_container">

    <?php
    $orders = $DATABASE->SELECT("SELECT * FROM `orders` INNER JOIN product ON product.product_id = orders.product_id");
    foreach ($orders as $row) :
        $product_id = $row['product_id'];
        $result_image = $DATABASE->SELECT("SELECT product_image FROM `product_image` WHERE product_id=$product_id");
        $result_image = $result_image[0];
    ?>
        <div class="card_m2">
            <img src="../uploads/products/<?= $result_image['product_image'] ?>" alt="">
            <div class="cont">
                <h4><?= $row['brand'] ?></h4>
                <div>
                    <h3><?= $row['name'] ?></h3>
                    <h3 class="price"><?php echo $row['price'] - ($row['price'] * $row['discount']) ?> DH</h3>
                </div>
                <p><?= limit_words($row['description'], 20) ?></p>
                <a href="../modules/delete_order?order=<?= $row['order_id'] ?>">Delete</a>
            </div>
        </div>
    <?php
    endforeach;
    ?>

</div>