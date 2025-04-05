<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $age = $_POST['age'];

    $_SESSION['user'] = [
        'name' => $name,
        'type' => $type,
        'age' => $age
    ];
    header('Location: profile.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Task 4</title>
    </head>
    <body>
        <h1>Введите данные питомца</h1>
        <form method="POST">
            <label for="name">Имя</label>
            <input type="text" id="name" name="name" required><br><br>
            
            <label for="type">Вид</label>
            <input type="text" id="type" name="type" required><br><br>
            
            <label for="age">Возраст</label>
            <input type="text" id="age" name="age" required><br><br>
            
            <button>Отправить</button>
        </form>
    </body>
</html>