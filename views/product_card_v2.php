<?php
function ProductCard($id, $img, $title, $brand, $price, $cat)
{ ?>
    <article style="border: 0.5px solid #e7e7e7;" class="text-center rounded-3 position-relative" product-id="<?= $id; ?>">
        <div class="c_tools">
            <i class="fa-regular fa-trash battery delet_product" style="color: #e13939;" onclick="Delete_Product(this)" >
            </i>

            <a href="./modules/edit_product.php?product=<?= $id; ?>">
                <i class="fa-regular fa-pen-to-square" style="color: #ffd700;" id="edit_product">
                </i>
            </a>
        </div>
        <img class="w-100" src="../uploads/products/<?= $img ?>" alt="">
        <h4 style="color: grey; font-size: 13px;"><?= $brand ?></h4>
        <a href="../page/Details?product=<?= $id; ?>">
            <h4 style="border-top: 0;"><?= $title ?></h4>
        </a>
        <div class="pands d-flex justify-content-between w-100">
            <div class="price"><?= $price ?>DH</div>
            <div class="stars d-flex gap-1">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </div>
        </div>
    </article>
<?php } ?>