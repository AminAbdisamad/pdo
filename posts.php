<?php
require_once('db.php');
$stmt = $pdo->query('SELECT * FROM posts');
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo $row['title'].'<br>';
}