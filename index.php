<?php
$host = 'localhost';
$username = 'root';
$password = 'Aminux@11';
$database = 'learnpdo';

$dsn = 'mysql:host='.$host.';dbname='.$database;
$pdo = new PDO($dsn,$username,$password);
//defaulting PDO FETCH_OBJECT
$pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
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

