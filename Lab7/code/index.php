<?php
require_once 'AdModel.php';

$model = new AdModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $model->createAd(
        $_POST['email'],
        $_POST['title'],
        $_POST['description'],
        $_POST['category']
    );
    header("Location: " . $_SERVER['PHP_SELF']); // Редирект после отправки
    exit;
}

$ads = $model->getAllAds();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Доска объявлений</title>
</head>
<body>
    <h1>Добавить объявление</h1>
    <form method="POST">
        <input type="email" name="email" required placeholder="Email"><br>
        <input type="text" name="title" required placeholder="Заголовок"><br>
        <textarea name="description" required placeholder="Описание"></textarea><br>
        <select name="category">
            <option value="constraction">Constraction</option>
            <option value="repair">Repair</option>
            <option value="tools">Tools</option>
        </select><br>
        <button type="submit">Опубликовать</button>
    </form>

    <h2>Список объявлений</h2>
    <?php foreach ($ads as $ad): ?>
        <div style="margin-bottom: 20px; border: 1px solid #ccc; padding: 10px;">
            <h3><?= htmlspecialchars($ad['title']) ?></h3>
            <p><?= htmlspecialchars($ad['description']) ?></p>
            <small>
                Категория: <?= htmlspecialchars($ad['category']) ?> | 
                Автор: <?= htmlspecialchars($ad['email']) ?> | 
                Дата: <?= $ad['created'] ?>
            </small>
        </div>
    <?php endforeach; ?>
</body>
</html>