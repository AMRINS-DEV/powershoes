<?php function Post_Card($img, $date, $postedby, $content, $postid) {?>
<div id="post_card">
    <img src="../uploads/blog/<?= $img ?>" alt="">
    <div class="info">
        <div class="date">
            <i class="fa-light fa-calendar-days"></i>
            <span><?= $date ?></span>
        </div>
        <div class="name">
            <i class="fa-solid fa-user"></i>
            <span><?= $postedby ?></span>
        </div>
    </div>
    <p>
    <?= $content ?>
    </p>
    <a href="../page/PostDetails?post=<?= $postid ?>">
        Read More
    </a>
</div>

<?php }; ?>