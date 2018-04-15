<?php
$host = 'localhost';
$username = 'root';
$password = 'Aminux@11';
$database = 'learnpdo';

$dsn = 'mysql:host='.$host.';dbname='.$database;
$pdo = new PDO($dsn,$username,$password);
