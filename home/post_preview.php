<a href="post.php?postId=<?= $post['id'] ?>" class="net-feed__post-link">
    <div class="net-feed__post">
        <form class="net-feed__posting-user">
        <div class="net-feed__user"> 
                <img class="net-feed__avatar" src="images\<?= $post['author_avatar'] ?>" alt="avatar">
                <p class="net-feed__name"><?= $post['author_name'] ?></p>
        </div>
            <?php if (isset($post['has_edit']) && $post['has_edit']): ?>
                <img class="net-feed__item-edit" src="images\item_edit.png" alt="edit">
            <?php endif; ?>
        </form>
        <form class="net-feed__main-photo">
            <img class="net-feed__posted-photo" src="images\<?= $post['photo'] ?>" alt="photo">
            <?php if (isset($post['has_multiple_photos']) && $post['has_multiple_photos']): ?>
                <div class="net-feed__navigation-photo">
                    <img class="net-feed__item net-feed__item_active" src="images\slider_active.png" alt="next">
                    <img class="net-feed__item net-feed__item_unactive" src="images\slider_unactive.png" alt="prev">
                    <img class="net-feed__item-num-page" src="images\item_num_page.png" alt="first">
                </div>
            <?php endif; ?>
        </form>
        <form class="net-feed__count-reaction">
            <button class="net-feed__reaction" type="button">❤️</button>
            <p class="net-feed__count"><?= $post['likes'] ?></p>    
        </form>
        <?php if (!empty($post['description'])): ?>
            <form class="net-feed__prescription">
                <p class="net-feed__user-text"><?= $post['description'] ?></p>
                <p class="net-feed__more">ещё</p>            
            </form>
        <?php endif; ?>
        <form class="net-feed__time-posted">
            <p class="net-feed__time"><?= timeAgo($post['time_ago']) ?></p>
        </form>
    </div>
</a>