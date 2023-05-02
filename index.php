<?php 
session_start();
require 'config.php';
require 'function.php';
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
if (isset($_SESSION['password']) AND isset($_SESSION['email'])) {
	if (($uri == '/login') || ($uri == '/register')) {
		$uri = '/';
	}

$routes = [
	"" => "resource/index.php",
	"/" => "resource/index.php",
	'/sklads' => 'resource/sklads/sklads.php',
	'/skladCreate' => 'resource/sklads/create.php',
	'/editSklad' => 'resource/sklads/edit.php',
	'/updateSklad' => 'resource/sklads/update.php',
	'/deleteSklad' => 'resource/sklads/delete.php',

	'/users' => 'resource/users/users.php',
	'/createUser' => 'resource/users/create.php',
	'/editUser' => 'resource/users/edit.php',
	'/updateUser' => 'resource/users/update.php',
	'/deleteUser' => 'resource/users/delete.php',

	'/products' => 'resource/products/products.php',
	'/createProduct' => 'resource/products/create.php',
	'/editProduct' => 'resource/products/edit.php',
	'/updateProduct' => 'resource/products/update.php',
	'/deleteProduct' => 'resource/products/delete.php',
	'/productCategory' => 'resource/products/productCategory.php',

	'/logout' => 'resource/auth/logout.php',
];

}else
{
	if ($uri == '/register') {
			$routes = [
				'/register' => 'resource/auth/register.php',
			];
		}else
		{
			$uri = "/login";
			$routes = [
				'/login' => 'resource/auth/login.php',
			];
		}
}
	
	if (array_key_exists($uri, $routes)) {
		require $routes[$uri];
	}

