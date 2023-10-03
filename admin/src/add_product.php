<form id='ADD_PRODUCT' action='./modules/add_product' method='post' enctype='multipart/form-data'>
    <div class='Product_Information'>
        <h4>Basic Inforamtion</h4>
        <div class='input_wrp'>
            <div class='input'>
                <label for='product_brand'>Product Name</label>
                <input type='text' name='product_name' id='product_name'>
            </div>
        </div>
        <div class='input_wrp'>
            <div class='input'>
                <label for='product_brand'>Product Brand</label>
                <input type='text' name='product_brand' id='product_brand'>
            </div>
        </div>
        <div class='input_wrp'>
            <div class='input'>
                <label for='product_category'>Product category</label>
                <input type='text' name='product_category' id='product_category'>
            </div>
        </div>
        <div class='input_wrp'>
            <div class='input' style='height: 300px;'>
                <label for='product_description' style='top: 10px;'>Product Description</label>
                <textarea name='product_description' id='product_description' style='padding-top: 10px'></textarea>
            </div>
        </div>

        <h4 style='margin-top: 80px;'>Product Price</h4>
        <div class='input_wrp'>
            <div class='input'>
                <label for='product_price'>Product Price</label>
                <input type='text' name='product_price' id='product_price'>
            </div>
        </div>
        <div class='input_wrp'>
            <div class='input'>
                <label for='product_discount'>Product Discount</label>
                <input type='text' name='product_discount' id='product_discount'>
            </div>
        </div>

        <h4 style='margin-top: 30px;'>Product Size/Stock</h4>
        <div class='ss_container'>
            <div class='add_ss'>
                <i class='fa-solid fa-plus'></i>
            </div>
            <div class='input_wrp'>
                <div class='input'>
                    <label for='product_size_1'>Product Size</label>
                    <input type='text' name='product_size[]' id='product_size_1'>
                </div>
                <div class='input'>
                    <label for='product_stock_1'>Product Stock</label>
                    <input type='text' name='product_stock[]' id='product_stock_1'>
                </div>
            </div>
        </div>
    </div>

    <div class='Product_Extra_Info'>
        <!-- Add Images -->
        <div class="add_images">
            <h4 class="w-100 pb-4">Product Images</h4>
            <div>
                <label for="file_input" class="w-100" id="addImage__lable">
                    <i class="fa-light fa-cloud-arrow-up"></i>
                    <p child="p1">Drag & Drop or <span>Choose file</span> to upload</p>
                    <p child="p2">supported formats: JPG, JPEG, PNG</p>
                </label>
                <input type="file" id="file_input" name="product_image[]" multiple class="form-control w-50 img_input">
            </div>
            <div class="gallery">
                <div class="gap-4" id="Controles">
                    <i id="Left1" class="fa-solid fa-angle-left"></i>
                    <span class="count">0</span>
                    <i id="Right1" class="fa-solid fa-angle-right"></i>
                </div>
                <div id="Carousel" class="d-grid">
                </div>
            </div>
        </div>

        <div class="add_color w-100">
            <h4 class="w-100 pb-4">Product Varient</h4>
            <div class="border mb-3 w-100 d-flex align-items-center pt-2 pb-2  color-input-wrp flex-wrap gap-4">
                <?php foreach (COLOR as $value) { ?>
                    <div class="form-check form-check-inline d-flex">
                        <input class="color__input form-check-input  d-none" type="radio" name="color" id="<?= $value["name"] ?>" value="<?= $value["code"] ?>">
                        <label title="<?= $value ?>" class="color__input_label form-check-label rounded-1 border" for="<?= $value["name"] ?>" style="width: 30px; height: 30px; background-color: #<?= $value["code"] ?>;">
                        </label>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="form_button">
        <button type="reset" onclick="
            let [...lbs] = document.querySelectorAll('.input label')
            lbs.forEach(item => {
                item.style.transform = 'translateY(0)'
                item.parentElement.style.borderColor = '#e7e7e7';
            })
        ">Cancel</button>
        <button type="submit" name="Add_Product">Add Product</button>
    </div>
</form>