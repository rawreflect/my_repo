<?php
// Подключение к базе данных через MySQLi
$mysqli = new mysqli('localhost', 'root', '', 'users');

if ($mysqli->connect_errno) {
    die("<p><strong>Ошибка подключения к БД</strong></p>
        <p><strong>Код ошибки: </strong> " . $mysqli->connect_errno . " </p>
        <p><strong>Описание ошибки:</strong> " . $mysqli->connect_error . "</p>");
}

$address_site = "http://laba3";
