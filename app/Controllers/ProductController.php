<?php 

 namespace App\Controllers;


 /**
  * 
  */
 class ProductController
 {
 	
 	function __construct()
 	{
 		echo "ProductController method";
 	}

    public function getAllProducts()
    {
        $sql = "SELECT * FROM products";
        $result = $this->db->query($sql);
        return $result;
    }
 }