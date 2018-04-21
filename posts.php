<?php
require_once 'config/config.php';
require_once 'config/db.php';
require_once 'inc/header.php'; ?>
<main>
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
</main>
<?php require_once 'inc/footer.php';?>