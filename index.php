<?php


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


$routers = [
	'/' => 'Controllers/HomeController.php',
	'/about' => 'Controllers/AboutsController.php',
	'/blog' => 'Controllers/BlogsController.php',
];


if (array_key_exists($uri, $routers)) {
	require $routers[$uri];
}else{
	require "views/errors/{$code}.php";

	die();
}



