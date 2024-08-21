<?php
header('Content-Type: application/json');

// Подключение к базе данных
$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "law";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Запрос данных из таблицы requests
$sql = "SELECT id, name, number, request FROM requests";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);

$conn->close();
?>