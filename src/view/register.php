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
                    <label for="inputEmail" class="sr-only">Username</label>
                    <input type="" name="name" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Password</label>
                    <input type="password" name="pass" id="inputEmail" class="form-control" placeholder="Password" required autofocus>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                </div>
                <!-- <div class="form-group">
                    <label class="control-label" for="email">Group_id</label>
                    <select class="form-control" id="sel1" name="group_id">
                        <option>User</option>
                        <option>Admin</option>
                    </select>
                </div> -->
                <div class="alert alert-danger <?= $error ? '' : 'hidden'?>"><?= $error ?></div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <a class="btn btn-lg btn-success btn-block" href="/login">Login</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->load('footer'); ?>
