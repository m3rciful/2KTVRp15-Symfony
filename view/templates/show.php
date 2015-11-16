<?php $title = 'Обзор поста'; ?>

<?php ob_start() ?>

<h2><a href="./" class="fa fa-chevron-left"></a> Пост #<?php echo $post['id'];?></h2>
<hr>
<table class='table-condensed'>
	<tr>
		<td><b>Автор:</b></td>
		<td><?php echo $post['author'];?></td>
	</tr>
	<tr>
		<td><b>Дата:</b></td>
		<td><?php echo $post['time'];?></td>
	</tr>
	<tr>
		<td><b>Заголовок:</b></td>
		<td><?php echo $post['title'];?></td>
	</tr>
	<tr>
		<td style="vertical-align: top;"><b>Текст:</b></td>
		<td><textarea rows="10" cols="45" class="form-control" name="add_content" readonly="readonly"><?php echo $post['content'];?></textarea></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<a class="btn btn-default" href="update?id=<?php echo $post['id'];?>" role="button"><i class="fa fa-pencil"></i> Изменить</a> <a class="btn btn-danger" href="remove?id=<?php echo $post['id'];?>" role="button"><i class="fa fa-trash-o"></i> Удалить</a>
		</td>
		</tr>
</table>
<!--
<form class="col-sm-4">

	<div class="form-group">
		<label for="add_title">Заголовок: </label>
		<p class="form-control-static">email@example.com</p>
	</div>

	<div class="form-group">
		<label for="add_author">Автор: </label>
		<input type="text" class="form-control" id="add_author">
	</div>

	<div class="form-group">
		<label for="add_time">Дата: </label>
		<input type="text" class="form-control" id="add_time">
	</div>

	<div class="form-group">
		<label for="add_title">Заголовок: </label>
		<input type="text" class="form-control" id="add_title">
	</div>

	<div class="form-group">
		<label for="add_content">Текст: </label>
		<textarea class="form-control" rows="3" id="add_content"></textarea>
	</div>

	<a class="btn btn-default" href="update?id=<?php echo $post['id'];?>" role="button"><i class="fa fa-pencil"></i> Изменить</a> <a class="btn btn-danger" href="remove?id=<?php echo $post['id'];?>" role="button"><i class="fa fa-trash-o"></i> Удалить</a>

</form>
-->

<?php $content = ob_get_clean(); ?>

<?php include "view/templates/layout.php"; ?>