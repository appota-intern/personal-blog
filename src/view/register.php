<?php $this->load('header', ['title' => $title, 'page' => 'login']) ?>
<div class="jumbotron jumbotron-primary">
    <h1 class="text-center">My Blog</h1>
</div>
<div class="main-content container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="" method="POST">
                <h2 class="text-center">Create new account</h2>
               
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus value="<?= isset($email) ? $email : '' ?>">
                    <?php if (isset($error_email)) { ?>
                    <p style="color: red;"><?= $error_email ?></p>
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Password</label>
                    <input type="password" name="pass" id="inputEmail" class="form-control" placeholder="Password" required autofocus>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Repeat Password</label>
                    <input type="password" name="repeatPass" id="inputEmail" class="form-control" placeholder="Repeat Password" required autofocus>
                    <?php if (isset($error_pass)) { ?>
                    <p style="color: red;"><?= $error_pass ?></p>
                    <?php } ?>
                </div>
                
                <!-- <div class="form-group">
                    <label class="control-label" for="email">Group_id</label>
                    <select class="form-control" id="sel1" name="group_id">
                        <option>User</option>
                        <option>Admin</option>
                    </select>
                </div> -->
                <div class="alert alert-danger <?= !empty($error) ? '' : 'hidden'?>"><?= isset($error) ? $error : '' ?></div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <form action="logout" method="post">
                                <a class="btn btn-lg btn-success btn-block" href="login">Login</a>
                            </form>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load('footer'); ?>
