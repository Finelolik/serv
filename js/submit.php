<?php
// Конфигурация базы данных
$servername = "localhost";
$username = "admin"; // Замените на ваш логин
$password = "admin"; // Замените на ваш пароль
$dbname = "law"; // Имя вашей базы данных

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение данных из формы
$name = $_POST['name'];
$phone = $_POST['phone'];
$text = $_POST['text'];

// Подготовка и выполнение SQL-запроса
$sql = "INSERT INTO requests (name, number, request) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $phone, $text);

if ($stmt->execute()) {
    echo "Новая запись успешно добавлена";
} else {
    echo "Ошибка: " . $stmt->error;
}

// Закрытие соединения
$stmt->close();
$conn->close();
?>