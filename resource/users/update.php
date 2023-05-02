<?php 
  ob_start();
  include 'config.php';
  if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $role_id = $_POST['role_id'];
    $result = $user->update($id, $name, $password, $email, $role_id);
    if ($result) {
          header("Location: /users");
          ob_end_fluch();
        }else{
          echo "Xatolik";
        }
  }
 ?>

