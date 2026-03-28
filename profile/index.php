<?php
$user = [
    'id' => 1,
    'name' => 'Ваня Денисов',
    'avatar' => 'avatar_ivan.jpg',
    'bio' => 'Привет! Я системный аналитик в ACME :) Тут моя жизнь только для самых классных!',
    'posts_count' => 43
];
$user_photos = [
    'photo_ivan.jpg',
    'photo_bilding.jpg',
    'photo_cake.jpg',
    'photo_party.jpg',
    'photo_coffee.jpg',
    'photo_book.jpg',
    'photo_sunny_day.jpg',
    'photo_friends.jpg',
    'photo_pot.jpg',
    'photo_bridge.jpg',
    'photo_sunrise.jpg',
    'photo_mountains.jpg',
    'photo_night.jpg',
    'photo_sandwich.jpg',
    'photo_flower.jpg'
];
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="profile_style.css" rel="stylesheet">
    <meta charset="UTF-8">
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <form class="avatar-info">
        <img class="avatar-info__avatar" src="images\<?= $user['avatar'] ?>" alt="avatar пользователя">
        <p class="avatar-info__name"><?= $user['name'] ?></p>
        <p class="avatar-info__prescription"><?= $user['bio'] ?></p>
        <div class="avatar-info__count-posts">
            <img class="avatar-info__item" src="images\item_image.png" alt="posts">
            <p class="avatar-info__count"><?= $user['posts_count'] ?> постов</p>   
        </div>
    </form>
    <form class="photo-grid">
        <?php foreach ($user_photos as $photo): ?>
            <img class="photo-grid__photo" src="images\<?= $photo ?>" alt="фото пользователя">
        <?php endforeach; ?>
    </form>
</body>
</html>