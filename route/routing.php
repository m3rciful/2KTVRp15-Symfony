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
elseif ($uri == '/show' AND $request->query->has('id')) // Просмотр
{
	$response = show_action($request->query->get('id'));
}
elseif ($uri == '/remove' AND $request->query->has('id')) // Удаление
{
	$response = remove_action($request->query->get('id'));
}
elseif ($uri == '/update' AND $request->query->has('id')) // Редактирование
{
	$response = update_action($request->query->get('id'));
}
elseif ($uri == '/users') // пользователи
{
	$response = user_action();
}
elseif ($uri == '/add_user') // новый пользователь
{
	$response = add_user_action();
}
elseif ($uri == '/user' AND $request->query->has('id')) // редактирование
{
	$response = edit_user_action($request->query->get('id'));
}
// ---------------------------------
//	ДОПОЛНИТЕЛЬНЫЕ СТРАНИЦЫ
// ---------------------------------
elseif ($uri == '/about')
{
	$response = about_action();
}
elseif ($uri == '/mod') // mod_rewrite test
{
	$response = mod_action();
}
else
{
	$response = error_404();
}
?>