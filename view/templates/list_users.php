<?php $title = 'Список пользователей'; ?>

<?php ob_start() ?>

<h2><a href="./" class="fa fa-chevron-left"></a> Список пользователей</h2>
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
		<tr> <?php foreach ($users as $user): ?>
			<td><?php echo $user['uid']; ?></td>
			<td><?php echo $user['lastname']; ?></td>
			<td><?php echo $user['firstname']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td class="text-right"><a class="btn btn-default btn-xs" href="user?id=<?php echo $user['uid'];?>" role="button"><i class="fa fa-pencil "></i></a></td>
		</tr>
		<?php endforeach ?>
	</table>


<?php $content = ob_get_clean(); ?>

<?php include "view/templates/layout.php";