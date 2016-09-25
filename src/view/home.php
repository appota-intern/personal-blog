<?php $this->load('header', ['title' => $title]) ?>
<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo"></span>
    </div>
    <div class="col-sm-4">
      <?php foreach ($listPost as $post) {  

              $id_post = $post->getId();
              $title_post = $post->getTitle();
              $content_post = $post->getContent();
              $status_post = $post->getStatus();
              $created_at_post = $post->getCreated_At();
              $created_at_post = date("Y-m-d",$created_at_post);      

        ?>
      
        <h2><?= isset($title_post) ? $title_post : '' ?></h2>

        <p><?= isset($content_post) ? $content_post : '' ?></p>
        <hr class="featurette-divider">
        <?php } ?>
      

    </div>

    <div class="col-sm-4">
    </div>
  </div>
</div>

<hr class="featurette-divider">
<?php $this->load('footer'); ?>
