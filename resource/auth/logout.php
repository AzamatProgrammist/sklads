<?php 
ob_start();
unset($_SESSION['password']);
unset($_SESSION['email']);

header("Location: /login");
ob_end_flush();

 ?>