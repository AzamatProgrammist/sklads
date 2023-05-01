<?php 
ob_start();
include 'config.php';

  if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $result = $sklad->delete($id);
     if ($result) {
          header("Location: /sklads");
          ob_end_fluch();
        }else{
          echo "Xatolik";
        }
  }

 ?>