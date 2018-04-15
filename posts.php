<?php
require_once('db.php');
$stmt = $pdo->query('SELECT * FROM posts');
// while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
//     echo $row['title'].'<br>';
// }
while($row = $stmt->fetch()){
    echo $row->title.'<br>';
}

//UNSAFE 
$query = "SELECT * FROM posts WHERE author ='$author'";

// Positional Parameter
$author = 'Aminux';

$sql = 'SELECT * FROM posts WHERE author = ?';
