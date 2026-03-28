<?php
//Разрешаем запросы с других сайтов (для Postman)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");
//Проверяем метод - только POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["error" => "Только POST метод разрешен"]);
    exit;
}
//Получаем JSON из запроса
$inputJSON = file_get_contents('php://input');
$data = json_decode($inputJSON, true);
//Проверяем, что прислали картинку
if (!isset($data['image']) || !isset($data['filename'])) {
    http_response_code(400);
    echo json_encode(["error" => "Нужно отправить image и filename"]);
    exit;
}
//Создаем папку static, если её нет
if (!file_exists('static')) {
    mkdir('static', 0777, true);
}
//Декодируем base64 в картинку
$imageData = base64_decode($data['image']);
// Проверяем, что декодирование прошло успешно
if ($imageData === false) {
    http_response_code(400);
    echo json_encode(["error" => "Неверный формат base64"]);
    exit;
}
//Создаем имя файла (время_оригинальное_имя)
$filename = time() . '_' . $data['filename'];
$filepath = 'static/' . $filename;
//  Сохраняем файл
if (file_put_contents($filepath, $imageData)) {
    echo json_encode([
        "success" => true,
        "message" => "Файл сохранен",
        "file" => $filepath
    ]);
} 
else {
    http_response_code(500);
    echo json_encode(["error" => "Не удалось сохранить файл"]);
}
?>