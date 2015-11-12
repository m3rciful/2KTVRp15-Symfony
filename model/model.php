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
		$test = $_REQUEST ['add_author'];
		echo 'test';
		/*
		if(empty($_REQUEST['add_author']) 
			AND empty($_REQUEST['add_title']) 
				AND empty($_REQUEST['add_content']))
			{
				echo "Пропущена запись!";
				return false;
			}

		$add_author = $_REQUEST['add_author'];
		$add_time = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $_REQUEST['add_time'])));
		$add_title = $_REQUEST['add_title'];
		$add_content = $_REQUEST['add_content'];

		$sql='INSERT INTO post (author, time, title, content) VALUES (?, ?, ?, ?)';
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute(array($add_author, $add_time, $add_title, $add_content));
		return true;
		*/
	}
	// Добавить изменения в таблицу 'post'
	public function update()
	{
		if(empty($_REQUEST['add_author']) 
			AND empty($_REQUEST['add_title']) 
				AND empty($_REQUEST['add_content']))
				{
					echo "Пропущена запись!";
					return false;
				}

		$id= $_REQUEST['id'];
		$add_autor = $_REQUEST['add_author'];
		$add_date = date("Y-m-d H:i:s");
		$add_title = $_REQUEST['add_title'];
		$add_content = $_REQUEST['add_content'];

		$sql="UPDATE post SET time=?, autor=?, title=?,`ontent=? WHERE id=?";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute(array($time, $author, $title, $content, $id));
		return true;
	}
	// Удаление записи из таблицы 'post'
	public function remove($id) 
	{
		$sql='DELETE FROM post WHERE id=?';
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute([$id]);
	}
}
?>