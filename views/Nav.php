<nav id="TopNav">
    <div id="Info_Links" class="d-flex justify-content-between align-items-center p-2">
        <div id="Info" class="d-flex gap-3">
            <div id="Opening_Hour">
                <i class="fa-light fa-clock"></i>
                <span>08:00 PM <i class="fa-light fa-arrow-right"></i> 10:00 AM</span>
            </div>
            <div id="Phone_Number">
                <i class="fa-light fa-phone"></i>
                <span>(+212)-533620015</span>
            </div>
            <div id="Site_Language">
                <ul class="dropdown">
                    <div class="" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-light fa-earth-americas"></i>
                        <span>French</span>
                        <i class="fa-light fa-angle-down"></i>
                    </div>
                    <ul class="language_options_wrp dropdown-menu mt-2" aria-labelledby="dropdownMenuLink">
                        <li class="dropdown-item d-flex justify-content-between align-items-center">Arabic <i class="fa-light fa-hourglass-clock" title="coming soon"></i></li>
                    </ul>
                </ul>
            </div>
        </div>

        <div id="Links" class="d-flex gap-3">
            <a href="../page/Products">Shop</a>
            <a href="../page/Blog">Blog</a>
            <a href="../page/Contact">Contact</a>
            <a href="../page/About">About</a>
        </div>
    </div>

    <div id="Navigation" class="d-flex justify-content-between align-items-center pt-2 pb-2">
        <div id="Logo">
            <a href="../">
                <img src="../public/image/powershoes_logo.svg" alt="site logo">
            </a>
        </div>

        <div id="Search">
            <form action="../modules/filter" method="post" class="d-flex">
                <div id="categorys_Wrp">
                    <select class="form-select shadow-none rounded-0 rounded-start-2 border-0" name="categorys_Input" id="categorys_Input">
                        <option selected>All</option>
                        <option value="Shoes">Shoes</option>
                        <option value="Sports Shoes">Sports Shoes</option>
                        <option value="Electric Shoes">Electric Shoes</option>
                        <option value="Power Shoes">Power Shoes</option>
                    </select>
                </div>
                <div id="Input_Wrp">
                    <input type="text" class="border-bottom border-0 border-top ps-3" name="search_term" id="Search_Input" placeholder="Search Term">
                </div>
                <button type="submit" name="search_button" id="Search_Button" class="rounded-end-2 border-0 text-light">
                    <i class="fa-regular fa-magnifying-glass"></i>
                </button>
            </form>
        </div>

        <div id="Cart_Account" class="d-flex gap-3 align-items-center">
            <div id="Cart" class="position-relative">
                <a href="../page/Cart">
                    <i class="fa-regular fa-cart-shopping position-relative">
                        <?php if (isset($_SESSION['customer_id'])) : ?>
                            <?php
                            $c_id = $_SESSION['customer_id'];
                            $result_count = $DATABASE->SELECT("SELECT COUNT(order_id) As total FROM orders WHERE customer_id=$c_id");
                            ?>
                            <span class="rounded-circle purtchases_count"><?= $result_count[0]['total'] ?></span>
                        <?php endif; ?>
                    </i>
                </a>
            </div>

            <div id="Account">
                <?php if (!isset($_SESSION['customer_id'])) : ?>
                    <ul class="dropdown">
                        <div class="Account_Title rounded-3" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-regular fa-user"></i>
                            <span>Account</span>
                            <i class="fa-light fa-angle-down"></i>
                        </div>
                        <ul class="language_options_wrp dropdown-menu mt-2 p-3" aria-labelledby="dropdownMenuLink">
                            <li class="">
                                <form action="../modules/Auth/Login" method="post" class="d-flex flex-column align-items-center gap-2">
                                    <a href="../page/Login">
                                        <span>Login</span>
                                    </a>
                                    <input type="text" class="ps-2" name="email" id="Email" placeholder="Email">
                                    <input type="password" class="ps-2" name="password" id="Password" placeholder="Password">
                                    <button class="w-100 bg-primary text-light border-0 pb-1 pt-1 rounded-2" id="Login_Button" name="login">Login</button>
                                </form>
                            </li>
                            <li class=" d-flex flex-column align-items-center">
                                <span>OR</span>
                                <a href="../page/Logup">Create New Account</a>
                            </li>
                        </ul>
                    </ul>
                <?php else : ?>
                    <a href="../modules/user_logout.php">
                        <div class="user_button">
                            <img src="../uploads/user/<?= $_SESSION['customer_vector'] ?>" alt="">
                            <div class="content">
                                <h4><?= $_SESSION['customer_name'] ?></h4>
                                <span>click to logout</span>
                            </div>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

