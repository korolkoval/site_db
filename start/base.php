<?php 
    $server = "127.0.0.1";
    $login = "root";
    $pass = "";  // Если пароль пустой
    $name_db = "users";  

    // Установка соединения с базой данных
    $link = mysqli_connect($server, $login, $pass, $name_db);

    // Проверка подключения
    if (!$link) {
        die("Ошибка подключения: " . mysqli_connect_error());
    }
?>
