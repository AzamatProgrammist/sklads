<?php 
require 'config.php';
require 'function.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
	"" => "resource/index.php",
	"/" => "resource/index.php",
	'/sklads' => 'resource/sklads/sklads.php',
	'/products' => 'resource/products/products.php',
	'/skladCreate' => 'resource/sklads/create.php',
	'/editSklad' => 'resource/sklads/edit.php',
	'/updateSklad' => 'resource/sklads/update.php',
	'/deleteSklad' => 'resource/sklads/delete.php',

	'/users' => 'resource/users/users.php',
	'/createUser' => 'resource/users/create.php',
	'/editUser' => 'resource/users/edit.php',
	'/updateUser' => 'resource/users/update.php',
	'/deleteUser' => 'resource/users/delete.php',
];


if (array_key_exists($uri, $routes)) {
	require $routes[$uri];
}

