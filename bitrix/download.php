<?php

require_once('bitrix/modules/main/bx_root.php');
require_once('bitrix/modules/main/include/prolog_before.php');

if (
	!isset($_GET['id']) 
	|| !($id = $_GET['id']) 
	|| !($file = CFile::GetByID($id)->GetNext())
) {
	die();
}

$login = '';
$password = '';
$path = CFile::GetPath($id);
$logged = false;
$protected = isFilePasswordProtected($file['DESCRIPTION'], $login, $password);

if ($protected) {
	$logged = (
			isset($_SERVER['PHP_AUTH_USER'])
			&& isset($_SERVER['PHP_AUTH_PW'])
			&& ($_SERVER['PHP_AUTH_USER'] === $login)
			&& ($_SERVER['PHP_AUTH_PW'] === $password)
		)
		|| (
			isset($_SERVER['REDIRECT_REMOTE_USER'])
			&& ($loginData = explode(' ', $_SERVER['REDIRECT_REMOTE_USER']))
			&& (count($loginData) === 2)
			&& ($loginData = $loginData[1])
			&& ($loginData = base64_decode($loginData))

			&& ($loginData = explode(':', $loginData))
			&& (count($loginData) === 2)
			&& ($loginData[0] === $login)
			&& ($loginData[1] === $password)
		);

	//var_dump($loginData, $login, $password);

	if (!$logged) {
		header('WWW-Authenticate: Basic realm="File Download"');
    	header('HTTP/1.0 401 Unauthorized');
	}
}

//header('Location: '.$path);

if (!$protected || $logged) {
	header('Location: '.$path);
}
