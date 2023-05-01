<?php 

 namespace App\Controllers;


 /**
  * 
  */
 class CategoryController
 {
 	
 	private $db;
   function __construct($conn)
   {
      $this->db = $conn;
   }

    public function getCategories()
    {
        $sql = "SELECT * FROM categories";
        $result = $this->db->query($sql);
        return $result;
    }
 }