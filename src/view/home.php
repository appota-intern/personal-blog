<?php $this->load('header', ['title' => $title]) ?>
<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo"></span>
    </div>
    <div class="col-sm-8">
      <h2>Title: <?= isset($title1) ? $title1 : '' ?></h2>
      
      <p><strong>Content:</strong> <?php 
      if(isset($_POST['$content'])) {
        echo $content;
      }
      ?></p>
    </div>
  </div>
</div>

<hr class="featurette-divider">
<?php $this->load('footer'); ?>
