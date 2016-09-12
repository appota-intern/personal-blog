<?php $this->load('header', ['title' => $title, 'page' => 'login']) ?>
	<div id="wrapper">
		<div class="title">Full Post</div>
		<div class="list">
			<form action="" method="post" name="" id="">
				<div class="row">
				
					<p class="no"></p>
					<p class="name">title</p>
					<p class="name">content</p>
					<p class="id">ID</p>
					<p class="id">Status</p>
					<p class="id">Create At</p>
					<p class="action">Action</p>
				</div>

				<div class="row even">
					<p class="no">
						<input type="checkbox" value="">
					</p>
					<p class="name"><?= isset($title_post) ? $title_post : '' ?>
					<?= isset($content_post) ? $content_post: '' ?></p>
					<p class="id"><?= isset($id_post) ? $id_post : '' ?></p>
					<p class="id"><?= isset($status_post) ? $status_post : '' ?></p>
					<p class="id"><?= isset($created_at_post) ? $created_at_post : '' ?></p>
					<p class="action">
						<a href="">Edit</a>
						<a href="">Delete</a>
					</p>
				</div>
			</form>

		</div>

		<div id="container">
			<a href="new-post" class="btn btn-primary">Add Post</a>
			<a id="" href="" class="btn btn-primary">Delete Post</a>
		</div>
	</div>
<?php $this->load('footer'); ?>