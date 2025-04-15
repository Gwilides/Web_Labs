<?php
function redirectToHome() : void {
    header('Location: /');
    exit();
}

if (!isset($_POST['email'], $_POST['category'], $_POST['title'], $_POST['description'])) {
    redirectToHome();
}

$email = $_POST['email'];
$category = $_POST['category'];
$title = $_POST['title'];
$description = $_POST['description'];

$filePath = "categories/{$category}/{$email}/{$title}.txt";

if (!file_exists("categories/{$category}/{$email}")) {
    mkdir("categories/{$category}/{$email}");
}

if (!file_put_contents($filePath, $description)) {
    throw new Exception('Something went wrong');
}
redirectToHome();