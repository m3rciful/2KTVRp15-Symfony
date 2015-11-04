<?php
// Подключение к базе
function open_database_connection () 
{
	$link = mysql_connect('localhost', 'pupil', '123');
	mysql_select_db ('sergei_db', $link);
	mysql_query('SET NAMES utf8');
	return $link;
}
function close_database_connection($link)
{
	mysql_close($link);
}
// Загрузка постов
function get_all_posts() 
{
	$link = open_database_connection();
	$sql = "SELECT * FROM post";
	$result = mysql_query($sql, $link);
	$posts = array();
	while($row = mysql_fetch_assoc($result))
	{
		$posts[] = $row;
	}
	close_database_connection($link);

	return $posts;
}
// Просмотр поста
function get_post($id) 
{
	$link = open_database_connection();
	$result = mysql_query("SELECT * FROM post WHERE id='$id'", $link);
	$post = mysql_fetch_assoc($result);
	close_database_connection($link);
	return $post;
}
// Добавление поста
function add_post()
{
	$author = $_REQUEST ['add_author'];
	$date = $_REQUEST['add_time'];
	$time = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $date)));
	$title = $_REQUEST['add_title'];
	$content = $_REQUEST['add_content'];

	if (empty($content))
		$content = random_lipsum(1, 'paras', 0);

	$link = open_database_connection();

	$query = "INSERT INTO `post` (`id`, `author`, `time`, `title`, `content`) 
			  VALUES (NULL, '$author', '$time', '$title', '$content');";
	
	mysql_query($query, $link);

	close_database_connection($link);
}
// Редактирование
function edit_post($id)
{
	$author = $_REQUEST ['add_author'];
	$time = $_REQUEST['add_time'];
	$title = $_REQUEST['add_title'];
	$content = $_REQUEST['add_content'];

	$link = open_database_connection();

	$query = "UPDATE post SET author = '$author', time = '$time', title = '$title', content = '$content' WHERE id = $id;";
	
	mysql_query($query, $link);

	close_database_connection($link);
}
// Удаление
function remove_post($id) 
{
	$link = open_database_connection();
	$sql = "DELETE FROM post WHERE id = $id";
	$result = mysql_query($sql, $link);
	close_database_connection($link);
	return $post;
}
// Random Text from Lorem Ipsum
function random_lipsum($amount, $what, $start)
{
    return simplexml_load_file("http://www.lipsum.com/feed/xml?amount=$amount&what=$what&start=$start")->lipsum;
}
?>