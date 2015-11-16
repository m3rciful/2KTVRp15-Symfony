<?php
use Symfony\Component\HttpFoundation\Response;

// ------------------------------------------------
function render_template($path, array $args)
{
	extract($args);
	ob_start();
	require $path;
	$html = ob_get_clean();
	return $html;
}
// ------------------------------------------------

// ЗАГРУЗКА
function list_action()
{
	$model = new PostsModel();
	$posts = $model ->get_all_posts();
	$html = render_template('view/templates/list.php', array('posts' => $posts));
	return new Response($html);
}
// ПРОСМОТР
function show_action($id)
{
	$model = new PostsModel();
	$posts = $model ->get_post($id);
	$html = render_template('view/templates/show.php', array('post' => $posts));
	return new Response($html);
}
// ДОБАВЛЕНИЕ
function add_action()
{
	if (isset($_POST['add']))
	{
		$model = new PostsModel();
		$post = $model->add_post();

		if ($post)
		{
			header('Location: ./');
			exit;
		}
		else
			echo '<p class="bg-danger">Пропущена запись!</p>';
	}
	
	$html = render_template('view/templates/admin.php', array());
	return new Response($html);
}
function update_action($id)
{
	$model = new PostsModel();

	if (isset($_POST['send']))
	{
		$post = $model->update_post($id);

		if ($post)
		{
			header("location: show?id=".$id);
    		exit;
		}
		else
			echo '<p class="bg-danger">Одно из полей было пустым!</p>';
	}

	$posts = $model->get_post($id);
	$html = render_template('view/templates/update.php', array('post' => $posts));
	return new Response($html);
}
// УДАЛЕНИЕ
function remove_action($id)
{
	$model = new PostsModel();
	$model->remove_post($id);
	header('Location: ./');
}
// ДОПОЛНИТЕЛЬНЫЕ СТРАНИЦЫ
// ------------------------------------------------
function about_action()
{
	$html = render_template('view/templates/about.php', array());
	return new Response($html);
}
function error_404()
{
	$html = render_template('view/templates/error_404.php', array());
	return new Response($html);
}
?>