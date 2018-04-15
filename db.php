<?php
$host = 'localhost';
$user = 'root';
$password = 'Aminux@11';
$database = 'learnpdo';

$sdn = 'mysql:host='.$host.';dbname='.$database;
$pdo = new PDO($sdn,$user,$password);
$pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);