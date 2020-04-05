<?php

if (empty($_GET['path'])) die();

$host = str_replace(':8080', '', $_SERVER['HTTP_HOST']);
$host = str_replace(':8008', '', $_SERVER['HTTP_HOST']);
$path = $_GET['path'];

header('Location: http://'.$host.$path);