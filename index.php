<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	include_once 'vendor/autoload.php';
	include_once 'model/PostModel.php';
	include_once 'model/UserModel.php';
	include_once 'controller/Post_Controllers.php';
	include_once 'controller/User_Controllers.php';
	include_once 'route/routing.php';
	$response->send();
?>
