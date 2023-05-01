<?php 

 namespace App\Controllers;


 /**
  * 
  */
 class UserController
 {
 	private $db;
 	function __construct($conn)
 	{
 		$this->db = $conn;
 	}

    public function getUsers()
    {
        try {
        $sql = "SELECT * FROM `users`";
        $result = $this->db->query($sql);
        return $result;
        } catch (Exception $e) {
           echo $e->getMessage();
        }
    }

    public function store($name, $password, $email, $role_id)
    {
    	try {
    			$sql = "INSERT INTO users(name, password, email, role_id) VALUES(:name, :password, :email, :role_id)";
    			$stmt = $this->db->prepare($sql);
            $stmt->bindparam(':name',$name);
            $stmt->bindparam(':password',$password);
            $stmt->bindparam(':email',$email);
	 			$stmt->bindparam(':role_id',$role_id);
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

    public function update($id, $name, $email, $password, $role_id)
    {
    	try {
	    	$sql = "UPDATE `users` SET name = :name, password = :password, email = :email, role_id = :role_id WHERE id = :id";
	    	$stmt = $this->db->prepare($sql);
	    	$stmt->bindparam(':id', $id);
         $stmt->bindparam(':name', $name);
         $stmt->bindparam(':password', $password);
         $stmt->bindparam(':email', $email);
	    	$stmt->bindparam(':role_id', $role_id);
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
