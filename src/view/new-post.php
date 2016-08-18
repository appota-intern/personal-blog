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
                        <input class="form-control input-md" type="text" placeholder="Title">
                    </div>
                    <div id="summernote"></div>
                    <button class="btn btn-primary btn-large"><i class="fa fa-save"></i> Save</button>
                    <button class="btn btn-success btn-large"><i class="fa fa-send"></i> Publish</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load('footer', ['title' => $title]) ?>