</nav>

<nav id="TopNavMobile">
    <div id="Info_Links" class="pt-1 pb-1">
        <div id="Info" class="d-flex justify-content-around">
            <div id="Opening_Hour">
                <i class="fa-light fa-clock"></i>
                <span>08:00 PM <i class="fa-light fa-arrow-right"></i> 10:00 AM</span>
            </div>
            <div id="Phone_Number">
                <i class="fa-light fa-phone"></i>
                <span>(+212)-533620015</span>
            </div>
            <div id="Site_Language">
                <ul class="dropdown">
                    <div class="" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-light fa-earth-americas"></i>
                        <span class="topNav__language">French</span>
                        <i class="fa-light fa-angle-down"></i>
                    </div>
                    <ul class="language_options_wrp dropdown-menu mt-2" aria-labelledby="dropdownMenuLink">
                        <li class="dropdown-item d-flex justify-content-between align-items-center">Arabic <i class="fa-light fa-hourglass-clock" title="coming soon"></i></li>
                    </ul>
                </ul>
            </div>
        </div>
    </div>

    <div id="Navigation" class="d-flex justify-content-between align-items-center pt-2 pb-2">
        <div id="Logo">
            <a href="../">
                <img src="../public/image/powershoes_logo.svg" alt="site logo">
            </a>
        </div>



        <div id="Cart_Account" class="d-flex gap-3 align-items-center">
            <div id="Cart" class="position-relative">
                <a href="">
                    <i class="fa-regular fa-cart-shopping position-relative">
                        <?php if (isset($_SESSION['customer_id'])) : ?>
                            <?php
                            $c_id = $_SESSION['customer_id'];
                            $result_count = $DATABASE->SELECT("SELECT COUNT(order_id) As total FROM orders WHERE customer_id=$c_id");
                            ?>
                            <span class="rounded-circle purtchases_count"><?= $result_count[0]['total'] ?></span>
                        <?php endif; ?>

                    </i>
                </a>
            </div>

            <div id="Account">
                <ul class="dropdown">
                    <div class="Account_Title rounded-3" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-regular fa-user"></i>
                        <span>Account</span>
                        <i class="fa-light fa-angle-down"></i>
                    </div>
                    <ul class="language_options_wrp dropdown-menu mt-2 p-3" aria-labelledby="dropdownMenuLink">
                        <li class="">
                            <form action="" class="d-flex flex-column align-items-center gap-2">
                                <span>Login</span>
                                <input type="text" class="ps-2" name="email" id="Email_2" placeholder="Email">
                                <input type="password" class="ps-2" name="password" id="Password_2" placeholder="Password">
                                <button class="w-100 bg-primary text-light border-0 pb-1 pt-1 rounded-2" id="Login_Button_2" name="login_button">Login</button>
                            </form>
                        </li>
                        <li class=" d-flex flex-column align-items-center">
                            <span>OR</span>
                            <a href="">Create New Account</a>
                        </li>
                    </ul>
                </ul>
            </div>
        </div>
    </div>
    <div id="Search">
        <form action="../modules/filter" method="post" class="d-flex justify-content-center">
            <div id="categorys_Wrp">
                <select class="form-select shadow-none rounded-0 rounded-start-2 border-0" name="categorys_Input" id="categorys_Input_2">
                    <option selected>All</option>
                    <option value="Shoes">Shoes</option>
                    <option value="Sports Shoes">Sports Shoes</option>
                    <option value="Electric Shoes">Electric Shoes</option>
                    <option value="Power Shoes">Power Shoes</option>
                </select>
            </div>
            <div id="Input_Wrp">
                <input type="text" class="border-bottom border-0 border-top ps-3" name="search_term" id="Search_Input_2" placeholder="Search Term">
            </div>
            <button type="submit" name="search_button" id="Search_Button_2" class="rounded-end-2 border-0 text-light">
                <i class="fa-regular fa-magnifying-glass"></i>
            </button>
        </form>
    </div>
    <div id="Links" class="d-flex gap-3 align-items-center justify-content-center pt-3 pb-3">
        <a href="../pagr/Home" class="activeLink">Home</a>
        <a href="../page/Products">Shop</a>
        <a href="../page/Blog">Blog</a>
        <a href="../page/Contact">Contact</a>
        <a href="../page/About">About</a>
    </div>
</nav>