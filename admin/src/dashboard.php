<div id="statis">
    <div class="state_card">
        <h1>
            <?= $DATABASE->SELECT("SELECT COUNT(customer_id) as c FROM customer;")[0]['c']; ?>
            <i class="fa-solid fa-user"></i>
        </h1>
        <div class="title">Our Customers</div>
    </div>
    <div class="state_card">
        <h1>
            <?= $DATABASE->SELECT("SELECT COUNT(order_id) as c FROM orders;")[0]['c']; ?>
            <i class="fa-solid fa-cart-shopping"></i>
        </h1>
        <div class="title">Orders</div>
    </div>
    <div style="flex-basis: 100%;"></div>
    <div class="state_card">
        <h1>
            <?= $DATABASE->SELECT("SELECT COUNT(order_id) as c FROM orders WHERE confirmed=1;")[0]['c']; ?>
            <i class="fa-solid fa-cart-shopping"></i>
        </h1>
        <div class="title">Confirmed Orders</div>
    </div>
    <div class="state_card">
        <h1>
            <?= $DATABASE->SELECT("SELECT COUNT(product_id) as c FROM product")[0]['c']; ?>
            <i class="fa-light fa-boxes-stacked"></i>
        </h1>
        <div class="title">Products</div>
    </div>
</div>