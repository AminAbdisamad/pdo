<?php
require_once('db.php');
//defaulting PDO FETCH_OBJECT
$status ='admin';
$sql = 'SELECT * FROM users WHERE status =:status';
$st = $pdo->prepare($sql);
$st ->execute(['status'=>$status]);
$users = $st->fetchAll();
// foreach($users as $user){
//     echo $user['name'].'<br>';
// }
foreach($users as $user){
    echo $user->name.'<br>';
}
/* INSERT -----

$name = 'Farah';
$email = 'farah@gmail.com';
$status = 'admin';

$sql = 'INSERT INTO users(name, email, status) VALUES (:name,:email,:status)';
$stm = $pdo->prepare($sql);
$stm -> execute(['name'=>$name,'email'=>$email,'status'=>$status]);

*/
/* DELETE */
$name = 'Farah';
$sql = 'DELETE FROM users WHERE name =:name';
$stmt = $pdo->prepare($sql);
$stmt ->execute(['name'=>$name]);
//echo 'User '.$name.' has been deleted successfully';

/* UPDATE */



// limit posts 
$limit = 2;
$query = $pdo->prepare('SELECT * FROM posts WHERE author = ? && is_published = ? LIMIT = ?');
$query->execute([$author,$is_published,$limit]);
$posts = $query->fetchAll();
foreach($posts as $post){
    echo $post->title .'<br>';

}