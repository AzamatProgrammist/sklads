<?php 
  ob_start();
  include 'config.php';
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $count = $_POST['count'];
    $result = $product->updateProduct($id, $name, $price, $count);
    if ($result) {
          header("Location: /products");
          ob_end_fluch();
        }else{
          echo "Xatolik";
        }
  }

 ?>