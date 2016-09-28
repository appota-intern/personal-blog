<?php $this->load('header', ['title' => $title]) ?>

	<h2><?= isset($title_post) ? $title_post : '' ?></h2>
	<p><?= isset($content_post) ? $content_post : '' ?></p>
	

<?php $this->load('footer'); ?>