<?php 

 namespace App\Controllers;


 /**
  * 
  */
 class RoleController
 {
 	private $db;
 	function __construct($conn)
 	{
 		$this->db = $conn;
 	}

    public function getRoles()
    {
        $sql = "SELECT * FROM roles";
        $stmt = $this->db->query($sql);
        $result = $stmt->fetchALL();
        return $result;
    }

    public function store($name, $email, $password)
    {
    	try {
    			$sql = "INSERT INTO users(name, email, password) VALUES(:name, :email, :password)";
    			$stmt = $this->db->prepare($sql);
            $stmt->bindparam(':name',$name);
            $stmt->bindparam(':email',$email);
	 			$stmt->bindparam(':password',$password);
	 			$result = $stmt->execute();
	 			return $result;
    		} catch (PDOException $e){
	 			echo $e->getMessage();
	 		}	
    }

    public function editUser($id)
    {
    	try {
    		$sql = "SELECT * FROM users WHERE id = :id";
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

    public function update($id, $name, $email, $password)
    {
    	try {
	    	$sql = "UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id";
	    	$stmt = $this->db->prepare($sql);
	    	$stmt->bindparam(':id', $id);
         $stmt->bindparam(':name', $name);
         $stmt->bindparam(':email', $email);
	    	$stmt->bindparam(':password', $password);
	    	$result = $stmt->execute();
    		return $result;
    	} catch (PDOException $e) {
    		echo $e->getMessage();
    	}
    }

 
    public function delete($id)
    {
      try {

         $sql = "DELETE FROM users WHERE id = :id";
         $stmt = $this->db->prepare($sql);
         $stmt->bindparam(':id', $id);
         $result = $stmt->execute();
         return $result;
      } catch (Exception $e) {
         echo $e->getMessage();
      }
    }




 }

