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
// Добавление записи
function add_action()
{
	if (isset($_REQUEST['add']))
	{
		$model = new PostsModel();
		$model->add_post();
		//header('Location: ./');
		//exit;
	}
	
	$html = render_template('view/templates/admin.php', array());
	return new Response($html);
}
function update_action($id)
{
	if (isset($_POST['edit_post']))
	{
    	update_post($id);
    	header("location: show?id=".$id);
    	exit;
	}
	$post = get_post($id);
	$html = render_template('view/templates/update.php', array('post' => $post));
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