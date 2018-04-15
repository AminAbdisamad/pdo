<?php
require_once('db.php');
$stmt = $pdo->query('SELECT * FROM posts');
// while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
//     echo $row['title'].'<br>';
// }
while($row = $stmt->fetch()){
    //echo $row->title.'<br>';
}

//UNSAFE 
//$query = "SELECT * FROM posts WHERE author ='$author'";

// Positional Parameter

/* Insert Using Positional parameter */
$title = 'Javascript Basics';
$body = 'This is a javascript basics course that will cover the very foundation of js';
$author = 'Aminux';
$published = 'yes';





/* SELECT FROM TABLE */
$author = 'Aminux';

$sql = 'SELECT * FROM posts WHERE author = ?';
$prep = $pdo->prepare($sql);
$prep->execute([$author]);
$posts = $prep->fetchAll();

foreach($posts as $post){
    echo $post->title.'<br>';
}


