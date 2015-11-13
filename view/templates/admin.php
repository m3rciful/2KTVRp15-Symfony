<?php $title = 'Новый пост'; ?>

<?php ob_start() ?>

<h2><a href="./" class="fa fa-chevron-left"></a> Новый пост</h2>
<hr>
<div class="col-xs-4">
<form method="POST">
	<div class="form-group">
	 	<label for="add_author">Автор</label>
	 	<input type="text" class="form-control" name="add_author">
	</div>
	<div class="form-group">
	 	<label for="add_time">Время</label>
	 	<input type="text" class="form-control" name="add_time" value='<?php echo date("Y-m-d H:i:s"); ?>'>
	</div>
	<div class="form-group">
	 	<label for="add_title">Заголовок *</label>
	 	<input type="text" class="form-control" name="add_title">
	</div>
	<div class="form-group">
	 	<label for="add_content">Текст</label>
	 	<textarea rows="10" cols="45" name="add_content" class="form-control"></textarea>
	</div>
	<div>
 		<button type="submit" name="add" class="btn btn-default"><i class="fa fa-plus"></i> Добавить</button>
		<button type="reset" reset="" name="" class="btn btn-default"><i class="fa fa-eraser"></i> Очистить</button>
	</div>
</form>
</div>

<?php $content = ob_get_clean(); ?>

<?php include "view/templates/layout.php";