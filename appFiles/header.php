<?php
ini_set('display_errors', 1); //показывает все предупреждения и ошибки
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start(); //старт сессии

require_once ($_SERVER['DOCUMENT_ROOT'] . '/appFiles/function.php'); // подключения файла с функциями
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>тестовое задание</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min" defer=""></script>
</head>
<body>