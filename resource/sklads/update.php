<?php 
  ob_start();
  include 'config.php';
  if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $result = $sklad->update($id, $name);
    if ($result) {
          header("Location: /sklads");
          ob_end_fluch();
        }else{
          echo "Xatolik";
        }
  }
 ?>
