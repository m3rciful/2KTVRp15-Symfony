<?php 
class UserModel
{
	private $dbh;
	private $host ="lacalhost";
	private $db ="sergei_db";
	private $user ="pupil";
	private $pass ="123";
	private $charset ="UTF8";

	// Подключение к базе данных
	function UserModel()
	{
		$dsn = 'mysql:host=$host;dbname=$db;charset=$charset';
		$opt = array(
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
		try
		{
			$this->dbh = new PDO($dsn, $this->$user, $this->$pass, $opt);
		}
		catch(Exception $e)
		{
			echo 'Error: ' +$e;
		}
		
	}
}
?>