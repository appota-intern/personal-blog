
<!-- <form class="form-inline" action="" method="post" >
    <div class="form-group">
        <label class="sr-only" for="exampleInputEmail3">Email address</label>
        <input type="text" name="username" class="form-control" id="exampleInputEmail3" placeholder="Username">

    </div>
    <div class="form-group">
        <label class="sr-only" for="exampleInputPassword3">Password</label> 
        <input type="password" name="userpass" class="form-control" id="exampleInputPassword3" placeholder="Password">

    </div>

    <button type="submit" class="btn btn-default">Login</button>
</form> -->
<?php $this->load('header', ['title' => $title]) ?>
<div class="container">

      <form class="form-signin" action="" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="username" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="userpass" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->
<?php $this->load('footer'); ?>