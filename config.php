<?php

// preparando as rotas do meu banco de dados

$db_name = 'test';
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';

// usando a class PDO
$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_password);
