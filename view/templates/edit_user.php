<?php $title = 'Список пользователей'; ?>

<?php ob_start() ?>

<h2><a href="./users" class="fa fa-chevron-left"></a> Список пользователей</h2>
<hr>

<p class="text-right">
	<a class="btn btn-default" href="add_user" role="button"><i class="fa fa-plus"></i> Добавить</a>
</p>

	<table class="table table-hover">
		<tr>
			<th>#</th>
			<th>Last Name</th>
			<th>First Name</th>
			<th colspan='2'>E-Mail</th>
		</tr>
		<?php foreach ($users as $user): ?>
		<?php if ($user['uid'] == $_REQUEST['id']) 
		{ ?>
		<tr class="active"> 
		<form>
			<td><b><?php echo $user['uid']; ?></b></td>
			<td><input type="text" class="form-control input-sm" name="add_lastname" value="<?php echo $user['lastname']; ?>"></td>
			<td><input type="text" class="form-control input-sm" name="add_firstname" value="<?php echo $user['firstname']; ?>"></td>
			<td><input type="email" class="form-control input-sm" name="add_email" value="<?php echo $user['email']; ?>"></td>
			<td class="text-right">
				<a class="btn btn-default btn-sm" href="remove?user=<?php echo $user['uid'];?>" role="button" title='Удалить'><i class="fa fa-trash"></i></a> 
				<button type="submit" name="send" class="btn btn-default btn-sm"><i class="fa fa-floppy-o"></i> Сохранить</button> 
				<a class="btn btn-default btn-sm" href="./users" role="button" title='Назад'><i class="fa fa-chevron-right"></i></a> 
			</td>
		</form>
		</tr>
		<?php } else { ?>
		<tr> 
			<td><?php echo $user['uid']; ?></td>
			<td><?php echo $user['lastname']; ?></td>
			<td><?php echo $user['firstname']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td class="text-right"></td>
		</tr>
		<?php } endforeach; ?>
	</table>


<?php $content = ob_get_clean(); ?>

<?php include "view/templates/layout.php";