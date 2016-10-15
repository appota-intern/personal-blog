<?php $this->load('header', ['title' => $title, 'page' => 'login']) ?>
	<div id="wrapper">
		<div class="title">Full Post</div>
		<div class="list">
			<form action="" method="post" name="" id="">
				<div class="row">
				
					<p class="no"></p>
					<p class="name" style="width: 350px;">title</p>
					<p class="name" style="text-align: center;">content</p>
					<p class="id">ID</p>
					<p class="id">Status</p>
					<p class="id">Create At</p>
					<p class="action">Action</p>
				</div>
				<?php foreach ($listPost as $post) {
					
						$id_post = $post->getId();
			            $title_post = $post->getTitle();
			            $content_post = $post->getContent();
			            $status_post = $post->getStatus();
			            $created_at_post = $post->getCreated_At();
			            $created_at_post = date("Y-m-d",$created_at_post);
					?>
					<div class="row even">
						<p class="no">
							<input type="checkbox" value="">
						</p>
						
						<p class="name"><?php echo $title_post; ?></p>
						<?= isset($content_post) ? $content_post: '' ?>
						<p class="id"><?= isset($id_post) ? $id_post : '' ?></p>
						<p class="id"><?= isset($status_post) ? $status_post : '' ?></p>
						<p class="id"><?= isset($created_at_post) ? $created_at_post : '' ?></p>
						<p class="action">
							<a href="edit/<?php echo $id_post; ?>">Edit</a>
							<a href="delete/<?php echo $id_post; ?>">Delete</a>
						</p>
					</div>
				<?php } ?>
			</form>

		</div>

		<div id="container">
			<a href="new-post" class="btn btn-primary">Add Post</a>
			<a href="delete-post" class="btn btn-primary">Delete Post</a>
		</div>
	</div>
<?php $this->load('footer'); ?>