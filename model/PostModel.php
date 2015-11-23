<?php
class PostsModel
{
	private $dbh;
	private $host = 'localhost';
	private $db = 'sergei_db';
	private $user = 'pupil';
	private $pass = '123';
	private $charset = 'UTF8';

	// Подключение к базе данных
	function PostsModel()
	{	
		$dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
		$opt = array(
		 	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
		try 
		{
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $opt);
		} 
		catch (Exception $e) 
		{
			echo 'Error! ' +$e;
		}
		
	}
	// Загрузка постов
	public function get_all_posts()
	{
		$sql = 'SELECT id, title FROM post';
		$stmt = $this->dbh->query($sql);

		$posts = array();
		while ($row =$stmt-> fetch())
		{
			$posts[]=$row;
		}
		return $posts;
	}
	// Просмотр постов
	public function get_post($id)
	{
		$sql = 'SELECT id, title, content, author, time FROM post WHERE id=?';
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute([$id]);;
		$post = $stmt->fetch();
		return $post;
	}
	// Добавить запись в таблицу 'post'
	public function add_post()
	{
		if (empty($_REQUEST['add_author']) OR empty($_REQUEST['add_title']) 
			OR empty($_REQUEST['add_content']))
			{
				return false;
			}

		$author 	= $_REQUEST['add_author'];
		$time 		= date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $_REQUEST['add_time'])));
		$title 		= $_REQUEST['add_title'];
		$content 	= $_REQUEST['add_content'];

		$sql = 'INSERT INTO post (author, time, title, content) VALUES (?, ?, ?, ?)';
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute(array($author, $time, $title, $content));
		return true;
	}
	// Добавить изменения в таблицу 'post'
	public function update_post()
	{
		if (empty($_REQUEST['add_author']) OR empty($_REQUEST['add_time']) 
			OR empty($_REQUEST['add_title']) OR empty($_REQUEST['add_content']))
			{
				return false;
			}

		$id 		= $_REQUEST['id'];
		$author 	= $_REQUEST['add_author'];
		$time 		= $_REQUEST['add_time'];
		$title 		= $_REQUEST['add_title'];
		$content 	= $_REQUEST['add_content'];

		$sql = 'UPDATE post SET time=?, author=?, title=?, content=? WHERE id=?';
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute(array($time, $author, $title, $content, $id));
		return true;
	}
	// Удаление записи из таблицы 'post'
	public function remove_post($id) 
	{
		$sql='DELETE FROM post WHERE id=?';
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute([$id]);
	}
}
?>