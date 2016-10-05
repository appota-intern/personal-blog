<?php $this->load('header', ['title' => $title]) ?>
<div class="container-fluid bg-grey">
  
  <div class="row">
    <div class="col-sm-4">
      
    </div>
    <div class="col-sm-4" style="padding: 40px;">
      <?php foreach ($listPost as $post) {  

              $id_post = $post->getId();
              $title_post = $post->getTitle();
              $content_post = $post->getContent();
              $content_post = substr($content_post, 0, 100);
              $status_post = $post->getStatus();
              $created_at_post = $post->getCreated_At();
              $created_at_post = date("Y-m-d",$created_at_post);      

        ?>
      
        <h2 style="margin-bottom: 3.4rem;"><?= isset($title_post) ? $title_post : '' ?></h2>

        <p><?= isset($content_post) ? $content_post : '' ?><a class="read-more" href="post/<?php echo $id_post;?>"> » </a></p>
        <hr class="featurette-divider">
        <?php } ?>
      

    </div>

    <div class="col-sm-4">
    </div>
  </div>
 
</div>

<hr class="featurette-divider">
<?php $this->load('footer'); ?>
