<?php



// Подключение к базе данных
function open_database_connection () 
{
	$db = 'sergei_db'; $user ='pupil'; $pass = '123';
	$opt = array(
	    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
	$pdo = new PDO('mysql:host=localhost;dbname='.$db, $user, $pass, $opt);
	return $pdo;
}
function close_database_connection($pdo)
{
	$pdo = null;
}
// Загрузка постов
function get_all_posts() 
{
	$pdo = open_database_connection();
	$stmt = $pdo->query('SELECT * FROM post');
	$posts = array();
	while ($row = $stmt->fetch())
	{
	    $posts[] = $row;
	}
	close_database_connection($pdo);
	return $posts;
}
// Просмотр поста
function get_post($id) 
{
	$pdo = open_database_connection();
	$stmt = $pdo->prepare('SELECT * FROM post WHERE id=?');
	$stmt->bindParam(1, $id); 
	$stmt->execute();
	$post = $stmt->fetch();
	close_database_connection($pdo);
	return $post;
}
// Добавление поста
function add_post()
{
	// ---------------- требудет доработки ----------------
	$time = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $_REQUEST['add_time'])));
	//$content = random_lipsum(1, 'paras', 0);
	// ---------------- требудет доработки ----------------

	$pdo = open_database_connection();

	$stmt = $pdo->prepare("INSERT INTO post (author, time, title, content) 
			 			   VALUES (:author, :time, :title, :content)");

	$stmt->bindParam(':author', $_REQUEST ['add_author']); 
	$stmt->bindParam(':time', $time); 
	$stmt->bindParam(':title', $_REQUEST['add_title']); 
	$stmt->bindParam(':content', $_REQUEST['add_content']); 
	$stmt->execute();

	close_database_connection($pdo);
}
// Редактирование
function edit_post($id)
{
	$pdo = open_database_connection();

	$stmt = $pdo->prepare("UPDATE post SET author = :author, time = :time, title = :title, content = :content WHERE id=:id");

	$stmt->bindParam(':id', $id); 
	$stmt->bindParam(':author', $_REQUEST ['add_author']); 
	$stmt->bindParam(':time', $_REQUEST['add_time']); 
	$stmt->bindParam(':title', $_REQUEST['add_title']); 
	$stmt->bindParam(':content', $_REQUEST['add_content']); 
	$stmt->execute();

	close_database_connection($pdo);
}
// Удаление
function remove_post($id) 
{
	$pdo = open_database_connection();
	$stmt = $pdo->prepare('DELETE FROM post WHERE id=?');  
	$stmt->bindParam(1, $id); 
	$stmt->execute();
	close_database_connection($pdo);
}
// Random Text from Lorem Ipsum
function random_lipsum($amount, $what, $start)
{
    return simplexml_load_file("http://www.lipsum.com/feed/xml?amount=$amount&what=$what&start=$start")->lipsum;
}
?>