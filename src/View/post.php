<?php $this->load('header', ['title' => $title]) ?>
<div class="container" style="margin-top: 100px;">
	<h2 style="font-size: 4rem; margin-bottom: 3.4rem;"><strong><?= isset($title_post) ? $title_post : '' ?></strong></h2>
	<div style="font-size: 18px; line-height: 1.75em;"><?= isset($content_post) ? $content_post : '' ?></div>
</div>	
<hr class="featurette-divider">

<?php $this->load('footer'); ?>