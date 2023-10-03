<footer id="Footer">
    <div class="Col1">
        <div class="Logo">
            <img src="../public/image/logo_v_fff.svg" alt="">
        </div>
        <div class="Payment-icons">
            <i class="<?= visa ?>"></i>
            <i class="<?= mastercard ?>"></i>
            <i class="<?= discover ?>"></i>
            <i class="<?= amex ?>"></i>
            <i class="<?= paypal ?>"></i>
            <i class="<?= stripe ?>"></i>
        </div>
    </div>
    <div class="Col2">
        <div class="C_Model">
            <i class="fa-regular fa-phone"></i>
            <span><?= PHONE_1 ?></span>
        </div>
        <div class="C_Model">
            <i class="fa-regular fa-phone-rotary"></i>
            <span><?= PHONE_2 ?></span>
        </div>
        <div class="C_Model">
            <i class="fa-regular fa-envelope"></i>
            <span><?= EMAIL ?></span>
        </div>
    </div>
    <div class="row"></div>
    <div class="Col3">
        <ul class="Footer_List">
            <li>OUR SERVICES</li>
            <?php foreach(FOOTER_LIST_1 as $item) : ?>
                <li>
                    <i class="fa-regular fa-circle-dot"></i>
                    <span><?= $item ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="Col4">
        <ul class="Footer_List">
            <li>INFORAMATION</li>
            <?php foreach(FOOTER_LIST_2 as $item) : ?>
                <li>
                    <i class="fa-regular fa-circle-dot"></i>
                    <span><?= $item ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="copyright">
        <p>
            COPYRIGHT &COPY; 2023 <span class="gradient_text">POWERSHOES.COM</span>ALL RIGHT RESERVED
        </p>
    </div>
</footer>