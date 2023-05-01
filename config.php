 <?php 

	require 'vendor/autoload.php';

	$host = 'localhost';
	$user = 'root';
	$pass = 'root';
	$database = 'sklad';
	$charset = 'utf8mb4';

	$dsn = "mysql:host=$host;dbname=$database;charset=$charset";

	try {
		$pdo = new PDO($dsn, $user, $pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo $e->getMessage();
		throw new PDOException($e->getMessage());	
	}

	use App\Controllers\SkladController;
	use App\Controllers\UserController;
	use App\Controllers\RoleController;
	use App\Controllers\CategoryController;

	$sklad = new SkladController($pdo);
	$user = new UserController($pdo);
	$role = new RoleController($pdo);
	$category = new CategoryController($pdo);