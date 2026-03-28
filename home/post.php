<?php
// Получаем ID поста из GET-параметра
$post_id = isset($_GET['postId']) ? (int)$_GET['postId'] : 0;
$post = [
    'id' => $post_id,
    'author_name' => 'Ваня Денисов',
    'author_avatar' => 'avatar_ivan.jpg',
    'photo' => 'photo_ivan.jpg',
    'likes' => 203,
    'description' => 'Так красиво сегодня на улице! Настоящая зима)) Вспоминается Бродский: «Поздно ночью, в уснувшей долине, на самом дне, в городке, занесенном снегом по ручку двери...»',
    'time_ago' => 1773913800,
    'has_multiple_photos' => true,
    'has_edit' => true
];
function timeAgo($timestamp) {
    $now = time();
    $diff = $now - $timestamp;
    if ($diff < 60) {
        return 'только что';
    } 
    elseif ($diff < 3600) {
        $min = floor($diff / 60);
        return $min . ' ' . plural($min, 'минута', 'минуты', 'минут') . ' назад';
    } 
    elseif ($diff < 86400) {
        $hours = floor($diff / 3600);
        return $hours . ' ' . plural($hours, 'час', 'часа', 'часов') . ' назад';
    } 
    elseif ($diff < 2592000) {
        $days = floor($diff / 86400);
        return $days . ' ' . plural($days, 'день', 'дня', 'дней') . ' назад';
    } 
    else {
        return date('d.m.Y', $timestamp);
    }
}
function plural($n, $one, $two, $five) {
    if ($n % 10 == 1 && $n % 100 != 11) {
        return $one;
    } 
    elseif ($n % 10 >= 2 && $n % 10 <= 4 && ($n % 100 < 10 || $n % 100 >= 20)) {
        return $two;
    } 
    else {
        return $five;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="post_style.css" rel="stylesheet">
    <meta charset="UTF-8">
</head>
<body>
    <h1 class="post-num">Пост №<?= $post_id ?></h1>
    <div class="net-feed">
        <div class="net-feed__post">
            <form class="net-feed__posting-user">
                <div class="net-feed__user">
                    <img class="net-feed__avatar" src="images\<?= $post['author_avatar'] ?>" alt="unknown avatar">
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
                </form>
            <?php endif; ?>
            <form class="net-feed__time-posted">
                <p class="net-feed__time"><?= timeAgo($post['time_ago']) ?></p>
            </form>
        </div>
    </div>
</body>
</html>