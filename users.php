<?php 
require_once 'config/db.php';
require_once 'config/config.php';
// $username = username;
// $email = email;
// $status = status;

// $sql = 'INSERT INTO users(username,email,status) VALUES (:username,:email,:status)';
// $st = $pdo->prepare($sql);
// $st->execute(['username'=>$username,'email'=>$emai,'status'=>$status]);

/* Error Messages*/
$msgColor = '';
$msgText = '';
 
/* Insert Users to the database */
if(isset($_POST['submit'])){
    $username = ($_POST['username']);
    $email =    ($_POST['email']);
    $status =   ($_POST['status']);
    if(!empty($username) && !empty($email) && !empty($status)){
        $sql = 'INSERT INTO users (name,email,status)VALUES(:name,:email,:status)';
        $stm = $pdo->prepare($sql);
        $stm->execute(['name'=>$username,'email'=>$email,'status'=>$status]);
        $msgColor = 'alert-success';
        $msgText  = 'User Added Successfully';
    }else{
        $msgColor = 'alert-danger';
        $msgText  = 'Empty fields are not allowed';
    }
    
}
/* read users in the database */
$stmt = $pdo->prepare('SELECT * FROM users');
$stmt->execute();
$posts = $stmt->fetchAll();


/* delete user */
if(isset($_POST['delete'])){
  $deleteId = $_POST['delete_id'];
  $sql = 'DELETE FROM users WHERE id = :id';
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['id'=>$deleteId]);
  $msg = "User Deleted successfully";
  echo $msg;
 

}




?>
<!-- HTML starts here -->
<?php require_once 'inc/header.php'; ?>
<main>
    <div class="container">
    <!-- error handling  -->
    <?php if(!empty($msgText)) : ?>
      <div style="padding:10px;"class="<?php echo $msgColor?>">
        <?php echo $msgText; ?>
      </div>
    <?php endif; ?>
    <h4>Add User</h4>
    <div class="row">
    <form class="col s12" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
      <div class="row">
        <div class="input-field col s4">
          <input placeholder="UserName" name="username" id="username" type="text" class="validate">
          <label for="username">Username</label>
        </div>
        <div class="input-field col s4">
          <input placeholder="Email" name="email" id="email" type="text" class="validate">
          <label for="email">Email</label>
        </div>
        <div class="input-field col s3">
          <input placeholder="status" name="status" id="status" type="text" class="validate">
          <label for="email">Status</label>
        </div>
        <div class="input-field col s1">
        <button class="btn waves-effect waves-light btn-small" type="submit" name="submit">Submit
          <i class="material-icons right">send</i>
        </button>
        </div>
        
      </div>
    </form>
  </div>
  
  <table> 
        <thead>
          <tr>
              <th>User Name</th>
              <th>Email</th>
              <th>Status</th>
              <th>Options</th>
              <th>Edit</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($posts as $post): ?>
          <tr>
            <td><?php echo $post->name?></td>
            <td><?php echo $post->email?></td>
            <td><?php echo $post->status?></td>
            <td>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
              <input type="hidden" name="delete_id" value="<?php echo $post->id?>">
              <button class="btn-floating btn-medium waves-effect waves-light red" name="delete" type="submit"><i class="material-icons">delete</i></button>
            </form> 
            </td>
            <td>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
              <input type="hidden" name="edit_id" value="<?php echo $post->id?>">
              <a class="btn-floating btn-medium waves-effect waves-light blue "><i class="material-icons">edit</i></a>
            </form>
            </td>
          </tr>
        <?php endforeach; ?> 
        </tbody>
</table>
     
</div>
</main>
<?php require_once 'inc/footer.php';?>
