<?php 
class UsersModel
{
	private $dbh;
	private $host = 'localhost';
	private $db = 'sergei_db';
	private $user = 'pupil';
	private $pass = '123';
	private $charset = 'UTF8';

	// Подключение к базе данных
	function UsersModel()
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
	// Загрузка пользователь
	public function get_all_users()
	{
		$sql = 'SELECT * FROM users';
		$stmt = $this->dbh->query($sql);

		$users = array();
		while ($row =$stmt-> fetch())
		{
			$users[]=$row;
		}
		return $users;
	}
	// Добавить запись в таблицу 'users'
	public function add_user()
	{
		if (empty($_REQUEST['add_lastname']) OR empty($_REQUEST['add_firstname']) 
			OR empty($_REQUEST['add_email']))
			{
				return false;
			}

		$lastname 		= $_REQUEST['add_lastname'];
		$firstname		= $_REQUEST['add_firstname'];
		$email 			= $_REQUEST['add_email'];

		$sql = 'INSERT INTO users (lastname, firstname, email) VALUES (?, ?, ?)';
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute(array($lastname, $firstname, $email));
		return true;
	}
	// Добавить изменения в таблицу 'users'
	public function edit_user()
	{
		if (empty($_REQUEST['add_lastname']) OR empty($_REQUEST['add_firstname']) 
			OR empty($_REQUEST['add_email']))
			{
				return false;
			}

		$id 			= $_REQUEST['id'];
		$lastname 		= $_REQUEST['add_lastname'];
		$firstname		= $_REQUEST['add_firstname'];
		$email 			= $_REQUEST['add_email'];

		$sql = 'UPDATE users SET lastname=?, firstname=?, email=? WHERE id=?';
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute(array($lastname, $firstname, $email, $id));
		return true;
	}
}
?>