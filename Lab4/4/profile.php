<?php
session_start();

if (!isset($_SESSION['user'])) {
    header ('Location: form.php');
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Профиль питомца</title>
    </head>
    <body>
        <h1>Данные</h1>
        <p><strong>Имя:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
        <p><strong>Вид:</strong> <?php echo htmlspecialchars($user['type']); ?></p>
        <p><strong>Возраст:</strong> <?php echo htmlspecialchars($user['age']); ?></p>
        <a href="form.php">На Главную</a>
    </body>
</html>