<form id='ADD_PRODUCT' action='./modules/add_post' method='post' enctype='multipart/form-data'>
    <div class='Product_Information'>
        <h4>Add Post</h4>
        <div class='input_wrp'>
            <div class='input'>
                <label for='post_title'>Post Title</label>
                <input type='text' required name='post_title' id='post_title'>
            </div>
        </div>

        <div class='input_wrp'>
            <div class='input' style='height: 300px;'>
                <label for='post_content' style='top: 10px;'>Post Content</label>
                <textarea name='post_content' required id='post_content' style='padding-top: 10px'></textarea>
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
                <input type="file" id="file_input" name="post_image" required class="form-control w-50 img_input">
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
    </div>
    <div class="form_button">
        <button type="reset" onclick="
            let [...lbs] = document.querySelectorAll('.input label')
            lbs.forEach(item => {
                item.style.transform = 'translateY(0)'
                item.parentElement.style.borderColor = '#e7e7e7';
            })
        ">Cancel</button>
        <button type="submit" name="add_post">Add Product</button>
    </div>
</form>