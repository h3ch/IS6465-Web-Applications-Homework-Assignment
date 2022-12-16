<?php

require_once 'loginDB.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

class User{
	
	public $username;
	public $roles = Array();
	public $points;
	
	function __construct($username,$points){
		global $conn;
				
		$this->username = $username;
    $this->points = $points;
		
		$query="select * from user where username='$username' ";
		$result = $conn->query($query);
		if(!$result) die($conn->error);
			
		$rows = $result->num_rows;		
		
		$roles = Array();
		for($i=0; $i<$rows; $i++){
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$roles[] = $row['role'];
		}		

		$this->roles = $roles;
	}

	function getRoles(){
		return $this->roles;
	}

}


?>