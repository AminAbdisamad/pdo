<?php
require_once('db.php');
$stmt = $pdo->query('SELECT * FROM posts');
