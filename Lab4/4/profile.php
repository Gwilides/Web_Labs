<?php
session_start();

if (!isset($_SESSION['user'])) {
    header ('Location: form.php');
    exit();
}

$user = $_SESSION['user'];
?>