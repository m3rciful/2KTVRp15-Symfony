<?php $title = 'Новый пользователь'; ?>

<?php ob_start() ?>

<h2><a href="./users" class="fa fa-chevron-left"></a> Новый пользователь</h2>
<hr>
<div class="col-xs-4">
<form method="POST">
	<div class="form-group">
	 	<label for="add_lastname">Last Name</label>
	 	<input type="text" class="form-control" name="add_lastname" placeholder='Фамилия'>
	</div>
	<div class="form-group">
	 	<label for="add_firstname">First Name</label>
	 	<input type="text" class="form-control" name="add_firstname" placeholder='Имя'>
	</div>
	<div class="form-group">
	 	<label for="add_email">E-Mail</label>
	 	<input type="email" class="form-control" name="add_email" placeholder='название@сервис.чо'>
	</div>
	<div>
 		<button type="submit" name="add" class="btn btn-default"><i class="fa fa-plus"></i> Добавить</button>
		<button type="reset" reset="" name="" class="btn btn-default"><i class="fa fa-eraser"></i> Очистить</button>
	</div>
</form>
</div>

<?php $content = ob_get_clean(); ?>

<?php include "view/templates/layout.php";