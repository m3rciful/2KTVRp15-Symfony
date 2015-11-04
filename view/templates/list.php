<?php $title = 'Список постов'; ?>

<?php ob_start() ?>

<h2>Список постов</h2>
<hr>
	<ul>  <?php foreach ($posts as $post): ?>
		<li>
			<a href="show?id=<?php echo $post['id'];?>">	
				<?php echo $post['title']; ?>
			</a>
		</li>
	<?php endforeach ?>
	</ul>
<hr>
<a class="btn btn-default" href="admin" role="button"><i class="fa fa-plus"></i> Добавить пост</a> <a class="btn btn-default" href="index.php/about" role="button"><i class="fa fa-meh-o"></i> Обо мне</a>

<?php $content = ob_get_clean(); ?>

<?php include "view/templates/layout.php";