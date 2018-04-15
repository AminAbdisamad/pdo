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



/* Insert Using Named parameter */
// $title = 'Java Basics';
// $body = 'This is a Java basics course that will cover the very foundation of java';
// $author = 'Aminux';
// $published =false;
// $sql = 'INSERT INTO posts (title,body,author,is_published) VALUES (:title,:body,:author,:is_published)';
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['title'=>$title,'body'=>$body,'author'=>$author,'is_published'=>$published]);

/* Read from table */
$author = 'Aminux';
$is_published = true;

$sql = 'SELECT * FROM posts WHERE author = :author && is_published = :is_published';
$prep = $pdo->prepare($sql);
$prep->execute(['author'=>$author, 'is_published'=>$is_published]);
$posts = $prep->fetchAll();

foreach($posts as $post){
    echo $post->title.'<br>';
}
// Positional Parameter

/* SELECT FROM TABLE */
// $author = 'Aminux';
// $is_published = true;

// $sql = 'SELECT * FROM posts WHERE author = ? ';
// $prep = $pdo->prepare($sql);
// $prep->execute([$author]);
// $posts = $prep->fetchAll();

// foreach($posts as $post){
//     echo $post->title.'<br>';
// }


