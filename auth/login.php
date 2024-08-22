<?php
session_start();

// Проверка отправки формы
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Простой пример проверки (замените на проверку из базы данных)
    if ($username == 'admin' && $password == 'password') {
        $_SESSION['username'] = $username; // Сохранение имени пользователя в сессии
        $_SESSION['loggedin'] = true;
        header('Location: ../admin'); // Перенаправление на защищенную страницу
        exit;
    } else {
        $error = 'Неверное имя пользователя или пароль.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styleauth.css" />
    <title>Login</title>
</head>
<body>
    <div class="auth">
        <form class="authbox" action="login.php" method="post">
            <input class="custominput" type="text" id="username" name="username" required>
            <input class="custominput" type="password" id="password" name="password" required>
            <button class="submit" type="submit">Войти</button>
     </form>
    </div>
    <?php if (isset($error)) echo '<p>' . $error . '</p>'; ?>
</body>
</html>