<?php $this->load('header', ['title' => $title]) ?>

<div class="jumbotron jumbotron-new-post">
    <h1 class="text-center">Write a new post</h1>
</div>
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <form action="" method="POST" name="form_post">
                    <div class="form-group">
                        <input name="title" class="form-control input-md" type="text" placeholder="Title">
                    </div>
                    <textarea class="form-control" id="summernote" name="content"></textarea>
                    
                    <input type="submit" name="submit" value="save" class="btn btn-primary btn-large">
                    <input type="submit" name="submit" value="publish" class="btn btn-success btn-large">
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load('footer') ?>

