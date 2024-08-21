<?php
session_start();
session_unset();
session_destroy();
header('Location: ../auth'); // Перенаправление на страницу входа
exit;
?>