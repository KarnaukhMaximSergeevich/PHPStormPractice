<?php
$url = "https://doc.qt.io/qtforpython-6/quickstart.html#quick-start"; // замените на ваш URL
$ch = curl_init(); // открыть сеанс cURL
curl_setopt($ch, CURLOPT_URL, $url); // установить параметр $url
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // вернуть ответ в строку
$resultJson = curl_exec($ch); // выполнить запрос
curl_close($ch); // закрыть сеанс cURL

if ($resultJson === false) {
    // Обработка ошибок
    echo 'Ошибка cURL: ' . curl_error($ch);
} else {
    // Обработка успешного запроса
    var_dump($resultJson);
}
?>
