<?php 

 namespace App\Controllers;


 /**
  * 
  */
 class ProductController
 {
 	
   private $db;
   function __construct($conn)
   {
      $this->db = $conn;
   }

    public function getProducts()
    {
        $sql = "SELECT * FROM products";
        $result = $this->db->query($sql);
        return $result;
    }

    public function store($name, $price, $count, $category_id, $sklad_id)
    {
      try {
            $sql = "INSERT INTO products(name, price, count, category_id, sklad_id) VALUES(:name, :price, :count, :category_id, :sklad_id)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':name',$name);
            $stmt->bindparam(':price',$price);
            $stmt->bindparam(':count',$count);
            $stmt->bindparam(':category_id',$category_id);
            $stmt->bindparam(':sklad_id',$sklad_id);
            $result = $stmt->execute();
            return $result;
         } catch (PDOException $e){
            echo $e->getMessage();
         }  
    }

    public function getProduct($id)
    {
      try {
         $sql = "SELECT * FROM products WHERE id = :id";
         $stmt = $this->db->prepare($sql);
         $stmt->execute(array(':id'=>$id));
         $result = $stmt->fetch();
         return $result;
      } catch (PDOException $e) {
         echo $e->getMessage();
      }
    }

    public function updateProduct($id, $name, $price, $count)
    {
      try {
         $sql = "UPDATE `products` SET name = :name, price = :price, count = :count WHERE id = :id";
         $stmt = $this->db->prepare($sql);
         $stmt->bindparam(':id', $id);
         $stmt->bindparam(':name', $name);
         $stmt->bindparam(':price', $price);
         $stmt->bindparam(':count', $count);
         $result = $stmt->execute();
         return $result;
      } catch (PDOException $e) {
         echo $e->getMessage();
      }
    }

    public function delete($id)
    {
      try {

         $sql = "DELETE FROM products WHERE id = :id";
         $stmt = $this->db->prepare($sql);
         $stmt->bindparam(':id', $id);
         $result = $stmt->execute();
         return $result;
      } catch (Exception $e) {
         echo $e->getMessage();
      }
    }

    public function productCategory($category_id)
    {
      try {
         $sql = "SELECT * FROM products WHERE category_id = :category_id";
         $stmt = $this->db->prepare($sql);
         $stmt->execute(array(':category_id'=>$category_id));
         $result = $stmt->fetchAll();
         return $result;
      } catch (Exception $e) {
         $e->getMessage();    
      }
    }

 }





