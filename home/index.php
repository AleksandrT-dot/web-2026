<?php
$posts = [
    [
        'id' => 1,
        'author_name' => 'Ваня Денисов',
        'author_avatar' => 'avatar_ivan.jpg',
        'photo' => 'photo_ivan.jpg',
        'likes' => 203,
        'description' => 'Так красиво сегодня на улице! Настоящая зима)) Вспоминается Бродский: «Поздно ночью, в уснувшей долине, на самом дне, в гор...»',
        'time_ago' => 1773913800,
        'has_multiple_photos' => true,
        'has_edit' => true
    ],
    [
        'id' => 2,
        'author_name' => 'Лиза Дёмина',
        'author_avatar' => 'avatar_liza.jpg',
        'photo' => 'photo_liza.jpg',
        'likes' => 534,
        'description' => '',
        'time_ago' => 1773827400,
        'has_multiple_photos' => false,
        'has_edit' => false
    ]
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
    <link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400;500;600;700;800;900&dis
    play=swap" rel="stylesheet">
    <link href= "home_style.css" rel="stylesheet">
    <meta charset="UTF-8">
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <div class="net-feed">
        <?php 
        foreach ($posts as $post) {
            include 'post_preview.php';
        }
        ?>
    </div>
</body>
</html>