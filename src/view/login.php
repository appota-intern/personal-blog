<?php $this->load('header', ['title' => $title, 'page' => 'login']) ?>

<div class="jumbotron jumbotron-primary">
    <h1 class="text-center">My Blog</h1>
</div>
<div class="main-content container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form class="form-signin" action="" method="post">
                <h2 class="text-center">Login to your account</h2>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" name="username" class="form-control" placeholder="Email address" required autofocus value="<?= isset($username) ? $username : '' ?>">
                </div>
                <div class="form-group">
                    <label for="userpass" class="sr-only">Password</label>
                    <input type="password" name="userpass" class="form-control" placeholder="Password" required>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me">
                        <strong>Remember me</strong>
                    </label>
                </div>
                <div class="alert alert-danger <?= !empty($error) ? '' : 'hidden'?>"><?= isset($error) ? $error : '' ?></div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <form action="logout" method="post">
                                <a class="btn btn-lg btn-success btn-block" href="register">Register</a>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /container -->
<?php $this->load('footer'); ?>
