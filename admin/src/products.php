<div id="Products_wrp">
    <div>
        <?php
        $sql = "SELECT * FROM product";
        $products = $DATABASE->SELECT($sql);
        ?>
    </div>
    <?php
    ?>
    <div class="products_cards_container">
        <div class="products">
            <?php
            if (count($products) > 0) {
                foreach ($products as $row) {
                    $product_id = $row['product_id'];
                    $sql = "SELECT * FROM product_image WHERE product_id = $product_id ;";
                    $images = $DATABASE->SELECT($sql);

                    ProductCard(
                        $product_id,
                        $images[0]['product_image'],
                        $row['name'],
                        $row['brand'],
                        $row['price'],
                        $row['category'],
                    );
                }
            }
            ?>
        </div>
    </div>
</div>