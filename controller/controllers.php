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
	$postsModel = new PostsModel();
	$posts = $postsModel ->get_all_posts();
	$html = render_template('view/templates/list.php', array('posts' => $posts));
	return new Response($html);
}
// ПРОСМОТР
function show_action($id)
{
	$postsModel = new PostsModel();
	$posts = $postsModel ->get_post($id);
	$html = render_template('view/templates/show.php', array('post' => $posts));
	return new Response($html);
}
// Добавление записи
function add_action()
{
	$PostsModel = new PostsModel();
	$PostsModel->add_post();
	$posts = $PostsModel->get_all_posts();
	$html = render_template('view/templates/admin.php', array());
	return new Response($html);
}
// Страница админа
function admin_action()
{
	$PostsModel = new PostsModel();
	$posts = $PostsModel->get_all_posts();
	$html = render_template('view/templates/admin.php', array());
	return new Response($html);

    	//header('Location: ./');
		//exit;
}
// РЕДАКТИРОВАНИЕ
function edit_action($id)
{
	if (isset($_POST['edit_post']))
	{
    	edit_post($id);
    	header("location: show?id=".$id);
    	exit;
	}

	$post = get_post($id);
	$html = render_template('view/templates/edit.php', array('post' => $post));
	return new Response($html);
}
// УДАЛЕНИЕ
function remove_action($id)
{
	$post = remove_post($id);
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