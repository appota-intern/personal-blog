<?php $this->load('header', ['title' => $title]) ?>
<div class="container">
<form class="form-horizontal" action='' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Register</legend>
    </div>

    <div class="control-group">
      <!-- E-mail -->
      <label for="inputEmail" class="sr-only">Username</label>
      <div class="controls">
        <input type="" name="name" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
        <p class="help-block">Please provide your username</p>
       <!-- <p style="color: red;"><?php  echo $this->wan2; ?></p> -->
      </div>
    </div>
 
    <div class="control-group">
      <!-- E-mail -->
      <label for="inputEmail" class="sr-only">Password</label>
      <div class="controls">
        <input type="password" name="pass" id="inputEmail" class="form-control" placeholder="Password" required autofocus>
        <p class="help-block">Please provide your password</p>
      </div>
    </div>

    <div class="control-group">
      <!-- E-mail -->
      <label for="inputEmail" class="sr-only">Email address</label>
      <div class="controls">
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <p class="help-block">Please provide your E-mail</p>
       <!-- <p style="color: red;"><?php echo $this->wan1 ?></p> -->
      </div>
    </div>

  <div class="control-group">
    <label class="control-label" for="email">Group_id</label>
    <div class="controls">
      <select class="form-control" id="sel1" name="group_id">
        <option>User</option>
        <option>Admin</option>
      </select>

  </div>
  </div>
<hr class="featurette-divider">
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
      </div>
    </div>
  </fieldset>
</form>
<div>
  <?php $this->load('footer'); ?>