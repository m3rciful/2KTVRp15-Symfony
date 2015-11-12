<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$uri = $request->getPathInfo();

if ($uri == '/')
{
	$response = list_action();
}
elseif ($uri == '/add')
{
	$response = add_action();
}
elseif ($uri == '/admin') // Админ
{
	$response = admin_action();
}
elseif ($uri == '/show') // Просмотр
{
	$response = show_action($request->query->get('id'));
}
elseif ($uri == '/remove') // Удаление
{
	$response = remove_action($request->query->get('id'));
}
elseif ($uri == '/edit') // Редактирование
{
	$response = edit_action($request->query->get('id'));
}
// ---------------------------------
//	ДОПОЛНИТЕЛЬНЫЕ СТРАНИЦЫ
// ---------------------------------
elseif ($uri == '/about')
{
	$response = about_action();
}
else
{
	$response = error_404();
}
?>