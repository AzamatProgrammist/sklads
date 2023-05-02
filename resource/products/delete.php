<?php 
ob_start();
include 'config.php';

  if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $result = $product->delete($id);
     if ($result) {
          header("Location: /products");
          ob_end_fluch();
        }else{
          echo "Xatolik";
        }
  }

 ?>