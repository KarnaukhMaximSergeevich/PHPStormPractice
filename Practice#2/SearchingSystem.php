<?php
if(isset($_GET['search'])) {
    // !!! TODO 1: ваш код обработки GET запроса; выполнения запроса через cURL в поисковую систему; подготовка данных для отрисовки

    $search_query = urlencode($_GET['search']);
    $api_key = 'AIzaSyDa9eOMy3mvSoYBmsU2Mb1WH3TXniV8tVU'; // Замените на свой ключ API
    $cx = 'a61791b5629a04e73'; // Замените на свой идентификатор пользователя

    $url = "https://www.googleapis.com/customsearch/v1?q={$search_query}&key={$api_key}&cx={$cx}";

    $ch = curl_init(); // открыть сеанс cURL
    curl_setopt($ch, CURLOPT_URL, $url); // установить параметр $url
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // вернуть ответ в строку
    $resultJson = curl_exec($ch); // выполнить запрос
    curl_close($ch); // закрыть сеанс cURL

    if ($resultJson === false) {
        // Обработка ошибок cURL
        echo 'Ошибка cURL: ' . curl_error($ch);
    } else {
        // Обработка успешного запроса
        $search_results = json_decode($resultJson, true);
        // Далее вы можете обработать $search_results, чтобы извлечь необходимую информацию
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h2>My Browser</h2>
<form method="GET" action="">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search" value=""><br><br>
    <input type="submit" value="Submit">
</form>

<?php
// !!! TODO 2: ваш код отрисовки ответа
if (isset($search_results)) {
    // Добавьте код для отрисовки результатов поиска
    foreach ($search_results['items'] as $item) {
        echo '<p><a href="' . $item['link'] . '">' . $item['title'] . '</a><br>';
        echo $item['snippet'] . '</p>';
    }
}
?>
</body>
</html>
