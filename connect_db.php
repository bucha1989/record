<?php

/**
 * @author Buchastiy Sergey
 * @copyright 2016
 */

$db_username = 'record'; //данные для подключения к БД
$db_password = '128821';
$db_database = 'record';
$db_host = '';

$connection = new mysqli($db_host, $db_username, $db_password, $db_database); //подключние к БД

if ($connection->error)
    die($connection->error); //вывод при ошибке подключения к БД

$connection->set_charset('utf8'); //кодировка подключения к БД
?>