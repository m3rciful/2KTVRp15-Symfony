<?php
use Symfony\Component\HttpFoundation\Response;

// ------------------------------------------------
/*
function render_template($path, array $args)
{
	extract($args);
	ob_start();
	require $path;
	$html = ob_get_clean();
	return $html;
}
*/
// ------------------------------------------------

// ЗАГРУЗКА
function user_action()
{
	$model = new UsersModel();
	$users = $model ->get_all_users();
	$html = render_template('view/templates/list_users.php', array('users' => $users));
	return new Response($html);
}
// ДОБАВЛЕНИЕ
function add_user_action()
{
	if (isset($_POST['add']))
	{
		$model = new UsersModel();
		$post = $model->add_user();

		if ($post)
		{
			header('Location: ./users');
			exit;
		}
		else
			echo '<p class="bg-danger">Пропущена запись!</p>';
	}
	
	$html = render_template('view/templates/add_user.php', array());
	return new Response($html);
}
// РЕДАКТИРОВАНИЕ
function edit_user_action($id)
{
	$model = new UsersModel();

	if (isset($_POST['save']))
	{
		$user = $model->edit_user($id);

		if ($post)
		{
			header("location: ./users");
    		exit;
		}
		else
			echo '<p class="bg-danger">Одно из полей было пустым!</p>';
	}

	$users = $model ->get_all_users();
	$html = render_template('view/templates/edit_user.php', array('users' => $users));
	return new Response($html);
}
?>