<?php
session_start();

// Проверка, авторизован ли пользователь
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php'); // Перенаправление на страницу входа
    exit;
}
?>