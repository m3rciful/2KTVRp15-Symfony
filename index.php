<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	include_once 'vendor/autoload.php';
	include_once 'model/model.php';
	include_once 'controller/controllers.php';
	include_once 'route/routing.php';
	$response->send();
?>
