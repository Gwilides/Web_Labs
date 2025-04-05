<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['userText'])) {
    $text = $_POST['userText'];
    $words = preg_split('/\s+/', $text);
    $wordsConsonant = preg_grep('/^[бвгджзйклмнпрстфхцчшщ]/ui', $words);
    $wordsCount = count($wordsConsonant);

    echo "<p>Количество слов, начинающихся с согласной: $wordsCount</p>";
}