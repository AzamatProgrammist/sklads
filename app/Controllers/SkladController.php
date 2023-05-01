<?php 

 namespace App\Controllers;


 /**
  * 
  */
 class SkladController
 {
 	private $db;
 	function __construct($conn)
 	{
 		$this->db = $conn;
 	}

    public function getSklads()
    {
        $sql = "SELECT * FROM sklad";
        $result = $this->db->query($sql);
        return $result;
    }

    public function store($name)
    {
    	try {
    			$sql = "INSERT INTO sklad(name) VALUES(:name)";
    			$stmt = $this->db->prepare($sql);
	 			$stmt->bindparam(':name',$name);
	 			$result = $stmt->execute();
	 			return $result;
    		} catch (PDOException $e){
	 			echo $e->getMessage();
	 		}	
    }

    public function editSklad($id)
    {
    	try {
    		$sql = "SELECT * FROM sklad WHERE id = :id";
	 		$stmt = $this->db->prepare($sql);
	 		$stmt->execute(array(':id'=>$id));
	 		$result = $stmt->fetch();
	 		return $result;
    	} catch (PDOException $e) {
    		echo $e->getMessage();
    	}
    }

    public function show($id)
    {

    }

    public function update($id, $name)
    {
    	try {
	    	$sql = "UPDATE sklad SET name = :name WHERE id = :id";
	    	$stmt = $this->db->prepare($sql);
	    	$stmt->bindparam(':id', $id);
	    	$stmt->bindparam(':name', $name);
	    	$result = $stmt->execute();
    		return $result;
    	} catch (PDOException $e) {
    		echo $e->getMessage();
    	}
    }

 
    public function delete($id)
    {
      try {

         $sql = "DELETE FROM sklad WHERE id = :id";
         $stmt = $this->db->prepare($sql);
         $stmt->bindparam(':id', $id);
         $result = $stmt->execute();
         return $result;
      } catch (Exception $e) {
         echo $e->getMessage();
      }
    }




 }

